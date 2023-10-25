<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Category;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;

class FrontController extends Controller
{
    public function get_projects()
    {
        $projets = Project::orderBy('id','DESC')->get();
        return response()->json([
            'data' => $projets
        ], 200);
    }
    public function find_project($slug)
    {
        $projet = Project::where('slug', $slug)->first();
        if (!$projet) {
            return response()->json(['data' => 'Project not found', 404]);
        }
        return response()->json([
            'data' => $projet
        ], 200);
    }
    // team
    public function get_team()
    {
        $team = DB::table('teams')->get();
        return response()->json([
            'data' => $team
        ], 200);
    }
    public function find_team($id)
    {
        $team = DB::table('teams')
            ->where('id', $id)
            ->first();
        if (!$team) {
            return response()->json(['data' => 'Team Member not found', 404]);
        }
        return response()->json([
            'data' => $team
        ], 200);
    }
    // blog
    public function get_blog()
    {
        $blog = Blog::all();
        return response()->json([
            'data' => $blog
        ], 200);
    }
    public function find_blog($slug)
    {
        $blog = Blog::where('slug', $slug)
            ->first();
        if (!$blog) {
            return response()->json(['data' => 'Blog not found', 404]);
        }
        return response()->json([
            'data' => $blog
        ], 200);
    }
    // categories 
    public function categories(){
        $cacheKey = 'all_categorieswithpost';
        $cacheMinutes = 60; 
        // Check if the data is cached
        if (Cache::has($cacheKey)) {
            // Retrieve data from the cache
            $data = Cache::get($cacheKey);

        } else {
            $categories = DB::table('categories')->get();
            $posts = DB::table('posts')
            ->join('categories', 'posts.category_id', '=', 'categories.id')
            ->select('posts.*', 'categories.name')
            ->take(10)->get();
            $data = ['categories'=> $categories,'posts'=> $posts];
          
            Cache::put($cacheKey, $data, $cacheMinutes);
        }
        return response()->json($data,200);
        
    }

    public function category_by_id(int $id){
        $category = Category::find($id);
        if($category){
            return response()->json($category,200); 
        }else{
            return response()->json(['status' => 'Category Not Found'],200); 
        }
    }
    // materials 
    public function materials(){
        $materials = DB::table('materials')->get();
        return response()->json($materials,200);
    }
    public function application()
    {
        $cacheKey = 'application_info';
        $cacheMinutes = 60; // Adjust the cache duration as needed

        // Check if the data is cached
        if (Cache::has($cacheKey)) {
            // Retrieve data from the cache
            $data = Cache::get($cacheKey);
        } else {
            // Data is not in the cache, so retrieve it from the database
            $data = DB::table('apps')->first();

            // Store the data in the cache for future use
            Cache::put($cacheKey, $data, $cacheMinutes);
        }

        return response()->json($data,200);
    }
}
