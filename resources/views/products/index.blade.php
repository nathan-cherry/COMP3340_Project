@extends('layouts.app')

@section('content')
    <div class="jumbotron">
        <h1 class="display-4">Products</h1>
        <p class="lead">NIMSE makes it our mission to provide a variety of products so that there will always be
            something for everyone.</p>
        <hr class="my-4">
        <p>All of our products are produced within Canada and no profit is made on any purchase. After the employees
            are paid, the rest of our income goes right towards our partnership with the WWF. </p>
        <p class="lead">
            <a class="btn btn-primary btn-lg" href="#" role="button">Learn more</a>
        </p>

    </div>
    <div class="row">
        @if(count($products)>0)
            @foreach($products as $product)
                <div class="col-md-4">
                    <div class="card mb-4 box-shadow">
                        <img class="card-img-top" style="height: 25vh;"
                             src="/storage/product_images/{{$product->image_path}}"
                             alt="Card image">
                        <div class="card-body">
                            <p class="card-text"><b>{{$product->name}}</b></p>
                            {{--                            <p class="card-text text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit.--}}
                            {{--                                Eveniet, facere!</p>--}}
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="btn-group">
                                    <a href="/products/{{$product->id}}" type="button"
                                       class="btn btn-sm btn-outline-secondary">View</a>
                                    @auth
                                        <form action="">

                                        </form>
                                    <a href="/cart/create/{{$product->id}}" type="button"
                                       class="btn btn-sm btn-outline-secondary">Add</a>
                                    @endauth
                                </div>
                                <small class="text-muted">${{$product->price}}</small>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
    </div>
    <hr>
    <div class="row mt-4">
        <div class="text-xs-center ml-auto mr-auto">
            {{$products->links()}}
        </div>
    </div>
    @else
        <p>No posts found!</p>
        </div>
    @endif
@endsection
