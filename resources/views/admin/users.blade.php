@extends('layouts.app')

@section('content')
    <div class="jumbotron">
        <h1 class="display-4">Admin Panel - Users</h1>
        <hr class="my-4">
        <a href="/admin" class="btn btn-dark">Back</a>
    </div>
    <div class="row">
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
                        <a href="/cart/{{$user->id}}" class="btn btn-secondary">View Cart</a>
                        <a href="/admin/user/{{$user->id}}/edit" class="btn btn-warning">edit</a>
                        {{Form::hidden('_method','DELETE') }}
                        {{Form::submit('Delete',['class'=>'btn btn-danger']) }}
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    <div class="row mt-4">
        <div class="text-xs-center ml-auto mr-auto">
            {{$users->links()}}
        </div>
    </div>
@endsection
