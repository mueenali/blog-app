@extends('layouts.admin')

@section('content')

    {!! Form::open(['method'=>'POST','action' => 'AdminUsersController@store','files'=>true]) !!}
    <h1>Create Users</h1>
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
            Your password must be more than 8 characters long, should contain at-least 1 Uppercase, 1 Lowercase, 1
            Numeric and 1 special character.
        </p>
    </div>

    <div class="form-group">
        {!! Form::label('role_id', 'Role:') !!}
        {!! Form::select('role_id', [''=>'Choose Options'] + $roles , null, ['class'=>'form-control'])!!}

    </div>

    <div class="form-group">
        {!!Form::label('is_active','Status:')!!}
        {!!Form::select('is_active',[1 =>'Active', 0 =>'Not Active'],0,['class'=>'form-control'])!!}
    </div>

    <div class="form-group">
        {!! Form::label('photo_id', 'Photo:') !!}
        {!! Form::file('photo_id', null, ['class'=>'form-control'])!!}
    </div>

    <div class="form-group">
        {!! Form::submit('Create User',['class'=>'btn btn-success'])!!}
    </div>

    {!! Form::close() !!}

    @include('includes.errors');

@stop

