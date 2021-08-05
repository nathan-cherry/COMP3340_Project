@extends('layouts.app')

@section('content')
    <h1>Create Product</h1>
{{--     Form for creating product --}}
    {!! Form::open(['action' => 'ProductsController@store', 'method'=> 'POST', 'enctype'=> 'multipart/form-data']) !!}
        <div class="form-group">
            {{Form::label('name', 'Name')}}
            {{Form::text('name', '', ['class' => 'form-control', 'placeholder' => 'Name'])}}
        </div>
        <div class="form-group">
            {{Form::label('type', 'Type')}}
            {{Form::select('type', ['men' => 'Men', 'women' => 'Women', 'kids' => 'Kids'], null,['class' => 'form-control'])}}
        </div>
        <div class="form-group">
            {{Form::label('price', 'Price')}}
            {{Form::text('price', '', ['class' => 'form-control', 'placeholder' => '12.50'])}}
        </div>
        <div class="form-group">
            {{Form::label('image', 'Image')}}
            {{Form::file('image', ['class' => 'form-control-file'])}}
        </div>
        <div class="form-group">
            {{Form::label('state', 'State')}}
            {{Form::select('state', ['in-stock' => 'In-Stock', 'sold-out' => 'Sold-Out', 'discontinued' => 'Discontinued'], null,['class' => 'form-control'])}}
        </div>
        <div class="form-group">
            {{Form::label('stock', 'Stock')}}
            {{Form::number('stock', '1', ['class' => 'form-control', 'placeholder' => 'Name'])}}
        </div>
        {{Form::submit('Submit', ['class'=>'btn btn-primary'])}}
    {!! Form::close() !!}
@endsection

