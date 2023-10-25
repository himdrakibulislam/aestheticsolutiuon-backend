<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Material;
use App\Traits\ProcessImage;
use Illuminate\Http\Request;

class MaterialController extends Controller
{
    use ProcessImage;
    public function index()
    {
        $materials = Material::all();
        return view('admin.materials.index', compact('materials'));
    }
    public function add()
    {
        return view('admin.materials.add');
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'image' => 'required|mimes:jpg,png,jpeg,gif,svg,webp',
        ]);
        $uploadpath = 'uploads/materials/';
        $material = new Material();
        $material->name = $request->name;
        if ($request->hasFile('image')) {
            $material->image = $this->upload_without_modify($request->image, $uploadpath, '');
        }
        $material->description = $request->description;
        $material->save();
        return redirect('admin/materials')->with('status', 'Material Added');
    }


    public function edit(int $id){
        $material = Material::FindOrFail($id);
        return view('admin.materials.edit',compact('material'));
    }
    public function update(Request $request,int $id){
        $request->validate([
            'name' => 'required',
        ]);

        $uploadpath = 'uploads/materials/';
        
        $material = Material::FindOrFail($id);

        $material->name = $request->name;
        if ($request->hasFile('image')) {
            $material->image = $this->upload_without_modify($request->image, $uploadpath,$material->image);
        }
        $material->description = $request->description;
        $material->update();
     
        return redirect('admin/materials')->with('status', 'Material Updated');
    }

    public function delete(int $id)
    {
        $material = Material::findOrFail($id);
        if ($material) {
            $this->deleteImage($material->image);
            $material->delete();
            return redirect()->back()->with('status', 'Material Removed');
        }
        return redirect()->back()->with('status', 'Error');
    }
}
