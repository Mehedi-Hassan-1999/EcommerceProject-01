<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['product_name','product_code','category_id','brand_id,','price','discount','quantity','description','image'];

    protected static $product,$image,$imageName,$directory,$imageUrl,$str;

    protected static function newAddProduct($request){
        self::$product = new Product();

        self::$product->product_name      = $request->product_name;
        self::$product->product_code      = $request->product_code;
        self::$product->category_id       = $request->category_id;
        self::$product->brand_id          = $request->brand_id;
        self::$product->price             = $request->price;
        self::$product->discount          = $request->discount;
        self::$product->quantity          = $request->quantity;
        self::$product->description       = $request->description;
        self::$product->image             = self::getUrlImage($request);

        self::$product->save();
    }

    protected static function getUrlImage($request){
        self::$image      = $request->file('image');
        self::$imageName  = rand().'.'.self::$image->getClientOriginalExtension();
        self::$directory  = 'admin/upload_image/';
        self::$imageUrl   = self::$directory.self::$imageName;
        self::$image->move(self::$directory,self::$imageName);
        return self::$imageUrl;
    }


    protected static function newUpdateProduct($request){
        self::$product = Product::find($request->product_id);

        self::$product->product_name      = $request->product_name;
        self::$product->product_code      = $request->product_code;
        self::$product->category_id       = $request->category_id;
        self::$product->brand_id          = $request->brand_id;
        self::$product->price             = $request->price;
        self::$product->discount          = $request->discount;
        self::$product->quantity          = $request->quantity;
        self::$product->description       = $request->description;
        if ($request->file('admin/upload_image/')){
            if (self::$product->image !=null){
                unlink(self::$product->image);
            }
            self::$product->image = self::getUrlImage($request);
        }
        self::$product->save();
    }

    protected static function newDeleteProduct($request){
        self::$product = Product::find($request->product_id);
        if (file_exists(self::$product->image)){
            unlink(self::$product->image);
        }
        self::$product->delete();
    }
}
