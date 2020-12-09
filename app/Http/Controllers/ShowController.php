<?php

namespace App\Http\Controllers;
use App\Models\Post;
use App\Models\Mail;
use Illuminate\Http\Request;

class ShowController extends Controller
{
    public function works()
    {
        $posts = Post::where('status', '1')->get();
        return view('posty/prace', compact('posts'));
    }

    public function store(Request $request)
    {   
        Mail::create($request->all());
        return redirect()->route('welcome');
    }
}
