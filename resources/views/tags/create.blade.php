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
              <h1 class="display-5 fw-bold">Create Tag</h1>
              <form method="post" action="{{route("tags.store")}}" >
                @csrf
                @method("POST")
                <div class="mb-3">
                  <label for="tag" class="form-label">Tag</label>
                  <input type="text" class="form-control" name="tag" id="tag" placeholder="Tag" aria-describedby="emailHelp">
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

