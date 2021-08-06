@extends('layouts.app')

@section('content')
{{--    Admin panel jumbotron --}}
    <div class="jumbotron">
        <h1 class="display-4">Admin Panel</h1>
        <p class="lead">A monitoring page reporting the status of the website (and all its feature services) in terms of
            their working conditions (online/offline)</p>
        <hr class="my-4">
        <p class="lead">
            <a class="btn btn-primary btn-lg" href="https://github.com/nathan-cherry/COMP3340_Project/wiki/Admin-Documentation" role="button">View Admin Documentation</a>
        </p>
    </div>
{{-- Theme section --}}
    <div class="row">
        <h3>Theme</h3>
        <table class="table table-bordered">
            <thead class="thead-dark">
            <tr>
                <th scope="col" style="width: 90%">Theme</th>
                <th scope="col" style="width: 10%">Actions</th>
            </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="row"><h6 class="p-1">{{$theme->type}}</h6></th>
                    <td>
                        <a href="{{url("/admin/theme/change")}}" class="btn btn-secondary">Change</a>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
{{-- Order Section --}}
    <div class="row">
        <h3>Orders</h3>
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
        <a href="{{url('/admin/orders')}}" class="ml-auto">Show All Orders</a>
    </div>
{{-- Product Section --}}
    <div class="row">
        <h3>Products</h3>
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
        <a href="{{url('/admin/products')}}" class="ml-auto">Show All Products</a>
    </div>
{{-- User section --}}
    <div class="row mb-5">
        <h3>Users</h3>
        <table class="table table-bordered">
            <thead class="thead-dark">
            <tr>
                <th scope="col" style="width: 5%">ID</th>
                <th scope="col" style="width: 30%">Name</th>
                <th scope="col" style="width: 30%">Email</th>
                <th scope="col" style="width: 10%">Account</th>
                <th scope="col" style="width: 25%">Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($users as $user)
                <tr>
                    <th scope="row" class="text-center">{{$user->id}}</th>
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                    @if($user->isAdmin)
                        <td class="bg-success text-center" style="opacity: 0.85">Admin</td>
                    @else
                        <td class="bg-secondary text-center" style="opacity: 0.85">User</td>
                    @endif
                    <td>
                        {!! Form::open(['action' => ['AdminController@destroyUser', $user->id], 'method'=> 'POST']) !!}
                        <a href="{{url("/cart/$user->id")}}" class="btn btn-secondary">View Cart</a>
                        <a href="{{url("/admin/user/$user->id/edit")}}" class="btn btn-warning">edit</a>
                        {{Form::hidden('_method','DELETE') }}
                        {{Form::submit('Delete',['class'=>'btn btn-danger']) }}
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <a href="{{url('/admin/users')}}" class="ml-auto">Show All Users</a>
    </div>
@endsection
