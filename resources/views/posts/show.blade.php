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
        <div class="row">
            <div class="card mb-3">
                <img src="{{asset($post->photo)}}" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">{{$post->title}}</h5>
                    <p>Name : {{$post->user->name}}</p>
                    <p>Tags : 
                        @foreach ($post->tags as $item)
                        <a href="" >#{{$item->tag}}</a>&nbsp
                            
                        @endforeach    
                    </p>
                    <p class="card-text">{{$post->description}}</p>
                    <a href="{{route("post.edit",$post->id)}}" class="btn btn-warning">Update</a>
                </div>
            </div>
        </div>
    </div>
@endsection




