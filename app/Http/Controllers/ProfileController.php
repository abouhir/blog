<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware("auth");
    }
    public function index()
    {
        $user = Auth::user();
        $id = Auth::id();
        if ($user->profile == null) {
            $profile = Profile::create([
                'province'=>"Casa",
                'user_id'=>$id,
                'gender'=>"male",
                'bio'=>"bouhir abdo devlopper",
                'facebook' => "abderrahmane bouhir"
            ]);
        }

        return view("users.profile")->with('user',$user);
    }

   
    public function create()
    {
        //
    }

 
    public function store(Request $request)
    {
        //
    }

   
    public function show($id)
    {
        //
    }

   
    public function edit($id)
    {
        //
    }

    
    public function update(Request $request)
    {
        $this->validate($request,[
        "province"=>"required" ,
        "gender" =>"required" ,
        "bio" =>"required" ,
        ]) ;   //

        $user=Auth::user();
        $user->profile->province = $request->province;
        $user->profile->gender=$request->gender ; 
        $user->profile->bio=$request->bio;
        $user->profile->facebook=$request->facebook;
        $user->profile->save();

        return redirect()->back();
    }

   
    public function destroy($id)
    {
        
    }
}
