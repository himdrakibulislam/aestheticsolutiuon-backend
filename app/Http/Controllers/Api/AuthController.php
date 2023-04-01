<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Mail\VerificationCode;
use App\Models\Social;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Auth\Events\Verified;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Image;

class AuthController extends Controller
{
    public function user(Request $request){
        return $request->user();
    }



    public function profileUpload(Request $request){
        
        $request->validate([
            'profileImage' => 'required|mimes:jpeg,png,jpg,gif'
        ]);

        $uploadPath = 'uploads/profiles/';
        try {
            if($request->hasFile('profileImage')){
                if(File::exists($request->user()->photoURL)){
                    File::delete($request->user()->photoURL);
                }
                $filename = $request->profileImage->getClientOriginalExtension();
                $profile = Str::random(14).'.'.$filename;
    
                // $request->profileImage->move($uploadPath,$profile);
    
                Image::make($request->profileImage)->resize(400, 300)->save($uploadPath.$profile);
    
                User::whereId($request->user()->id)->update([
                    'photoURL' => $uploadPath.$profile
                ]);
                return response()->json([
                    'status'=>200,
                    'message'=>'Profile Updated!'
                ]);
    
            }
        } catch (\Throwable $th) {
             return redirect()->back()->with('status','An Error Occured');
        }

    }



    public function updatePassword(Request $request){
        $request->validate([
            'old_password' => 'required',
            'new_password' => 'required|confirmed|min:8',
        ]);
        #Match The Old Password
        if(!Hash::check($request->old_password, auth('sanctum')->user()->password)){
            return response()->json([
                "message" => "Old Password Doesn't match!"
            ]);
        }

        #Update the new Password
        User::whereId(auth('sanctum')->user()->id)->update([
            'password' => Hash::make($request->new_password)
        ]);

        return response()->json([
            "status" => 200,
            "message" => "Password changed successfully!"
        ]);
    }


    public function social(Request $request){
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'social_type' => 'required',
        ]);
      
        if (Social::where('email',$request->email)->exists()) {
            $user = Social::where('email',$request->email)->first();
               $token =  $user->createToken($request->email)->plainTextToken;
           return response()->json([
            'token' => $token
           ]);

         }else{
           $users =  Social::create([
                'name' => $request->name,
                'email' => $request->email,
                'social_type' => $request->social_type,
                'email_verified_at' => date('Y-m-d H:i:s'),
                'photoURL' => $request->photoURL,
               
            ]);
            $token =  $users->createToken($request->email)->plainTextToken;
            return response()->json([
             'token' => $token
            ]);
         }
    }


    public function verifyOTP(Request $request) {
        $request->validate([
            'email' => 'required',
            'verification_code' => 'required|numeric'
        ]);

        $user = User::where('email', $request->email)
                ->firstOrFail();
        if(!$user){
            return response()->json([
                'message'=>'User Not Found',
                'status' => 400
            ]);
        }
        if ($user->hasVerifiedEmail()) {
            return response()->json(['message' => 'User has already been verified.'], 400);
        }
        elseif($request->verification_code === $user->verification_code){

            
            if ($user->otp_expiry < now()) {
                return response()->json(['message' => 'Verification code has expired.'], 400);
            }
            
            $user->markEmailAsVerified();
            event(new Verified($user));
            return response()->json([
                'message'=>'Verified',
                'status' => 200
            ]);
        }else{
            return response()->json([
           'message'=>'OTP does not match',
           'status' => 400  
        ]);
        }
    }

    public function resendOTP(Request $request){
    $validator = Validator::make($request->all(), [
        'email' => 'required|string|email|max:255'
    ]);

    if ($validator->fails()) {
        return response()->json(['errors' => $validator->errors()], 422);
    }

    $user = User::where('email', $request->email)->first();

    if (!$user) {
        return response()->json(['message' => 'User not found.'], 404);
    }

    if ($user->hasVerifiedEmail()) {
        return response()->json(['message' => 'User has already been verified.'], 400);
    }

    $user->verification_code = rand(1000, 9999);
    $user->otp_expiry = now()->addMinutes(4);
    $user->save();

    Mail::to($user->email)->send(new VerificationCode($user));

    return response()->json(['message' => 'Verification code has been sent to the user.','status' => 200]);
   }


    
    public function logout(Request $request){

        if($request->social_type){
            $user = Social::where('id',$request->id)->first();
        }else{
            $user = User::where('id',$request->id)->first();
        }

        $user->tokens()->delete();
        return response()->json([
        'status' =>200,
        'message' =>'Logout Successfully'
        ]);
    }

    
}
