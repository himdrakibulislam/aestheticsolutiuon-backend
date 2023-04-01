<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LocationController extends Controller
{
    public function index(){
        $shop_info = DB::table('shop_information')->get();
        return view('admin.location.index',compact('shop_info'));
    }
    public function store(Request $request){
        DB::table('shop_information')->insert([
            'shipping_charge' => $request->shipping_charge,
            'shop_name' => $request->shop_name,
            'shop_location' => $request->shop_location,
        ]);
        return redirect()->back()->with('status','Shop Info Added');
    }

    public function edit(int $id){
        $shop_info = DB::table('shop_information')
        ->where('id',$id)->first();
        if($shop_info){
            return view('admin.location.edit',compact('shop_info'));
        }else{
            return redirect()->back()->with('status','Info Not Found');
        }
    }


    public function update(Request $request,int $id){
        $shop_info = DB::table('shop_information')
        ->where('id',$id)->first();
        if($shop_info){
            DB::table('shop_information')
            ->where('id',$id)->update([
                'shipping_charge'  => $request->shipping_charge,
                'shop_name'  => $request->shop_name,
                'shop_location'  => $request->shop_location,
            ]);
            return redirect('admin/location')->with('status','Info Not Found');
        }else{
            return redirect()->back()->with('status','Info Not Found');
        }
    }

    

   


}


// shipping_charge
// shop_name
// shop_location