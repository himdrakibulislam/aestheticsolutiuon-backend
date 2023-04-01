<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\AllMail;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class AdminController extends Controller
{
    public function index(){
        $admins = Admin::orderBy('id','DESC')->get();
        return view('admin.admin.index',compact('admins'));
    }
    public function addAdmin(Request $request){
        $request->validate([
            'name' => 'required',
            'email' => 'required|unique:admins'
        ]);
        $password = Str::random(8);
        $login_url = url("/")."/admin/login";

            $data = [];
            $title = 'Recognized as admin';
            $content = "<div class='my-5'>
            Congratulation <b>{$request->name}</b>,
            <p class='text-justify'>

            You have been selected as the admin of <b>ekantomart.com </b> . Make sure your access of <b>ekantomart.com</b> admin panel click the below button.Log in with the below credentials.
            <p/>

            <div class='mb-4'>

            Username or email : <b>{$request->email}</b>
            <br>
            Password : <b>{$password}</b>
            </div>


            <a href='{$login_url}' 
            class='btn btn-success' target='_blank'>LOGIN TO ADMIN PANEL<a/>
        </div>";

        $data['content'] = $content;
        $data['title'] = $title;

        Mail::to($request->email)->send(new AllMail($data));

        $user = Admin::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($password)
        ]);
        
        $user->markEmailAsVerified();
  
        return redirect()->back()->with('status','Admin Added. e-mail sent with credentials.');
    }


    public function view(int $id){
        $admin = Admin::findOrFail($id);
        return view('admin.admin.view',compact('admin'));
    }

    public function change(){
        return view('admin.admin.change');
    }
    public function changePassword(Request $request){
        $request->validate([
            'old_password' => 'required',
            'new_password' => 'required|confirmed|min:8',
        ]);
        #Match The Old Password
        if(!Hash::check($request->old_password, auth()->guard('admin')->user()->password)){
            return redirect()->back()->with("status","Old Password Doesn't match!");
        }

        #Update the new Password
        Admin::whereId(auth()->guard('admin')->user()->id)->update([
            'password' => Hash::make($request->new_password)
        ]);

        return redirect()->back()->with(
           
            "status","Password changed successfully!"
        );
    }



    public function removeAdmin(int $id){
        if(Admin::all()->count() === 1){
            return redirect('admin/dashboard/admins')->with('status','You Can not remove this admin.');
        }
        Admin::destroy($id);
        return redirect('admin/dashboard/admins')->with('status','Admin removed');
    }
}
