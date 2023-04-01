<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Order;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\Social;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;

class DashboardController extends Controller
{
    public function index(){
        $users = User::all(); 
        $categories = Category::count();
        $orders = Order::count();
        $products = Product::count();
        return view('admin.dashboard',compact('users','categories','orders','products'));
    }
    public function media(){
        $productImages = ProductImage::orderBy('created_at','desc')->get();
        $categoryImages = Category::orderBy('created_at','desc')->get();
        return view('admin.media',compact('productImages','categoryImages'));
    }

    public function optimizeClear(){
        Artisan::call('optimize:clear');
        return redirect()->back()->with('status','Server Optimized');
    }
}
