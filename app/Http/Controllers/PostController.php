<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware("auth");
    }

    public function index()
    {
        $posts = Post::all();
        return view("posts.index")->with("posts", $posts);
    }

    public function postsTrashed()
    {
        $posts = Post::onlyTrashed()->get();
        return view("posts.trashed", compact("posts"));
    }


    public function create()
    {
        $tags = Tag::all();
        if (count($tags) == 0) {
            redirect()->route("tags.create");
        }
        return view("posts.create", compact("tags"));
    }


    public function store(Request $request)
    {


        $this->validate($request, [

            'title' => "required",
            'description' => 'required',
            'tags' => "required",
            'photo' => 'required|image',

        ]);
        $photo = $request->photo;
        $newPhoto = time() . $photo->getClientOriginalName();
        $photo->move('uploads/posts', $newPhoto);
        $id = Auth::id();
        $post = Post::create([
            'user_id' => $id,
            'title' => $request->title,
            'description' => $request->description,
            'photo' => 'uploads/posts/' . $newPhoto,
            'slug' => str_slug($request->title)
        ]);
        $post->tags()->attach($request->tags);
        return redirect()->back()->with("success", "Post créé avec success");
    }


    public function show($slug)
    {
        $post = Post::all()->where('slug', $slug)->first();

        return view("posts.show", compact("post"));
    }


    public function edit($id)
    {
        $tags = Tag::all();
        if (count($tags) == 0) {
            redirect()->route("tags.create");
        }
        $post = Post::all()->where('id', $id)->first();

        if ($post->user_id == Auth::id()) {
            return view("posts.edit", compact("post", "tags"));
        } else {
            return redirect()->back();
        }
    }

    function update(Request $request, $id)
    {

        $this->validate($request, [

            'title' => 'required',
            'description' => 'required',


        ]);



        $post = Post::find($id);

        if ($post->user_id == Auth::id()) {
            if ($request->has('photo')) {
                $photo = $request->photo;
                $newPhoto = time() . $photo->getClientOriginalName();
                $photo->move('uploads/posts', $newPhoto);
                $post->photo = 'uploads/posts/' . $newPhoto;
            }
            $post->title = $request->title;
            $post->description = $request->description;
            $post->tags()->sync($request->tags);
            $post->save();
        }

        return redirect()->back();
    }


    public function destroy($id)
    {
        $post = Post::find($id);
        $post->delete();
        return redirect()->back();
    }
    public function hDestroy($id)
    {
        $post = Post::withTrashed()->where("id", $id)->first();
        $post->forceDelete();
        return redirect()->back();
    }
    public function restore($id)
    {
        $post = Post::withTrashed()->where("id", $id)->first();
        $post->restore();
        return redirect()->back();
    }
}
