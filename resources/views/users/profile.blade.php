@extends('layouts.app')



@section('content')

@if (count($errors)>0)

@foreach ($errors->all() as $item)
<div class="alert alert-danger" role="alert">
 {{$item}}
</div>
@endforeach
    
@endif
<p>

<form class="container mt-5" method="POST" action="{{route("profile.update")}}">
  @csrf 
  @method("PUT")

    <div class="mb-3">
      <label for="Province" class="form-label">Province</label>
      <input type="text" class="form-control" name="province" value="{{$user->profile->province}}" id="Province" aria-describedby="emailHelp">
    </div>
    <div class="mb-3">
     
      <input type="radio" class="form-check-input" id="male" name="gender" value="male" {{$user->profile->gender=="male" ? "checked" : ""}}/>
      <label for="male" class="form-label">Male</label>
      <input type="radio"  class="form-check-input" id="female" name="gender" value="female" {{$user->profile->gender=="female" ? "checked" : "" }}/>
      <label for="female" class="form-label">Female</label>
      
    </div>
    <div class="mb-3">
      <label for="bio" class="form-label">Bio</label>
       <textarea name="bio" class="form-control" rows="3"  placeholder="Bio">{!! $user->profile->bio !!}</textarea>
    </div>
    <div class="mb-3">
      <label for="facebook" class="form-label">Facebook URL</label>
      <input type="text" class="form-control" value="{{$user->profile->facebook}}" name="facebook" id="facebook" aria-describedby="emailHelp">
    </div>
   
    <button type="submit" class="btn btn-success">Update</button>
  </form>


    
@endsection