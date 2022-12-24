<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Bus\Batch;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    public function brandForm(){
        return view('admin.brand.brand_form');
    }

    public function manageBrand(){
        return view('admin.brand.manage_brand',[
            'brands'=>Brand::all()
        ]);
    }

    public function addBrand(Request $request){
        Brand::newAddBrand($request);
        return back()->with('message','Successfully Created ');
    }

    public function editBrand($id){
        return view('admin.brand.edit_brand',[
            "brands"=>Brand::find($id)
        ]);
    }

    public function updateBrand(Request $request){
        Brand::newUpdateBrand($request);
        return redirect(route('manage.brand'))->with('message','Successfully Updated');
    }

    public function deleteBrand(Request $request){
        Brand::newDeleteBrand($request);
        return redirect(route('manage.brand'))->with('message','Successfully Deleted');
    }
}
