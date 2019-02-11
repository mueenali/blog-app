@extends('layouts.admin')

@section('content')

    <h1>Edit User</h1>
    <div class="row">

        <div class="col-sm-3">
            <img height="200" src="{{$user->photo? '/'. $user->photo->path: 'http://placehold.it/400x400'}}" alt="">
        </div>
        <div class="col-sm-9">
            {!! Form::model($user,['method'=>'PATCH','action' => ['AdminUsersController@update',$user->id],'files'=>true]) !!}
            <div class="form-group">
                {!!Form::label('name','Name:')!!}
                {!!Form::text('name',null,['class'=>'form-control'])!!}
            </div>

            <div class="form-group">
                {!!Form::label('email','Email:')!!}
                {!!Form::email('email',null,['class'=>'form-control'])!!}
            </div>

            <div class="form-group">
                {!!Form::label('password','Password:')!!}
                {!!Form::password('password',['class'=>'form-control'])!!}
                <p id="passwordHelpBlock" class="form-text text-muted">
                    Your password must be more than 8 characters long, should contain at-least 1 Uppercase, 1 Lowercase,
                    1 Numeric and 1 special character.
                </p>
            </div>

            <div class="form-group">
                {!! Form::label('role_id', 'Role:') !!}
                {!! Form::select('role_id', $roles , null, ['class'=>'form-control'])!!}

            </div>

            <div class="form-group">
                {!!Form::label('is_active','Status:')!!}
                {!!Form::select('is_active',[1 =>'Active', 0 =>'Not Active'],null,['class'=>'form-control'])!!}
            </div>

            <div class="form-group">
                {!! Form::label('photo_id', 'Photo:') !!}
                {!! Form::file('photo_id', null, ['class'=>'form-control'])!!}
            </div>

            <div class="form-group">
                {!! Form::submit('Update User',['class'=>'btn btn-success col-sm-3'])!!}
            </div>

            {!! Form::close() !!}

            {!! Form::open(['method' => 'DELETE','action' => ['AdminUsersController@destroy',$user->id]]) !!}

            <div class="form-group">
                {!! Form::submit('Delete',['class'=>'btn btn-danger col-sm-3'])!!}
            </div>
            {!! Form::close() !!}

        </div>
    </div>
    <div class="row">
        @include('includes.errors');
    </div>




@stop

