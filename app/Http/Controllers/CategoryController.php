<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function categoryForm(){
        return view('admin.category.category_form');
    }

    public function manageCategory(){
        return view('admin.category.manage_category',[
            'categories'=>Category::all()
        ]);
    }

    public function addCategory(Request $request){
        Category::newAddCategory($request);
        return back()->with('message','Successfully Created ');
    }

    public function editCategory($id){
        return view('admin.category.edit_category',[
            "categories"=>Category::find($id)
        ]);
    }

    public function updateCategory(Request $request){
        Category::newUpdateCategory($request);
        return redirect(route('manage.category'))->with('message','Successfully Updated');
    }

    public function deleteCategory(Request $request){
        Category::newDeleteCategory($request);
        return redirect(route('manage.category'))->with('message','Successfully Deleted');
    }

}
