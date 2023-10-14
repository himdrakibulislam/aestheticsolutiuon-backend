<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Requests\CategoryRequest;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use Image;
class CategoryController extends Controller
{
    //showing all category
    public function index(){
        $categories = Category::orderBy('id','DESC')->get();
        return view('admin.categories.index',compact('categories'));
    }
    // showing form
    public function addcategory(){
        return view('admin.categories.add');
    }
    //store category
    public function store(CategoryRequest $request){
        $validatedData = $request->validated(); 
    
        $category = new Category();
        $category->name = $validatedData['name'];
           $category->slug = Str::slug($validatedData['name']);
        $category->status = $request->status == true ? '1' : '0';
        $category->save();
        return redirect('admin/categories')->with('status','Category Added Successfully');
    }
    //showing edit blade with data
    public function edit(Category $category){
        return view('admin.categories.edit',compact('category'));
    }
    //update
    public function update(Request $request,$category_id){
        $request->validate([
            'name' => 'required',
        ]);
        $category = category::findOrFail($category_id);
        $category->name = $request->name;
    
        // $category->slug = Str::slug($validatedData['slug']);
        // $category->description = $validatedData['description'];
        
       
        $category->status = $request->status == true ? '1' : '0';
        $category->update();
        return redirect('admin/categories')->with('status','Category Updated Successfully'); 
    }

    public function deleteCategory(int $id){
        $category = Category::findOrFail($id);
        
        $category->delete();
        return redirect('admin/categories')->with('status',$category->name.' has been deleted');
    }
}
