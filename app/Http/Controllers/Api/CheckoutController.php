<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\CheckoutRequest;
use App\Jobs\OrderMail;
use App\Mail\AllMail;
use App\Models\Admin;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class CheckoutController extends Controller
{
    public function checkout(Request $request){
        // $validatedData = $request->validated(); 
        $validators =  Validator::make($request->all(),[
             'cart' => 'required',
             'total' => 'required',
             'payment_type' => 'required',
             'name' => 'required',
             'phone' => 'required',
             'division' => 'required',
             'district' => 'required',
             'sub_district' => 'required',
             'address' => 'required',
             'zipcode' => 'required',
        ]);
        if($validators->fails()){
            return response()->json([
                'status' => 422,
                'errors' => $validators->messages(),
            ]);
        }
        
        $order = new Order();

        $order->order_number = rand(11111111,99999999); 
        $order->name = $request->name ; 
        $order->user_id = auth('sanctum')->user()->id; 
        $order->phone = $request->phone ; 
        $order->division = $request->division ; 
        $order->district = $request->district ; 
        $order->sub_district = $request->sub_district ; 
        $order->address = $request->address ; 
        $order->zipcode = $request->zipcode ; 
        $order->total = $request->total ; 
        $order->payment_type = $request->payment_type ; 
        $order->order_status = 0; 
        $order->save();

        foreach ($request->cart as  $ct) {
           OrderItem::create([
            'order_id' => $order->id,
            'product_id' => $ct['id'],
            'quantity' => $ct['qty'],
            'size' => $ct['size'],
           ]);
           $product = Product::where('id',$ct['id'])->first();
            $product->quantity = $product->quantity - $ct['qty'];
            $product->update();
        }


        // mail to admin
        
        // $data = [];
        //     $title = 'An order has placed';
        //     $content = "<div class='w-75 mx-auto'>
        //     <b>Dear Admin,</b>
        //     <p>
    
        //         We would like to inform you that a new order has been placed on our e-commerce website. The details of the order are as follows:
        //     </p> 
        //      <table>
        //         <tr  style='text-align: end' >
        //             <th>  Order Number:</th>
        //             <th> # {$order->order_number}</th>
        //         </tr>
        //         <tr  style='text-align: end' >
        //             <th>  Order Date:</th>
        //             <th>  {$order->created_at}</th>
        //         </tr>
        //         <tr  style='text-align: end'>
        //             <th> Customer Name:</th>
        //             <th> {$order->name}</th>
        //         </tr>
                
        //         <tr  style='text-align: end'>
        //             <th>   Customer Phone: </th>
        //             <th>{$order->phone}</th>
        //         </tr>
        //      </table>
               
        // </div>";

        // $data['content'] = $content;
        // $data['title'] = $title;
        // $admins = Admin::all();
        // foreach ($admins as $admin) {
        //     $data['email'] = $admin->email;
        //     OrderMail::dispatch($data);
        //     // Mail::to($admin->email)->send(new AllMail($data));
        // }

        // $admins = Admin::all();
        // foreach ($admins as $admin) {
        //    $admin->notify(new OrderNotify($order->id));
        // }
        return response()->json([
            'status' => 200,
            'message' =>  'Order confirmed'
        ]);
    
    }
}
