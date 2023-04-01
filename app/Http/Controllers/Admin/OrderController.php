<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf as Pdf;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    public function index(){
        $orders = Order::where(function($query){
            $query->where('order_status','1')
          ->orWhere('order_status','0');
        })
        ->orderBy('id','DESC')->paginate(10);
        return view('admin.orders.index',compact('orders'));
    }
    public function orderHistory(){
        $orders = Order::where('order_status','2')->orderBy('id','DESC')->paginate(10);
        return view('admin.orders.history',compact('orders'));
    }

    public function invoice(int $id){
        $order = Order::findOrFail($id);
        $shop_info = DB::table('shop_information')->first();
        return view('admin.orders.invoice',compact('order','shop_info'));
    }

    public function orderDetails(int $id){
        $details = Order::findOrFail($id);
        return view('admin.orders.details',compact('details'));
    }
    // update order status 
    public function updateStatus(Request $request, int $id){
        $order = Order::findOrFail($id);
        if($order){
            $order->order_status = $request->order_status;
            $order->update();
            return redirect()->back()->with('status','Order Status Updated');
        }else{
            return redirect()->back()->with('status','Order Not Found');
        }
    }
    //invoice pdf 

    public function invoicePDF(int $id){
        $order = Order::findOrFail($id);
        $shop_info = DB::table('shop_information')->first();

        $pdf = Pdf::loadView('admin.orders.invoice',compact('order','shop_info'));
         return $pdf->download('invoice.pdf');
    
    }

    public function deleteOrder(int $id){
        $order = Order::findOrFail($id);
        if($order){
            foreach ($order->orderItems as  $item) {
                $orderItem =  OrderItem::where('order_id',$item->order_id);
                $orderItem->delete();
            }
            $order->delete();
            return redirect('admin/orders')->with('status','Order Removed');
        }else{
            return redirect()->back()->with('status','Order Not Found');
        }
    }
    
}
