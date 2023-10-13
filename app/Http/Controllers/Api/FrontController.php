<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FrontController extends Controller
{
    public function get_projects()
    {
        $projets = Project::all();
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

    public function shopInformation()
    {
        $shopInfo = DB::table('shop_information')->first();
        return response()->json([
            'status' => 200,
            'shopInfo' => $shopInfo
        ]);
    }
}
