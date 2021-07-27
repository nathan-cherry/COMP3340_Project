@extends('layouts.app')

@section('content')
    <div class="row mt-5 mb-5">
        <div class="col-md-4">
            <div class="border border-secondary text-center rounded" style="width: 100%; height: 100%;">
                <img class="m-4" src="/storage/product_images/{{$product->image_path}}" alt="Product Image" style="height: 25vh">
            </div>
        </div>
        <div class="col-md-8">
            <div class="row">
                <div class="col-md-8">
                    <h1>{{$product->name}}</h1>
                </div>
                <div class="col-md-4">
                    <div class="float-right" style="padding: 5px 0;">
                        {!! Form::open(['action' => ['ProductsController@destroy', $product->id], 'method'=> 'POST']) !!}
                        <a href="/products" class="btn btn-dark">Back</a>
                        @auth
                            @if(Auth::user()->isAdmin)
                                <a href="/products/{{$product->id}}/edit" class="btn btn-warning">edit</a>
                                {{Form::hidden('_method','DELETE') }}
                                {{Form::submit('Delete',['class'=>'btn btn-danger']) }}
                            @endif
                        @endauth
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
            <div class="row p-3">
                @auth
                    <a href="/cart/create/{{$product->id}}" type="button"
                       class="btn btn-primary">Add to Cart</a>
                @endauth
            </div>
        </div>
    </div>
    <div class="row" style="margin-bottom: 32%"></div>
@endsection
