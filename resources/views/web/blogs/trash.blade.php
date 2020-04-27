@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="jumbotron">
            <h1>Trashed Blogs</h1>
        </div>
    </div>
    <div class="col-md-12">
{{--        Retrieving trashed blogs --}}
        @foreach($trashedBlogs as $trashedBlog)
            <p>{{ $trashedBlog->id }}</p>
            <h2><a href="{{ route('blogs.show', $trashedBlog->id) }}">{{ $trashedBlog->title }}</a></h2>
            <p>{{ $trashedBlog->body }}</p>

        <div class="btn-group">
    {{--        restore --}}
            <form action="{{ route('blogs.restore', $trashedBlog->id) }}" method="get">
                <button class="btn btn-info mr-3" type="submit">Restore</button>
                @csrf
            </form>

{{--        Permanent Delete --}}
            <form action="{{ route('blogs.permanent-delete', $trashedBlog->id) }}" method="post">
                {{ method_field('delete') }}
                <button class="btn btn-danger">Permanent Delete</button>
                @csrf
            </form>
        </div>
        @endforeach
    </div>

@endsection