@extends('layouts.admin')

@section('content')
    <h1>Comments</h1>
    @if($comments)
        <table class="table table-dark">
            <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Author</th>
                <th scope="col">Email</th>
                <th scope="col">Body</th>
                <th scope="col">Created_At</th>
                <th scope="col">Post</th>
                <th scope="col">Replies</th>
            </tr>
            </thead>
            <tbody>
            @foreach($comments as $comment)
                <tr>
                    <th>{{$comment->id}}</th>
                    <td>{{$comment->author}}</td>
                    <td>{{$comment->email}}</td>
                    <td>{{$comment->body}}</td>
                    <td>{{$comment->created_at->diffForHumans()}}</td>
                    <td><a href="{{route('post.index',$comment->post_id)}}">View Post</a></td>
                    <td><a href="{{route('replies.show',$comment->id)}}">View replies</a></td>
                    <td>
                        @if($comment->is_active ==1)
                            {!! Form::open(['method'=>'PATCH','action' => ['AdminCommentsController@update',$comment->id]]) !!}
                        <input type="hidden" name="is_active" value= "0">
                            <div class="form-group">
                                {!! Form::submit('Unapprove',['class'=>'btn btn-success'])!!}
                            </div>
                            {!! Form::close() !!}
                        @else
                            {!! Form::open(['method'=>'PATCH','action' => ['AdminCommentsController@update',$comment->id]]) !!}
                            <input type="hidden" name="is_active" value= "1">
                            <div class="form-group">
                                {!! Form::submit('Approve',['class'=>'btn btn-success'])!!}
                            </div>
                            {!! Form::close() !!}
                        @endif
                    </td>
                    <td>
                        {!! Form::open(['method'=>'DELETE','action' => ['AdminCommentsController@destroy',$comment->id]]) !!}
                        <div class="form-group">
                            {!! Form::submit('Delete',['class'=>'btn btn-danger'])!!}
                        </div>
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    @else
        <h1 class="text-center">No Comments</h1>
    @endif
@stop
