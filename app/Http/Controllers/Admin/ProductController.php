<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductFormRequest;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductImage;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Image;

class ProductController extends Controller
{
    public function index(){
        $products  =  Product::orderBy('id','DESC')->get() ;  
        return view('admin.products.index',compact('products'));
    }
    public function add(){
        $categories = Category::where('status','0')->get();
        $brands = Brand::where('status','0')->get();
        // $colors = Color::where('status','0')->get();
        return view('admin.products.add',compact('categories','brands'));
    }
    public function store(ProductFormRequest $request){

     
        $validatedData  = $request->validated();

        $category = Category::findOrFail($validatedData['category_id']);
        $product = $category->products()->create([
            'category_id' => $validatedData['category_id'],
            'name' => $validatedData['name'],
            'slug' => Str::slug($validatedData['name']).'-'.rand(11111,99999),
            'brand' => $validatedData['brand'],
            'small_description' => $request->small_description,
            'description' => $validatedData['description'],
            'original_price' => $validatedData['original_price'],
            'selling_price' => $validatedData['selling_price'],
            'quantity' => $validatedData['quantity'],
            'trending' => $request->trending == true ? '1' : '0' ,
            'status' => $request->status == true ? '1' : '0' ,
            'sizes' => $request->sizes,

            'meta_title' => $request->meta_title,
            'meta_keyword' => $request->meta_keyword,
            'meta_description' => $request->meta_description,
        ]);
        //store images
        if($request->hasFile('image')){
            $uploadPath = 'uploads/products/';
            $i = 1;
            foreach ($request->file('image') as $imageFile) {
                
                $extension = $imageFile->getClientOriginalExtension();
                $filename = time().$i++.'.'.$extension;

                // $imageFile->move($uploadPath,$filename);
                Image::make($imageFile)->resize(1000, 1000)->save($uploadPath.$filename);

                $fileImagePathName = $uploadPath.$filename;
                $product->productImages()->create([
                    'product_id' => $product->id,
                    'image' => $fileImagePathName
                ]);

            }
        }
        //store colors
        // if($request->colors){
        //     foreach ($request->colors as $key => $color) {
        //         ProductColor::create([
        //             'product_id' => $product->id,
        //             'color_id'   => $color,
        //             'quantity'   => $request->colorQuantity[$key],
        //         ]);
                
        //     }
        // }



        return redirect('admin/products')->with('status','Product Added');
       
    }
    public function edit(int $id){
        $product = Product::findOrFail($id);
        $categories = Category::where('status','0')->get();
        $brands = Brand::where('status','0')->get();
        return view('admin.products.edit',compact('product','categories','brands'));
    }
    public function update(Request $request,int $product_id){
        $request->validate([
            'category_id' => 'required',
            'name' => 'required',
            'brand' => 'required',
            'description' => 'required',
            'original_price' => 'required',
            'selling_price' => 'required',
            'quantity' => 'required',
        ]);
        $product = Product::where('id',$product_id)->first();
        if ($product) {
            $product->update([
                'category_id' => $request->category_id,
                'name' => $request->name,
                'slug' => Str::slug($request->slug),
                'brand' => $request->brand,
                'small_description' => $request->small_description,
                'description' => $request->description,
                'original_price' => $request->original_price,
                'selling_price' => $request->selling_price,
                'quantity' => $request->quantity,
                'trending' => $request->trending == true ? '1' : '0' ,
                'status' => $request->status == true ? '1' : '0' ,
                'sizes' => $request->sizes,

                'meta_title' => $request->meta_title,
                'meta_keyword' => $request->meta_keyword,
                'meta_description' => $request->meta_description,
            ]);

            if($request->hasFile('image')){
                $uploadPath = 'uploads/products/';
                $i = 1;
                foreach ($request->file('image') as $imageFile) {
                    
                    $extension = $imageFile->getClientOriginalExtension();
                    $filename = time().$i++.'.'.$extension;

                    // $imageFile->move($uploadPath,$filename);
                    Image::make($imageFile)->resize(1000, 1000)->save($uploadPath.$filename);


                    $fileImagePathName = $uploadPath.$filename;
                    $product->productImages()->create([
                        'product_id' => $product->id,
                        'image' => $fileImagePathName
                    ]);
    
                }
            }
            
            return redirect('admin/products')->with('status','Product Updated');



        }else{
            return redirect('admin/products')->with('status','No such product Id found');

        }
    }

    public function detail(Product $id){
        $product = $id;
        return view('admin.products.detail',compact('product'));
    }

    public function desctroyImage(int $id){
        $productImage = ProductImage::findOrFail($id);
      
        if(File::exists($productImage->image)){
            File::delete($productImage->image);
        }
        $productImage->delete();
        return redirect()->back()->with('status','Product image deleted');
    }

    public function destroy(int $product_id){
        $product = Product::findOrFail($product_id);
        if($product->productImages){
            foreach ($product->productImages as $image) {
                if(File::exists($image->image)){
                    File::delete($image->image);
                }
            }
        }
        $product->delete();
        return redirect('admin/products')->with('status','Product Deleted');
    }
}
