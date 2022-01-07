@extends('layouts.app')


@section('content')
   <div class="container ">
       <div class="row">
        <div class="alert alert-danger" role="alert">
        
          </div>
       </div>
    <div class="row">
      <div class="col">
        <div class="p-5 mb-4 bg-light rounded-3">
            <div class="container-fluid py-5">
              <h1 class="display-5 fw-bold">Create Post</h1>
              <form method="post" action="{{route("post.store")}}" enctype="multipart/form-data">
                @csrf
                @method("POST")
                <div class="mb-3">
                  <label for="title" class="form-label">Title</label>
                  <input type="text" class="form-control" name="title" id="title" placeholder="Title" aria-describedby="emailHelp">
                </div>
                <div class="mb-3 row">
                  
                  @foreach ($tags as $tag)     
                  <div class="col-2">
                  <label for="{{$tag->tag}}" class="form-label">{{$tag->tag}}</label>
                  <input type="checkbox" class="" name="tags[]" value="{{$tag->id}}" id="{{$tag->tag}}"  aria-describedby="emailHelp">
                  </div>
                  @endforeach
                </div>
                <div class="mb-3">
                  <label for="description" class="form-label">Description</label>
                  <textarea class="form-control" id="description" name="description" placeholder="Description" rows="4" ></textarea>
                </div>
                <div class="mb-3">
                    <label for="photo" class="form-label">Image</label>
                    <input type="file" class="form-control" id="photo"  name="photo"/>
                </div>
                <div class="mt-5 d-flex justify-content-center">
                    <button type="submit" class="btn btn-primary col-5 ">Create</button>
                </div>
              </form>
            </div>
          </div>
      </div>
    </div>
   
  </div> 



  
@endsection

