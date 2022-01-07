<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
 
    public function index()
    {
        $tags = Tag::all();
        return view("tags.index",compact("tags")); 
    }

   
    public function create()
    {
        return view("tags.create");
    }


    public function store(Request $request)
    {
        $this->validate($request,[
            "tag"=>"required"
        ]);

        $tag=Tag::create([
            'tag' => $request->tag
        ]);
       
   return redirect()->back();
    }


    public function show(Tag $tag)
    {
        
    }

  
    public function edit($id)
    {
        $tag = Tag::find($id);
        return view("tags.edit",compact("tag"));
    }

 
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            "tag"=>"required"
        ]);

        $tag = Tag::find($id);
        $tag->tag = $request->tag;
        $tag->save();

   return redirect()->back();
    }

    public function destroy(Tag $tag)
    {
        $tag = Tag::find($tag->id); 
        $tag->delete(); 
        return redirect()->back();  

    }
}
