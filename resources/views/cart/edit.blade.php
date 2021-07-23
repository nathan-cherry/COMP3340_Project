@extends('layouts.app')

@section('content')
    <div class="container mt-5 mb-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                @auth
                        <div class="card">
                            <div class="card-header"><b>Add to Cart</b></div>

                            <div class="card-body">
                                <div class="container">
                                    {!! Form::open(['action' => ['CartController@update', $order->id], 'method'=> 'POST']) !!}
                                    <h3>{{$order->product->name}}</h3>
                                    {{ Form::hidden('prod_id', $order->product_id) }}
                                    <div class="form-group">
                                        {{Form::label('quantity', 'Quantity')}}
                                        {{Form::number('quantity', $order->quantity, ['class' => 'form-control', 'min'=>'1'])}}
                                    </div>
                                    {{Form::hidden('_method','PUT')}}
                                    {{Form::submit('Update', ['class'=>'btn btn-primary'])}}
                                    {!! Form::close() !!}

                                </div>
                            </div>
                        </div>

                @elseauth
                    <p>You must login first!</p>
                @endauth
            </div>
        </div>
    </div>
@endsection
