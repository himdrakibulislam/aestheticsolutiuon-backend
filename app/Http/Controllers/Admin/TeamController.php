<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Team;
use App\Traits\ProcessImage;
use Illuminate\Http\Request;

class TeamController extends Controller
{
    use ProcessImage;
    function getTeam(){
        $team = Team::all();
        return view('admin.team.index',['team' => $team]);
    }
    function create(){
        return view('admin.team.add');
    }
    function store(Request $request){
        $request->validate([
            'name' => 'required',
            'designation' => 'required',
            'profile' => 'required|mimes:jpeg,png,jpg,gif,webp',
        ]);
        $uploadPath = 'uploads/team/';
        $team = new Team();

        $team->name = $request->name ; 
        $team->designation = $request->designation ; 
        $team->biodata = $request->biodata ; 
        if($request->hasFile('profile')){
            
        $team->profile = $this->upload_with_modify($request->file('profile'),$uploadPath,'',200,200); 
        }
        $team->phone = $request->phone ; 
        $team->facebook = $request->facebook ; 
        $team->instagram = $request->instagram ; 
        $team->linkedin = $request->linkedin ;
        $team->save();

        return redirect('admin/team')->with('status', 'Team Member Added');
    }
    public function edit(int $id){
        $team = Team::findOrFail($id);
        return view('admin.team.edit',['team'=> $team]);
    }
    public function update(Request $request,int $id){
        $request->validate([
            'name' => 'required',
            'designation' => 'required',
        ]);

        $team = Team::find($id);
        if(!$team){
            return redirect()->back()->with('status', 'Team Member Not found');
        }

        $uploadPath = 'uploads/team/';
       
        $team->name = $request->name ; 
        $team->designation = $request->designation ; 
        $team->biodata = $request->biodata ; 
        if($request->hasFile('profile')){
            
        $team->profile = $this->upload_with_modify($request->file('profile'),$uploadPath,$team->profile,200,200); 
        }
        $team->phone = $request->phone ; 
        $team->facebook = $request->facebook ; 
        $team->instagram = $request->instagram ; 
        $team->linkedin = $request->linkedin  ;
        $team->update();

        return redirect('admin/team')->with('status', 'Team Member Updated');
    }

    public function detail(int $id){
        $team = Team::findOrFail($id);
        return view('admin.team.detail',['team' => $team]);
    }
    public function removeMember(int $id){
        $team = Team::findOrFail($id);
        $this->deleteImage($team->profile);
        $team->delete();
        return redirect('admin/team')->with('status', 'Team Member Removed');
    }

}
