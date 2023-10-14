<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AppController extends Controller
{
    public function index()
    {
        $app_info = DB::table('apps')->get();
        return view('admin.location.index', compact('app_info'));
    }
    public function store(Request $request)
    {
        $length = DB::table('apps')->count();
        if ($length < 1) {
            DB::table('apps')->insert([
                'name' => $request->name,
                'currency' => $request->currency,
            ]);
            return redirect()->back()->with('status', 'App Info Added');
        } else {
            return redirect()->back()->with('status', 'Invelid Request');
        }
    }

    public function update(Request $request, int $id)
    {
        $shop_info = DB::table('apps')
            ->where('id', $id)->first();
        if ($shop_info) {
            DB::table('apps')
                ->where('id', $id)->update([
                    'name'  => $request->name,
                    'currency'  => $request->currency,
                    'facebook'  => $request->facebook,
                    'linkedin'  => $request->linkedin,
                    'twitter'  => $request->twitter,
                    'mail'  => $request->mail,
                    'meta_title'  => $request->meta_title,
                    'meta_description'  => $request->meta_description,
                    'meta_keywords'  => $request->meta_keywords,
                ]);
            return redirect()->back()->with('status', 'App Updated');
        } else {
            return redirect()->back()->with('status', 'Info Not Found');
        }
    }
}
