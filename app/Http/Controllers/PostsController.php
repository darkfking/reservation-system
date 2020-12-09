<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class PostsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index() 
    {
        $all = Post::all();
        return view('posty/index', compact('all'));
    }
    public function store(Request $request)
    {
        $cover = $request->file('bookcover');
        $extension = $cover->getClientOriginalExtension();
        Storage::disk('public')->put($cover->getFilename().'.'.$extension,  File::get($cover));
        $destinationPath = 'uploads';
        $cover->move($destinationPath,$cover->getFilename().'.'.$extension);
        $post = new Post();
        $post->title = $request->title;
        $post->description = $request->description;
        $post->status = $request->status;
        $post->mime = $cover->getClientMimeType();
        $post->original_filename = $cover->getClientOriginalName();
        $post->filename = $cover->getFilename().'.'.$extension;
        $post->save();

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
