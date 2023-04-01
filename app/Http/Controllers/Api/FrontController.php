<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FrontController extends Controller
{
    public function allProducts(){
    $products = Product::where('status','0')->get();
    return response()->json([
        'status' => 200,
        'products' => $products
    ]);
    }
    public function products(){
    $products = Product::where('status','0')->paginate(10);
    return response()->json([
        'status' => 200,
        'products' => $products
    ]);
    }
    public function categories(){
        $categories = Category::where('status','0')
        ->get();
    
        // $categories = DB::table('products')
        // ->join('categories', 'categories.id', '=', 'products.category_id')
        // ->select('categories.*','products.name')
        // ->get();
        return response()->json([
            'status' => 200,
            'categories' => $categories
        ]);
    }
    public function sliders(){
        $sliders = Slider::all();
        return response()->json([
            'status' => 200,
            'sliders'=> $sliders
        ]);
    }

    public function shopInformation(){
        $shopInfo = DB::table('shop_information')->first();
        return response()->json([
            'status' => 200,
            'shopInfo'=> $shopInfo
        ]);
    }

}
