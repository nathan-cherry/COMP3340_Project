@extends('layouts.app')

@section('content')
    <div class="jumbotron">
        <h1 class="display-4">Products</h1>
        <p class="lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolores, recusandae?</p>
        <hr class="my-4">
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid cupiditate deserunt dolorum eligendi iste
            provident quae, sapiente sunt totam voluptas. Asperiores aut culpa doloribus est explicabo ipsum nemo
            perspiciatis voluptatibus. Consectetur cumque ducimus eligendi maiores.</p>
        <p class="lead">
            <a class="btn btn-primary btn-lg" href="#" role="button">Learn more</a>
        </p>

    </div>
    <div class="row">
        @if(count($products)>0)
            @foreach($products as $product)
                <div class="col-md-4">
                    <div class="card mb-4 box-shadow">
                        <img class="card-img-top" style="height: 25vh"
                             src=""
                             alt="Card image cap">
                        <div class="card-body">
                            <p class="card-text"><b>{{$product->name}}</b></p>
                            <p class="card-text text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                                Eveniet, facere!</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="btn-group">
                                    <a href="/products/{{$product->id}}" type="button"
                                       class="btn btn-sm btn-outline-secondary">View</a>
                                    <a href="{% url 'park_sites' park.pk %}" type="button"
                                       class="btn btn-sm btn-outline-secondary">Add</a>
                                </div>
                                <small class="text-muted">$15.99</small>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        @else
            <p>No posts found!</p>
        @endif
    </div>
@endsection
