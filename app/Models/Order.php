<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Order extends Model
{
    use HasFactory;
    use Notifiable;

    protected static $order,$cart;

//    protected static $searchText,$order;
//
//    protected static function newSearchOrder($request){
//        self::$searchText = Order::find($request->search);
//
//        self::$order = Order::where('customer_name','LIKE',"%self::$searchText%")->get();
//    }


    //  ------ Removed Cart ----- //
    protected static function newRemoveCart($request){
        self::$cart=Cart::find($request->cart_id);
        if (file_exists(self::$cart->image)){
            unlink(self::$cart->image);
        }
        self::$cart->delete();
    }


    //  ------ Cancel Order ----- //
    protected static function newCancelOrder($id){
        self::$order = Order::find($id);
        self::$order->delivery_status='Order canceled';
        self::$order->save();
    }


}
