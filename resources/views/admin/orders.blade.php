@extends('layouts.app')

@section('content')
    <div class="jumbotron">
        <h1 class="display-4">Admin Panel - Orders</h1>
        <hr class="my-4">
        <a href="{{url('/admin')}}" class="btn btn-dark">Back</a>
    </div>
    <div class="row">
        <h3>Orders</h3>
{{--        Table for orders--}}
        <table class="table table-bordered">
            <thead class="thead-dark">
            <tr>
                <th scope="col" style="width: 5%">ID</th>
                <th scope="col" style="width: 35%">Product</th>
                <th scope="col" style="width: 35%">User</th>
                <th scope="col" style="width: 10%">Quantity</th>
                <th scope="col" style="width: 15%">Actions</th>
            </tr>
            </thead>
            <tbody>
{{--            Row for each order --}}
            @foreach($orders as $order)
                <tr>
                    <th scope="row" class="text-center">{{$order->id}}</th>
                    <td>{{$order->product->name}}</td>
                    <td>{{$order->user->name}}</td>
                    <td>{{$order->quantity}}</td>
                    <td>
                        {!! Form::open(['action' => ['CartController@destroy', $order->id], 'method'=> 'POST']) !!}
                        <a href="{{url("/cart/$order->id/edit")}}" class="btn btn-warning">edit</a>
                        {{Form::hidden('_method','DELETE') }}
                        {{Form::submit('Delete',['class'=>'btn btn-danger']) }}
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
{{--    Pagination link --}}
    <div class="row mt-4">
        <div class="text-xs-center ml-auto mr-auto">
            {{$orders->links()}}
        </div>
    </div>
@endsection
