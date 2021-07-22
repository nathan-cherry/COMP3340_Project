@extends('layouts.app')

@section('content')
    <div class="container mt-5 mb-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header"><b>Add to Cart</b></div>

                    <div class="card-body">
                        <div class="container">
                            @auth
                                {!! Form::open(['action' => 'CartController@store', 'method'=> 'POST']) !!}
                                <h3>{{$product->name}}</h3>
                                {{ Form::hidden('prod_id', $product->id) }}
                                <div class="form-group">
                                    {{Form::label('quantity', 'Quantity')}}
                                    {{Form::number('quantity', '1', ['class' => 'form-control', 'min'=>'1'])}}
                                </div>
                                {{Form::submit('Submit', ['class'=>'btn btn-primary'])}}
                                {!! Form::close() !!}
                            @elseauth
                                <p>You must login first!</p>
                            @endauth
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
