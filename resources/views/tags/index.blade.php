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

      @if (count($tags)>0)
      <table class="table table-striped">
        <thead>
          <th>Tag</th>
          <th>Actions</th>
        </thead>
        <tbody>
       
            @foreach ($tags as $item)
          <tr>
            <td>{{$item->tag}}</td>
            <td class="row">
              <div class="col">
                <a href="{{route('tags.edit',$item->id)}}" class="btn btn-warning">Update</a>
              </div>
              <div class="col">
                <form action="{{route("tags.destroy",$item)}}" method="POST">
                  @csrf
                  @method('DELETE')
                <button type="submit" class="btn btn-danger">Delete</button>
              </form>
              </div>
            </td>
          </tr>
          @endforeach
        </tbody>
     
      </table>
      
      
          
      @else 
      <div class="alert alert-info" role="alert" style="margin-top: 20%">
        No Tags
      </div>
          
     
      @endif

      
    </div>
  </div>


    
@endsection



