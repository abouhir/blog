<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::get("/profile","ProfileController@index")->name("profile");

Route::put("/profile/update","ProfileController@update")->name("profile.update");

Route::get("/posts","PostController@index")->name("posts");
Route::get("/posts/trashed","PostController@postsTrashed")->name("posts.trashed");
Route::get("/post/create","PostController@create")->name("post.create");
Route::post("/post/store","PostController@store")->name("post.store");
Route::get("/post/show/{slug}","PostController@show")->name("post.show");
Route::get("/post/{id}","PostController@edit")->name("post.edit");
Route::put("/post/update/{id}","PostController@update")->name("post.update");
Route::delete("/post/destroy/{id}","PostController@destroy")->name("post.destroy");
Route::delete("/post/hDelete/{id}","PostController@hDestroy")->name("post.hdelete");
Route::get("/post/restore/{id}","PostController@restore")->name("post.restore");


Route::resource("tags","TagController");

Route::get("/users","UserController@index")->name("users");
Route::get("/user/create","UserController@create")->name("user.create");
Route::post("/user/store","UserController@store")->name("user.store");
/*Route::get("/user/edit/{id}","UserController@create")->name("user.edit");
Route::put("/user/update/{id}","UserController@update")->name("user.update");*/
Route::delete("/user/destroy/{id}","UserController@destroy")->name("user.destroy");





