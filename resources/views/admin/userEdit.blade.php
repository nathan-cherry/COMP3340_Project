@extends('layouts.app')

@section('content')
    <h1>Edit User</h1>
{{--    Edit form--}}
    {!! Form::open(['action' => ['AdminController@updateUser', $user->id], 'method'=> 'POST', 'enctype'=> 'multipart/form-data']) !!}
    <div class="form-group">
        {{Form::label('name', 'Name')}}
        {{Form::text('name', $user->name, ['class' => 'form-control', 'placeholder' => 'Name'])}}
    </div>
    <div class="form-group">
        {{Form::label('email', 'Email')}}
        {{Form::email('email', $user->email, ['class' => 'form-control'])}}
    </div>
    <div class="form-group">
        {{Form::label('isAdmin', 'User Type')}}
        {{Form::select('isAdmin', ['0' => 'User', '1' => 'Admin'], $user->isAdmin,['class' => 'form-control'])}}
    </div>
    {{Form::hidden('_method','PUT')}}
    {{Form::submit('Submit', ['class'=>'btn btn-primary'])}}
    {!! Form::close() !!}
@endsection

