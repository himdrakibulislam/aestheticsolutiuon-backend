<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Comment;
use App\Models\Reply;
use App\Traits\ProcessImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class BlogController extends Controller
{
    use ProcessImage;

    // ###############
    public function index(){
        $blogs = Blog::all();

        return view('admin.blog.index',[
            'blogs' => $blogs
        ]);
    }
    public function watchBlog(int $id){
        $blog = Blog::findOrFail($id);
        return view('admin.blog.view',[
            'blog' => $blog
        ]);
    }
    public function create(){       
        return view('admin.blog.create');
    }
    public function store(Request $request){       
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'banner' => 'required|mimes:jpeg,png,jpg,gif'
        ]);

        $uploadPath = 'uploads/blogs/';
        $blog = new Blog();

        $blog->title = $request->title;
        $blog->slug = Str::slug($request->title);
        $blog->author_id = Auth::guard('admin')->user()->id;
        $blog->short_description = $request->short_description;
        $blog->description = $request->description;
        if($request->hasFile('banner')){
            $blog->banner = $this->upload_with_modify($request->banner,$uploadPath,'',1300,650);
        }
       
        $blog->status = $request->status === TRUE ? 1 : 0 ;

        $blog->meta_title = $request->meta_title;
        $blog->meta_description = $request->meta_description;
        $blog->meta_keywords = $request->meta_keywords;

        $blog->save();
        
        return redirect('admin/blogs')->with('success','Post Created Successfully');

    }
    public function edit(int $id){
        $blog = Blog::findOrFail($id);
        return view('admin.blog.edit',compact('blog'));
    }
    public function update(Request $request,int $id){
        $request->validate([
            'title' => 'required',
            'description' => 'required',
        ]);

        $uploadPath = 'uploads/blogs/';
        $blog = Blog::where('id',$id)->first();

        $blog->title = $request->title;
        $blog->slug = Str::slug($request->title);
        $blog->author_id = Auth::guard('admin')->user()->id;
        $blog->short_description = $request->short_description;
        $blog->description = $request->description;
        if($request->hasFile('banner')){
            $blog->banner = $this->upload_with_modify($request->banner,$uploadPath,$blog->banner,1300,650);
        }
       
        $blog->status = $request->status === TRUE ? 1 : 0 ;

        $blog->meta_title = $request->meta_title;
        $blog->meta_description = $request->meta_description;
        $blog->meta_keywords = $request->meta_keywords;

        $blog->update();
        
        return redirect('admin/blogs')->with('success','Post Updated Successfully');
    }

    public function deletePost(int $id){
        $blog = Blog::findOrFail($id);

        $this->deleteImage($blog->banner);
        
        // delete comment

        // $comments = Comment::where('blog_id',$id)->get();
        // if($comments->count() > 0){
        //     foreach ($comments as $comment) {
        //         $replies = Reply::where('comment_id',$comment->id)->get();
        //         if($replies->count() > 0){
        //             foreach ($replies as $reply) {
        //                 $reply->delete();
        //             }
        //         }
        //         $comment->delete();
        //     }
        // }

        $blog->delete();
        
        return redirect('admin/blogs')->with('success','Blog Removed Successfully!');

    }

}
