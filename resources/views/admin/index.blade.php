@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="jumbotron">
            <h1>Admin Dashboard</h1>
        </div>

        <div class="col-md-12">
            <button class="btn btn-primary mr-3">
                <a href="{{ route('blogs.create') }}" class="white-text">Create Blog</a>
            </button>
            <button class="btn btn-danger mr-3">
                <a href="{{ route('blogs.trash') }}" class="white-text">Trashed Blog</a>
            </button>
        </div>
    </div>
@endsection