@extends('layouts.app')

@section('content')
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
    <div class="row">
        <img src="" alt="This is an image">
    </div>
@endsection
