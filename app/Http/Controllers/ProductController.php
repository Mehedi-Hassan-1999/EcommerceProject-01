<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use DB;

class ProductController extends Controller
{
    public $product;

    public function product(){
        return view('admin.product.product_form',[
            'categories'=>Category::all(),
            'brands'=>Brand::all(),
        ]);
    }

    public function manageProduct(){
        return view('admin.product.manage_product',[
            'products'=>$this->product = DB::table('products')
                ->join('categories','products.category_id','=','categories.id')
                ->join('brands','products.brand_id','=','brands.id')
                ->select('products.*','categories.category_name','brands.brand_name')
                ->paginate(5)
        ]);
    }

    public function addProduct(Request $request){
        Product::newAddProduct($request);
        return back()->with('message','Successfully Created ');
    }

    public function editProduct($id){
        return view('admin.product.edit_product',[
            "products"=>Product::find($id),
            'categories'=>Category::all(),
            'brands'=>Brand::all(),

        ]);
    }

    public function updateProduct(Request $request){
        Product::newUpdateProduct($request);
        return redirect(route('manage.product'))->with('message','Successfully Updated');
    }

    public function deleteProduct(Request $request){
        product::newDeleteProduct($request);
        return redirect(route('manage.product'))->with('message','Successfully Deleted');
    }



    //  ----  Product search  ------ //
    public function searchProduct(Request $request){

        $searchText = $request->search;

        return view('admin.product.manage_product',[
            'products'=> Product::where('product_name','LIKE',"%$searchText%")
                ->orWhere('product_code','LIKE',"%$searchText%")
                ->orWhere('category_id','LIKE',"%$searchText%")
                ->orWhere('brand_id','LIKE',"%$searchText%")
                ->paginate(10)
        ]);
    }
}
