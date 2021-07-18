@extends('layouts.app')

@section('content')
    <div class="row">
        <a href="/products" class="btn btn-dark">Back</a>
        <div class="col-md-4">
            <img src="" alt="This is an image">
        </div>
        <div class="col-md-8">
            <h1>{{$product->name}}</h1>
        </div>

    </div>
@endsection
