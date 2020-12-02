<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostsController extends Controller
{
    public function index() 
    {
        $all = Post::all();
        return view('posty/index', compact('all'));
    }
    public function store(Request $request)
    {
        Post::create($request->all());
        return redirect()->route('posty');
    }

    public function public(Post $item)
    {
        $item->update(['status'=>'1']);

        return redirect()->route('posty');
    }

    public function destroy(Post $item) 
    {
        $item->delete();
        return redirect()->route('posty');
    }
}
