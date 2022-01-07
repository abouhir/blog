@extends('layouts.app')

@section('content')
<div class="container">
    <table class="table table-dark table-striped">
        <thead>
            <tr>
                <th>#</th>
                <th>Nom</th>
                <th>@Email</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $item)
            <tr>
                <td>{{$item->id}}</td>
                <td>{{$item->name}}</td>
                <td>{{$item->email}}</td>
                <form action="{{route("user.destroy",$item->id)}}" method="post">
                    @csrf 
                    @method("DELETE")
                    <td><button type="submit" class="btn btn-danger"><i class="fa fa-trash-alt"></i></button></td>
                </form>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection