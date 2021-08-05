@extends('layouts.app')

@section('content')
    <h1>Edit Product</h1>
{{--    Form for editing product --}}
    {!! Form::open(['action' => ['ProductsController@update', $product->id], 'method'=> 'POST', 'enctype'=> 'multipart/form-data']) !!}
    <div class="form-group">
        {{Form::label('name', 'Name')}}
        {{Form::text('name', $product->name, ['class' => 'form-control', 'placeholder' => 'Name'])}}
    </div>
    <div class="form-group">
        {{Form::label('type', 'Type')}}
        {{Form::select('type', ['men' => 'Men', 'women' => 'Women', 'kids' => 'Kids'], $product->type,['class' => 'form-control'])}}
    </div>
    <div class="form-group">
        {{Form::label('price', 'Price')}}
        {{Form::text('price', $product->price, ['class' => 'form-control', 'placeholder' => '12.50'])}}
    </div>
    <div class="form-group">
        {{Form::label('image', 'Image')}}
        {{Form::file('image', ['class' => 'form-control-file'])}}
    </div>
    <div class="form-group">
        {{Form::label('state', 'State')}}
        {{Form::select('state', ['in-stock' => 'In-Stock', 'sold-out' => 'Sold-Out', 'discontinued' => 'Discontinued'],  $product->state,['class' => 'form-control'])}}
    </div>
    <div class="form-group">
        {{Form::label('stock', 'Stock')}}
        {{Form::number('stock', $product->stock, ['class' => 'form-control', 'placeholder' => 'Name'])}}
    </div>
    {{Form::hidden('_method','PUT')}}
    {{Form::submit('Submit', ['class'=>'btn btn-primary'])}}
    {!! Form::close() !!}
@endsection

