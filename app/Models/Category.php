<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable=['category_name'];

    protected static $category;

    protected static function newAddCategory($request){

        self::$category = new Category();
        self::$category->category_name = $request->category_name;
        self::$category->save();
    }

    protected static function newUpdateCategory($request){

        self::$category = Category::find($request->category_id);
        self::$category->category_name = $request->category_name;
        self::$category->save();
    }

    protected static function newDeleteCategory($request){
        self::$category = Category::find($request->category_id);
        self::$category->delete();
    }
}
