<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Contract;
use App\Models\Project;
use App\Models\ProjectImage;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index(){
        $contractChart = Contract::selectRaw('YEAR(created_at) AS year, MONTH(created_at) AS month, COUNT(*) AS total')
        ->where('created_at', '>=', Carbon::now()->subMonths(11)->startOfMonth()) // Fetch data from the last 12 months
        ->groupBy('year', 'month')
        ->orderBy('year', 'asc')
        ->orderBy('month', 'asc')
        ->get();
        $projects = Project::count();
        $categories = Category::count();
        $clients = Contract::count();
        return view('admin.dashboard',compact('contractChart','projects','categories','clients'));
    }
    public function media(){
        $productImages = ProjectImage::orderBy('created_at','desc')->get();
      
        return view('admin.media',compact('productImages'));
    }
    

    public function optimizeClear(){
        Artisan::call('optimize:clear');
        return redirect()->back()->with('status','Server Optimized');
    }
    public function see_notification(){
        $user = Auth::guard('admin')->user();
        $notifications = $user->notifications;
        
        if($notifications->count() > 0){
            foreach ($user->unreadNotifications as $notification) {
                $notification->markAsRead();
            }
        }
        return view('admin.notification',compact('notifications'));

    }
    public function clearAllNotification(){
        DB::table('notifications')->where('notifiable_id',Auth::guard('admin')->user()->id)->delete();
        return back()->with('success','Notification Cleared');

    }
}
