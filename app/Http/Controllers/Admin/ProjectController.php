<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProjectFormRequest;
use App\Models\Project;
use App\Models\ProjectImage;
use App\Traits\ProcessImage;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    use ProcessImage;
    public function index()
    {
        $projects  =  Project::orderBy('id', 'DESC')->get();
        return view('admin.projects.index', compact('projects'));
    }
    public function add()
    {

        return view('admin.projects.add');
    }
    public function store(ProjectFormRequest $request)
    {
        $validatedData  = $request->validated();
        
        $project = Project::create([
            'author_id' => auth()->guard('admin')->user()->id,
            'location' =>  $validatedData['location'],
            'photograph' => $request->photograph,
            'sector' => $validatedData['sector'],
            'description' => $validatedData['description'],
            'slug' => Str::slug($validatedData['location']),
            'youtube' => $request->youtube,
            'meta_title' => $request->meta_title,
            'meta_keyword' => $request->meta_keyword,
            'meta_description' => $request->meta_description,

        ]);

        //store images
        if ($request->hasFile('image')) {
            $uploadPath = 'uploads/projects/';
            $i = 1;
            foreach ($request->file('image') as $imageFile) {

                $image_path = $this->upload_without_modify($imageFile, $uploadPath, '');

                ProjectImage::create([
                    'project_id' => $project->id,
                    'image' => $image_path
                ]);
            }
        }

        return redirect('admin/projects')->with('status', 'Project Added');
    }
    public function edit(int $id)
    {
        $project = Project::findOrFail($id);
        return view('admin.projects.edit', compact('project'));
    }
    public function update(Request $request, int $product_id)
    {
        $request->validate([
            'location' => 'required',
            'sector' => 'required',
            'description' => 'required',
            
        ]);
        $project = Project::where('id', $product_id)->first();
        if ($project) {
            $project->update([
                'location' =>  $request->location,
                'photograph' => $request->photograph,
                'sector' => $request->sector,
                'description' => $request->description,
                'youtube' => $request->youtube,
                'meta_title' => $request->meta_title,
                'meta_keyword' => $request->meta_keyword,
                'meta_description' => $request->meta_description,
            ]);

            if ($request->hasFile('image')) {
                $uploadPath = 'uploads/projects/';
                $i = 1;
                foreach ($request->file('image') as $imageFile) {
                    $image_path = $this->upload_without_modify($imageFile, $uploadPath, '');

                ProjectImage::create([
                    'project_id' => $project->id,
                    'image' => $image_path
                ]);
                }
            }

            return redirect('admin/projects')->with('status', 'Project Updated');
        } else {
            return redirect('admin/projects')->with('status', 'No such Project Id found');
        }
    }

    public function detail(Project $id)
    {
        $project = $id;
        return view('admin.projects.detail', compact('project'));
    }

    public function desctroyImage(int $id)
    {
        $projectImage = ProjectImage::findOrFail($id);

        if (File::exists($projectImage->image)) {
            File::delete($projectImage->image);
        }
        $projectImage->delete();
        return redirect()->back()->with('status', 'Project image deleted');
    }

    public function destroy(int $project_id)
    {
        $project = Project::findOrFail($project_id);
        if ($project->projectImages) {
            foreach ($project->projectImages as $image) {
                if (File::exists($image->image)) {
                    File::delete($image->image);
                }
            }
        }
        $project->delete();
        return redirect('admin/projects')->with('status', 'Project Deleted');
    }
}
