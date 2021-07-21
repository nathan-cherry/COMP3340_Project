@extends('layouts.app')

@section('content')
<div class="container mt-5 mb-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Welcome {{Auth::user()->name}}!</div>

                <div class="card-body">
                    <div class="container">
                        <p> You are logged in.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
