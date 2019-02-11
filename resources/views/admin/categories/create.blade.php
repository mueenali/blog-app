@extends('layouts.admin')

@section('content')

    {!! Form::open(['method'=>'POST','action' => 'AdminCategoriesController@store']) !!}
    <h1>Create Category</h1>
    <div class="form-group">
        {!!Form::label('name','Name:')!!}
        {!!Form::text('name',null,['class'=>'form-control'])!!}
    </div>
    <div class="form-group">
        {!! Form::submit('Create Category',['class'=>'btn btn-success'])!!}
    </div>

    {!! Form::close() !!}

    <div class="row">
        @include('includes.errors');
    </div>

@stop
