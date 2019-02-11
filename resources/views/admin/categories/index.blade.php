@extends('layouts.admin');

@section('content')
    @if(Session::has('created_category'))
        <p>{{Session::get('created_category')}}</p>
    @elseif(Session::has('updated_category'))
        <p>{{Session::get('updated_category')}}</p>
    @elseif(Session::has('deleted_category'))
        <p class="bg-danger">{{Session::get('deleted_category')}}</p>
    @endif

    <h1>Categories</h1>
    <table class="table table-dark">
        <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Name</th>
            <th scope="col">Created_At</th>
            <th scope="col">Updated_At</th>
        </tr>
        </thead>
        <tbody>
        @if($categories)
            @foreach($categories as $category)
                <tr>
                    <th scope="row">{{$category->id}}</th>
                    <td><a href="{{route('categories.edit',$category->id)}}">{{$category->name}}</a></td>
                    <td>{{$category->created_at->diffForHumans()}}</td>
                    <td>{{$category->updated_at->diffForHumans()}}</td>
                </tr>
            @endforeach
        @endif
        </tbody>
    </table>
    <div class="row ">
        <div class="col-sm-6 col-sm-offset-5">
            {{$categories->links()}}
        </div>
    </div>
@stop
