@extends('layouts.app')

@section('title')
    Tech Blog | Users
@endsection

@section('content')
    <div class="container">
        <div class="jumbotron">
            <h1 class="text-center text-muted">Manage Users</h1>
        </div>

        <div class="row">
            <div class="col-md-12">
                @foreach($users as $user)
                    <p>{{ $user->name }}</p>
                @endforeach
            </div>
        </div>
    </div>
@endsection