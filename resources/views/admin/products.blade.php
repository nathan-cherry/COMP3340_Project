@extends('layouts.app')

@section('content')
    <div class="jumbotron">
        <h1 class="display-4">Admin Panel - Products</h1>
        <hr class="my-4">
        <a href="{{url('/admin')}}" class="btn btn-dark">Back</a>
    </div>
    <div class="row">
        <h3>Products</h3>
        <a href="{{url("/products/create")}}" class="btn btn-primary ml-auto mb-3">Add +</a>
{{--        table for products--}}
        <table class="table table-bordered">
            <thead class="thead-dark">
            <tr>
                <th scope="col" style="width: 5%">ID</th>
                <th scope="col" style="width: 50%">Product Name</th>
                <th scope="col" style="width: 10%">Price</th>
                <th scope="col" style="width: 10%">Type</th>
                <th scope="col" style="width: 5%">Stock</th>
                <th scope="col" style="width: 20%">Actions</th>
            </tr>
            </thead>
            <tbody>
{{--            row for each product--}}
            @foreach($products as $product)
                <tr>
                    <th scope="row" class="text-center">{{$product->id}}</th>
                    <td>{{$product->name}}</td>
                    <td>${{$product->price}}</td>
                    <td>{{$product->type}}</td>
                    @if($product->state == 'in-stock')
                        <td class="bg-success text-center" style="opacity: 0.85">{{$product->stock}}</td>
                    @elseif($product->state == 'sold-out')
                        <td class="bg-danger text-center" style="opacity: 0.85">{{$product->stock}}</td>
                    @else
                        <td class="bg-secondary text-center">{{$product->stock}}</td>
                    @endif
                    <td>
                        {!! Form::open(['action' => ['ProductsController@destroy', $product->id], 'method'=> 'POST']) !!}
                        <a href="{{url("/products/$product->id")}}" class="btn btn-secondary">View</a>
                        <a href="{{url("/products/$product->id/edit")}}" class="btn btn-warning">edit</a>
                        {{Form::hidden('_method','DELETE') }}
                        {{Form::submit('Delete',['class'=>'btn btn-danger']) }}
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
{{--    links for pagination--}}
    <div class="row mt-4">
        <div class="text-xs-center ml-auto mr-auto">
            {{$products->links()}}
        </div>
    </div>
@endsection
