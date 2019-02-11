@extends('layouts.admin');

@section('content')

    @if(Session::has('created_user'))
        <p>{{Session::get('created_user')}}</p>
    @elseif(Session::has('updated_user'))
        <p>{{Session::get('updated_user')}}</p>
    @elseif(Session::has('deleted_user'))
        <p class="bg-danger">{{Session::get('deleted_user')}}</p>
    @endif

    <h1>users</h1>
    <table class="table table-dark">
        <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Photo</th>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">Role</th>
            <th scope="col">Status</th>
            <th scope="col">Created At</th>
            <th scope="col">Updated At</th>
        </tr>
        </thead>
        <tbody>
        @if($users)
            @foreach($users as $user)
                <tr>
                    <th scope="row">{{$user->id}}</th>
                    @if(!$user->photo)
                        <td scope="row"><img height="50" src="{{'http://placehold.it/50x50'}}" alt=""
                                             class="img-responsive img rounded"></td>
                    @else
                        <td scope="row"><img height="50" src="{{$user->photo->path}}"></td>
                    @endif
                    <td scope="row"><a href="{{route('users.edit',$user->id)}}">{{$user->name}}</a></td>
                    <td scope="row">{{$user->email}}</td>
                    <td scope="row">{{$user->role->name}}</td>
                    @if($user->is_active == 1)
                        <td scope="row">Active</td>
                    @else
                        <td>Not Active</td>
                    @endif
                    <td scope="row">{{$user->created_at->diffForHumans()}}</td>
                    <td scope="row">{{$user->updated_at->diffForHumans()}}</td>
                </tr>
            @endforeach
        @endif
        </tbody>
    </table>
    <div class="row ">
        <div class="col-sm-6 col-sm-offset-5">
            {{$users->links()}}
        </div>
    </div>
@stop
