<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Cart;
use App\Models\Comment;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Auth;
use Session;
use Stripe;
use RealRashid\SweetAlert\Facades\Alert;

class EcommerceController extends Controller
{
    public $product,$cart,$user,$category,$brand,$order,$comment;

    public function index(){
        return view('frontEnd.home.home',[
            'products'=>Product::paginate(6)
        ]);
    }

    //  ------ All Product ----- //
    public function allProduct(){
        return view('frontEnd.product.all_product',[
            'products'=>Product::paginate(16),
            'comments'=>Comment::all(),
        ]);
    }



    //  ------ Product Details ----- //
    public function productDetails($id){
        $this->product = Product::find($id);
        $products = DB::table('products')
            ->join('categories','products.category_id','categories.id')
            ->join('brands','products.brand_id','brands.id')
            ->select('products.*','categories.category_name','brands.brand_name')
            ->where('products.id',$id)
            ->first();
        return view('frontEnd.product.product_details',[
            'products'=>$products,
        ]);
    }



    //  ------ Add Cart ----- //
    public function addCart(Request $request, $id){
        if (Auth::id()){
            $this->user=Auth::user();
            $userid = $this->user->id;
            $this->product=Product::find($id);
            $product_exist_id = Cart::where('product_id','=',$id)->where('user_id','=',$userid)->get('id')->first();
            if($product_exist_id!=null){
                $this->cart = Cart::find($product_exist_id)->first();
                $quantity = $this->cart->quantity;
                $this->cart->quantity = $quantity + $request->quantity;
                if ($this->product->discount!=null){
                    $this->cart->price=$this->product->discount *  $this->cart->quantity;
                }
                else{
                    $this->cart->price=$this->product->price *  $this->cart->quantity;
                }
                $this->cart->save();

                Alert::success('Product Added Successfully','We have added product to the cart');

                return redirect()->back();
            }
            else{
                $this->cart=new Cart;

                $this->cart->customer_name      =$this->user->name;
                $this->cart->user_id            =$this->user->id;
                $this->cart->phone              =$this->user->phone;
                $this->cart->email              =$this->user->email;
                $this->cart->address            =$this->user->address;


                $this->cart->product_id         =$this->product->id;
                $this->cart->product_name       =$this->product->product_name;
                $this->cart->product_code       =$this->product->product_code;
                $this->cart->quantity           =$request->quantity;

                if ($this->product->discount!=null){
                    $this->cart->price          =$this->product->discount *  $request->quantity;
                }
                else{
                    $this->cart->price          =$this->product->price *  $request->quantity;
                }
                $this->cart->image              =$this->product->image;
                $this->cart->save();

                Alert::success('Product Added Successfully','We have added product to the cart');

                return redirect()->back();
            }
        }
        else{
            return redirect('login');
        }
    }



    //  ------ Show Cart ----- //
    public function showCart(){
        if (Auth::id()){
            $id=Auth::user()->id;
            $this->cart=Cart::where('user_id','=',$id)->get();
            return view('frontEnd.cart.cart_show',[
                'carts'=>Cart::all()
            ]);
        }
        else{
            return redirect('login');
        }
    }


    //  ------ Show Order ----- //
    public function showOrder(){
        if (Auth::id()) {
            $this->user=Auth::user();
            $userid=$this->user->id;
            return view('frontEnd.Order.show_order',[
                'orders'=>Order::where('user_id','=',$userid)->paginate(5)
            ]);
        }
        else{
            return redirect('login');
        }
    }


    //  ------ Removed Cart ----- //
    public function removeCart(Request $request){
        Order::newRemoveCart($request);
        Alert::success('Product removed Successfully','We have removed product to the cart');
        return redirect(route('show.cart'));
    }


    //  ------ Cancel Order ----- //
    public function cancelOrder($id){
        Order::newCancelOrder($id);
        Alert::success('Product Canceled Successfully','We have removed product to the order');
        return redirect(route('show.order'));
    }


    //  ------ Product Search ----- //
    public function productSearch(Request $request){
        $search_text = $request->search;

        return view('frontEnd.home.home',[
            'products'=>  Product::where('product_name','LIKE',"%$search_text%")
                ->orWhere('category_id','LIKE',"%$search_text%")
                ->paginate(10)
        ]);
    }


    //  ------ Cash on delivery Order ----- //
    public function cashOrder(){
        $this->user=Auth::user();
        $userId = $this->user->id;
        $carts=Cart::where('user_id','=',$userId)->get();

        foreach ($carts as $cart){
            $this->order=new Order;

            $this->order->user_id           = $cart->user_id;
            $this->order->customer_name     = $cart->customer_name;
            $this->order->phone             = $cart->phone;
            $this->order->email             = $cart->email;
            $this->order->address           = $cart->address;


            $this->order->product_id        = $cart->product_id;
            $this->order->product_name      = $cart->product_name;
            $this->order->product_code      = $cart->product_code;
            $this->order->quantity          = $cart->quantity;
            $this->order->price             = $cart->price;
            $this->order->image             = $cart->image;

            $this->order->payment_status    = 'cash on delivery';
            $this->order->delivery_status   = 'processing';

            $this->order->save();

            $cart_id = $cart->id;
            $this->cart= Cart::find($cart_id);
            $this->cart->delete();
        }
        return redirect()->back()->with('message', 'We have received your order. We will connect with you as soon as possible...');
    }




    //   ------- Card payment ------ //
    public function stripe($total_price){
        return view('frontEnd.payment.payment',compact('total_price'));
    }

    public function stripePost(Request $request,$total_price)
    {
        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));

        Stripe\Charge::create ([
            "amount" => $total_price * 100,
            "currency" => "usd",
            "source" => $request->stripeToken,
            "description" => "Thanks for payment."
        ]);


        $this->user=Auth::user();
        $userId = $this->user->id;
        $carts=Cart::where('user_id','=',$userId)->get();

        foreach ($carts as $cart){
            $this->order=new Order;

            $this->order->user_id           = $cart->user_id;
            $this->order->customer_name     = $cart->customer_name;
            $this->order->phone             = $cart->phone;
            $this->order->email             = $cart->email;
            $this->order->address           = $cart->address;


            $this->order->product_id        = $cart->product_id;
            $this->order->product_name      = $cart->product_name;
            $this->order->product_code      = $cart->product_code;
            $this->order->quantity          = $cart->quantity;
            $this->order->price             = $cart->price;
            $this->order->image             = $cart->image;

            $this->order->payment_status    = 'Paid';
            $this->order->delivery_status   = 'processing';

            $this->order->save();

            $cart_id = $cart->id;
            $this->cart= Cart::find($cart_id);
            $this->cart->delete();
        }
        Session::flash('success', 'Payment successful!');
        return back();
    }



    // ------ Comment on Product  ------- //

    public function addComment(Request $request){

        if (Auth::id()){
            $this->comment=new Comment();

            $this->comment->user_id = Auth::user()->id;
            $this->comment->user_name = Auth::user()->name;
            $this->comment->comment = $request->comment;
            $this->comment->save();
            return redirect()->back();
        }
        else{
            return redirect('login');
        }

    }
}
