<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function redirect(){
        if (Auth::id()){
            if (Auth::user()->user_type=='0'){
                return view('frontEnd.home.home',[
                    'products'=>Product::paginate(6),

                ]);
            }
            elseif(Auth::user()->user_type=='1'){
                // Total Revenue Count //
                $orders=Order::all();
                $total_revenue = 0;
                foreach ($orders as $order){
                    $total_revenue= $total_revenue+$order->price;
                }

                // Total Delivered Count //
                $total_delivered = Order::where('delivery_status','=','delivered')->get()->count();

                // Total Processing Count //
                $total_processing = Order::where('delivery_status','=','processing')->get()->count();

                return view('admin.home.home',[
                    'total_product'=> Product::all()->count(),
                    'total_order'=> Order::all()->count(),
                    'total_user'=> User::all()->count(),
                    'total_revenue'=> $total_revenue,
                    'total_delivered'=> $total_delivered,
                    'total_processing'=> $total_processing,
                ]);
            }
            else{
                return redirect('login');
            }
        }
        else{
            return back();
        }
    }
}
