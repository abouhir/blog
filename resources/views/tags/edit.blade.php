@extends('layouts.app')

@section('content')

@if (count($errors)>0)

@foreach ($errors->all() as $item)
<div class="alert alert-danger" role="alert">
 {{$item}}
</div>
@endforeach
    
@endif
    <div class="container">
        <form method="POST" action="{{route("tags.update",$tag->id)}}" >
            @csrf
            @method("PUT")
            <label for="tag" class="mt-3">Tag  </label>
            <input id="tag" class="form-control mt-3" name="tag" value="{{$tag->tag}}" placeholder="Title" />
            <div class="d-flex justify-content-center mt-5">
                <button type="submit"  class="btn btn-success col-5 ">Save</button>
            </div>
        </form>
    </div>
@endsection