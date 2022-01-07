<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

    public function __construct()
    {
        $this->middleware("auth");
    }
  
    public function index()
    {
        $users = User::all();
        return view("users.index",compact("users"));
    }

 
    public function create()
    {
        return view("users.create");
    }

    
    public function store(Request $request)
    {
        $this->validate($request,[
            "name"=>"required" , 
            "email"=>"required" , 
            "password" =>"required" 
        ]);

       $user = User::create([
        "name"=>$request->name , 
        "email" => $request->email , 
        "password" => Hash::make($request->password),
       ]);
       $profile = Profile::create([
        'province'=>"Casa",
        'user_id'=>$user->id,
        'gender'=>"male",
        'bio'=>"bouhir abdo devlopper",
        'facebook' => "abderrahmane bouhir"
    ]);

    return redirect()->route("users");
    }
    public function destroy($id)
    {
        $user = User::find($id);

        $user->delete(); 

        return redirect()->route("users");
    }
}
