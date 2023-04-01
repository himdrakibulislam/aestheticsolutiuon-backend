<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
class BrandController extends Controller
{
    public function index(){
        $brands  = Brand::orderBy('id','DESC')->get();
        return view('admin.brands.index',compact('brands'));
    }
    public function store(Request $request){
    
        $request->validate([
            'name' => 'required|unique:brands'
        ]);
        $slug = Str::slug($request->name);
        $brand = new Brand();
        $brand->name = $request->name;
        $brand->slug = $slug;
        $brand->status = $request->status == true ? '1' : '0';
        $brand->save();
        return redirect()->back()->with('status','Brand Added');

    }

    public function edit(Brand $brand){
        return view('admin.brands.edit',compact('brand'));
    }

    public function update(Request $request,int $id){
        $request->validate([
            'name' => 'required'
        ]);
        $slug = Str::slug($request->name);
        $brand = Brand::findOrFail($id);
        $brand->name = $request->name;
        $brand->slug = $slug;
        $brand->status = $request->status == true ? '1' : '0';
        $brand->update();
        return redirect('admin/brands')->with('status',$brand->name.' Updated');

    }

    public function deleteBrand(int $id){
        Brand::destroy($id);
        return redirect()->back()->with('status','Brand Deleted');
    }



}
