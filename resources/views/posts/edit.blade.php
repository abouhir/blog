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
        <form method="POST" action="{{route("post.update",$post->id)}}" enctype="multipart/form-data">
            @csrf
            @method("PUT")
            <label for="title" class="mt-3">Title  </label>
            <input id="title" class="form-control" name="title" value="{{$post->title}}" placeholder="Title" />
            <div class="mb-3 row">
                  
                @foreach ($tags as $tag)     
                <div class="col-2">
                    <label for="{{$tag->tag}}" class="form-label">{{$tag->tag}}</label>
                    <input type="checkbox"  name="tags[]" value="{{$tag->id}}" id="{{$tag->tag}}"  aria-describedby="emailHelp" 
                    @foreach ($post->tags as $item1)  
                        @if ($item1->id==$tag->id)
                            checked
                        @endif 

                    @endforeach
                    />
                </div>
                @endforeach
              </div>
            <label for="description" class="mt-3">Description  </label>
            <input id="description" class="form-control mt-2" name="description" value="{{$post->description}}" placeholder="Title" />  
            <label for="photo" class="mt-3">Photo </label>
            <input id="photo" type="file" class="form-control mt-2" name="photo"    placeholder="Photo" />  
            <div class="d-flex justify-content-center mt-5">
                <button type="submit"  class="btn btn-success col-5 ">Save</button>
            </div>
        </form>
    </div>
@endsection