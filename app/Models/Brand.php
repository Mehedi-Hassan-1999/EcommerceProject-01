<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use HasFactory;

    protected $fillable=['brand_name'];

    protected static $brand;

    protected static function newAddBrand($request){

        self::$brand = new Brand();
        self::$brand->brand_name = $request->brand_name;
        self::$brand->save();
    }

    protected static function newUpdateBrand($request){

        self::$brand = Brand::find($request->brand_id);
        self::$brand->brand_name = $request->brand_name;
        self::$brand->save();
    }

    protected static function newDeleteBrand($request){
        self::$brand = Brand::find($request->brand_id);
        self::$brand->delete();
    }
}
