@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="jumbotron">
            @if(Auth::user() && Auth::user()->role_id == 1)
                <h1>Admin Dashboard</h1>
            @elseif(Auth::user() && Auth::user()->role_id == 2)
                <h1>Author Dashboard</h1>
            @elseif(Auth::user() && Auth::user()->role_id == 3)
                <h1>User Dashboard</h1>
            @endif

        </div>
{{--        BLOGS--}}
{{--        Admin View--}}
        @if(Auth::user() && Auth::user()->role_id == 1)
            <div class="row">
                <div class="col-md-12  m-3">
                    <h2>Blogs</h2>
                    <button class="btn btn-primary mr-3">
                        <a href="{{ route('blogs') }}" class="white-text">Blogs List</a>
                    </button>
                    <button class="btn btn-primary mr-3">
                        <a href="{{ route('blogs.create') }}" class="white-text">Create Blog</a>
                    </button>
                    <button class="btn btn-danger mr-3">
                        <a href="{{ route('blogs.trash') }}" class="white-text">Trashed Blog</a>
                    </button>
                </div>
            </div>
            <hr>
    {{--CATEGORIES--}}
            <div class="row">
                <div class="col-md-12  m-3">
                    <h2>Categories</h2>
                    <button class="btn btn-primary mr-3">
                        <a href="{{ route('categories.index') }}" class="white-text">Categories List</a>
                    </button>
                    <button class="btn btn-primary mr-3">
                        <a href="{{ route('categories.create') }}" class="white-text">Create Category</a>
                    </button>
                </div>
            </div>
        </div>
    @endif
{{--    Author View--}}
    @if(Auth::user() && Auth::user()->role_id == 2)
        <div class="row">
            <div class="col-md-12  m-3">
                <h2>Blogs</h2>
                <button class="btn btn-primary mr-3">
                    <a href="{{ route('blogs') }}" class="white-text">Blogs List</a>
                </button>
                <button class="btn btn-primary mr-3">
                    <a href="{{ route('blogs.create') }}" class="white-text">Create Blog</a>
                </button>
              </div>
        </div>
        <hr>
        {{--CATEGORIES--}}
        <div class="row">
            <div class="col-md-12  m-3">
                <h2>Categories</h2>
                <button class="btn btn-primary mr-3">
                    <a href="{{ route('categories.index') }}" class="white-text">Categories List</a>
                </button>
                <button class="btn btn-primary mr-3">
                    <a href="{{ route('categories.create') }}" class="white-text">Create Category</a>
                </button>
            </div>
        </div>
        </div>
    @endif

    {{--    Subscriber View--}}
    @if(Auth::user() && Auth::user()->role_id == 3)
        <div class="row">
            <div class="col-md-12  m-3">
                <h2>Blogs</h2>
                <button class="btn btn-primary mr-3">
                    <a href="{{ route('blogs') }}" class="white-text">Blogs List</a>
                </button>
            </div>
        </div>
        <hr>
        {{--CATEGORIES--}}
        <div class="row">
            <div class="col-md-12  m-3">
                <h2>Categories</h2>
                <button class="btn btn-primary mr-3">
                    <a href="{{ route('categories.index') }}" class="white-text">Categories List</a>
                </button>
            </div>
        </div>
        </div>
    @endif
@endsection