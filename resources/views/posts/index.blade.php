@extends('layouts.app');

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
        @if (count($posts)>0)
        @foreach ($posts as $item)
      <div class="col-lg-4 mt-5">
        <div class="card" style="width: 25rem; ">
            <img src="{{asset($item->photo)}}" height="300rem"  class="card-img-top" alt="...">
            <div class="card-body">
                    <h5 class="card-title">{{$item->title}}</h5>
                    <p class="card-text">{{$item->description}}</p>
                    <div class="row">
                        <div class="col-2 mx-2">
                    <a href="{{route("post.show",$item->slug)}}" class="btn btn-primary">Show</a>
                        </div>
                        <div class="col-2 mx-2">
                            <form method="POST" action="{{route("post.destroy",$item->id)}}" >
                                @csrf
                                @method("DELETE")
                                <button type="submit" class="btn btn-danger" >Delete</button>
                            </form>
                            
                        </div>
            </div>
            </div>
          </div>
      </div>
      @endforeach
      
          
      @else 
      <div class="alert alert-info" role="alert">
       No Posts
      </div>
          
     
      @endif

      
    </div>
  </div>


    
@endsection



