@extends('layouts.admin')

@section('content')
    @if(Session::has('created_post'))
        <p>{{Session::get('created_post')}}</p>
    @elseif(Session::has('updated_post'))
        <p>{{Session::get('updated_post')}}</p>
    @elseif(Session::has('deleted_post'))
        <p class="bg-danger">{{Session::get('deleted_post')}}</p>
    @endif
    <h1>Posts</h1>
    <table class="table table-dark">
        <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Photo</th>
            <th scope="col">Title</th>
            <th scope="col">Category</th>
            <th scope="col">User</th>
            <th scope="col">Post</th>
            <th scope="col">Comments</th>
            <th scope="col">Created_At</th>
            <th scope="col">Updated_At</th>
        </tr>
        </thead>
        <tbody>
        @if($posts)
            @foreach($posts as $post)
                <tr>
                    <th scope="row">{{$post->id}}</th>
                    <td><img height="50" src="{{$post->photo ? $post->photo->path: 'http://placehold.it/400x400'}}"
                             alt=""></td>
                    <td><a href="{{route('posts.edit',$post->id)}}">{{$post->title}}</a></td>
                    <td>{{$post->user->name}}</td>
                    <td>{{$post->category->name}}</td>
                    <td><a href="{{route('post.index',$post->slug)}}">View Post</a></td>
                    <td><a href="{{route('comments.show',$post->id)}}">View comments</a></td>
                    <td>{{$post->created_at->diffForHumans()}}</td>
                    <td>{{$post->updated_at->diffForHumans()}}</td>
                </tr>
            @endforeach
        @endif
        </tbody>
    </table>
    <div class="row ">
        <div class="col-sm-6 col-sm-offset-5">
            {{$posts->links()}}
        </div>
    </div>
@stop
