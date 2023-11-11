<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use App\Traits\ProcessImage;
use Illuminate\Http\Request;

class PostController extends Controller
{
    use ProcessImage;
    public function index()
    {
        $posts = Post::all();
        return view('admin.posts.index', compact('posts'));
    }
    public function add()
    {
        $categories = Category::all();
        return view('admin.posts.add',compact('categories'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'category_id' => 'required',
            'image' => 'required|mimes:jpg,png,jpeg,gif,svg,webp',
        ]);
        $uploadpath = 'uploads/posts/';
        $material = new Post();
        $material->category_id = $request->category_id;
        if ($request->hasFile('image')) {
            $material->image = $this->upload_with_modify($request->image, $uploadpath, '',1200,500);
        }
        $material->description = $request->description;
        $material->save();
        return redirect('admin/posts')->with('status', 'Post Added');
    }

    public function edit(int $id){
        $post = Post::FindOrFail($id);
        $categories = Category::all();
        return view('admin.posts.edit',compact('post','categories'));
    }

    public function update(Request $request,int $id){
        $request->validate([
            'category_id' => 'required',
        ]);

        $uploadpath = 'uploads/posts/';
        $post = Post::findOrFail($id);
        $post->category_id = $request->category_id;
        if ($request->hasFile('image')) {
            $post->image = $this->upload_with_modify($request->image, $uploadpath,$post->image,1200,500);
        }
        $post->description = $request->description;
        $post->update();
        return redirect('admin/posts')->with('status', 'Post Updated');
    }

    public function delete(int $id)
    {
        $post = Post::findOrFail($id);
        if ($post) {
            $this->deleteImage($post->image);
            $post->delete();
            return redirect()->back()->with('status', 'Post Removed');
        }
        return redirect()->back()->with('status', 'Error');
    }
}
