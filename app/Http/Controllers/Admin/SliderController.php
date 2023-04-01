<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class SliderController extends Controller
{
    public function index(){
        $sliders = Slider::all();
        return view('admin.slider.index',compact('sliders'));
    }
    public function add(){
       
        return view('admin.slider.add');
    }
    public function store(Request $request){
        // 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048|dimensions:min_width=100,min_height=100,max_width=1000,max_height=1000'
       $validate = $request->validate([
        'image' => 'required|mimes:jpg,png,jpeg,gif,svg'
        ]);

        $uploadPath = 'uploads/sliders/';

        $slider = new Slider();
        $slider->title = $request->title;
        $slider->url = $request->url;
        $slider->description = $request->description;

        if($request->hasFile('image')){
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;
         
            $request->image->move($uploadPath,$filename);
            $slider->image = $uploadPath.$filename;
        }
        $slider->save();

        return redirect('admin/sliders')->with('status','Slider Added');
    }
    public function edit(Slider $id){
        $slider = $id;
        return view('admin.slider.edit',compact('slider'));
    }
    public function update(Request $request,int $id){
        $uploadPath = 'uploads/sliders/';

        $slider = Slider::findOrFail($id);
        $slider->title = $request->title;
        $slider->url = $request->url;
        $slider->description = $request->description;

        if($request->hasFile('image')){
            
            if(File::exists($slider->image)){
                File::delete($slider->image);
            }
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;
            $request->image->move($uploadPath,$filename);
            $slider->image = $uploadPath.$filename;
        }
        $slider->update();
        return redirect('admin/sliders')->with('status','Slider Updated');
    }


    public function desctroy(int $id){
        $slider = Slider::findOrFail($id);
        if(File::exists($slider->image)){
            File::delete($slider->image);
        }
        $slider->delete();
        return redirect()->back()->with('status','Slider removed');
    }

}
