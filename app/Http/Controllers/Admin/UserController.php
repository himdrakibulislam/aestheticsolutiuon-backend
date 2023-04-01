<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Social;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class UserController extends Controller
{
    public function index(){
        $users = User::orderBy('id','DESC')->get();
        return view('admin.users.index',compact('users'));
    }
   
    public function view(int $id){
        $user = User::findOrFail($id);
        return view('admin.users.view',compact('user'));
    }
    public function updateStatus(Request $request,int $id){
        User::whereId($id)->update([
            'status' => $request->status
        ]);
        return redirect()->back()->with('status','Status Updated');
    }

    public function deleteUser(int $id){
      
        $user = User::findOrFail($id);

        if(File::exists($user->photoURL)){
            File::delete($user->photoURL);
        }
        $user->delete();

        return redirect('admin/users')->with('status','User Removed');
    }

    // social user
    public function social(){
        $users = Social::orderBy('id','DESC')->get();
        return view('admin.users.social',compact('users'));
    }
    public function socialView(int $id){
        $user = Social::findOrFail($id);
        return view('admin.users.socialview',compact('user'));
    }
    public function deleteSU(int $id){
        Social::destroy($id);
        return redirect('admin/social/users')->with('status','User Deleted');
    }
}
