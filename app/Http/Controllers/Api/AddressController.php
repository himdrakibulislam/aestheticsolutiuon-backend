<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Address;
use App\Models\Location\Division;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AddressController extends Controller
{
    // all division with district 
    public function allDivision(){
        $divisions = Division::all();
        return response()->json([
            'status' => 200,
            'divisions' => $divisions
        ]);
    }
    //add address
    public function addAddress(Request $request){

        $validators = Validator::make($request->all(),[
            'fullname' => 'required',
            'phone' => 'required|numeric',
            'division' => 'required',
            'district' => 'required',
            'sub_district' => 'required',
            'area' => 'required',
            'street_address' => 'required',
            'zipcode' => 'required',
        ]);
        if($validators->fails()){
            return response()->json([
                'status' => 422,
                'errors' => $validators->messages(),
            ]);
        }

        $address = new Address();

        $address->user_id = auth('sanctum')->user()->id;
        $address->fullname = $request->fullname;
        $address->phone = $request->phone;
        $address->division = $request->division;
        $address->district = $request->district;
        $address->sub_district = $request->sub_district;
        $address->union = $request->union;
        $address->holding = $request->holding;
        $address->area = $request->area;
        $address->street_address = $request->street_address;
        $address->zipcode = $request->zipcode;

        $checkExistOrNot = Address::where('user_id',auth('sanctum')->user()->id)
        ->first();
        if(!$checkExistOrNot){
            $address->default = 1;
        }
        $address->save();

       

        return response()->json([
            'status' => 200,
            'message' => 'Address saved'
        ]);
    }

    public function updateAddress(Request $request,int $id){

        $validators = Validator::make($request->all(),[
            'fullname' => 'required',
            'phone' => 'required|numeric',
            'division' => 'required',
            'district' => 'required',
            'sub_district' => 'required',
            'area' => 'required',
            'street_address' => 'required',
            'zipcode' => 'required',
        ]);
        if($validators->fails()){
            return response()->json([
                'status' => 422,
                'errors' => $validators->messages(),
            ]);
        }

        $address = Address::findOrFail($id);

        $address->user_id = auth('sanctum')->user()->id;
        $address->fullname = $request->fullname;
        $address->phone = $request->phone;
        $address->division = $request->division;
        $address->district = $request->district;
        $address->sub_district = $request->sub_district;
        $address->union = $request->union;
        $address->holding = $request->holding;
        $address->area = $request->area;
        $address->street_address = $request->street_address;
        $address->zipcode = $request->zipcode;
        
        $address->update();


        return response()->json([
            'status' => 200,
            'message' => 'Address Updated'
        ]);
    }

    
    public function setDefaultAddress(int $id){
        $userId =  auth('sanctum')->user()->id;

        $check = Address::where('user_id',$userId)
                ->where('id',$id)
                ->first();
                
        if(!$check){
            return response()->json([
                'status' => 404,
                'message' => 'Address Not Found!'
            ]);
        }
        $addresses = Address::where('user_id',$userId)->get();
        foreach ($addresses as $address) {
            if ($address->id === $id) {
                $address->default = 1;
               
            }
            if($address->id != $id){
                $address->default = 0;
            }
            $address->update();
   
        }
        return response()->json([
            'status' => 200,
            'message' => 'Set As Default.'
        ]);
    }



    public function deleteAddress(int $id){
        Address::destroy($id);
        return response()->json([
            'status' => 200,
             'message' => 'Address removed'
        ]);
    }
}



// empty array check 
// if(sizeof($address) === 0){
//     return 'Data Not Found!';
// }