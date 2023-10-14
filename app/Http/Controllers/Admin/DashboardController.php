<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contract;
use App\Models\ProjectImage;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;

class DashboardController extends Controller
{
    public function index(){
        $contractChart = Contract::selectRaw('YEAR(created_at) AS year, MONTH(created_at) AS month, COUNT(*) AS total')
        ->where('created_at', '>=', Carbon::now()->subMonths(11)->startOfMonth()) // Fetch data from the last 12 months
        ->groupBy('year', 'month')
        ->orderBy('year', 'asc')
        ->orderBy('month', 'asc')
        ->get();

      
        return view('admin.dashboard',compact('contractChart'));
    }
    public function media(){
        $productImages = ProjectImage::orderBy('created_at','desc')->get();
      
        return view('admin.media',compact('productImages'));
    }
    

    public function optimizeClear(){
        Artisan::call('optimize:clear');
        return redirect()->back()->with('status','Server Optimized');
    }
}
