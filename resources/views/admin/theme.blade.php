@extends('layouts.app')

@section('content')
    <h1>Update Theme</h1>
{{--    Theme create form--}}
    {!! Form::open(['action' => 'AdminController@storeTheme', 'method'=> 'POST', 'enctype'=> 'multipart/form-data']) !!}

        <div class="form-group">
            {{Form::label('type', 'Type')}}
            {{Form::select('type', ['default' => 'Default', 'light' => 'Light', 'dark' => 'Dark', 'crazy' => 'Crazy'], 'default',['class' => 'form-control'])}}
        </div>
        {{Form::submit('Submit', ['class'=>'btn btn-primary'])}}
    {!! Form::close() !!}
@endsection

