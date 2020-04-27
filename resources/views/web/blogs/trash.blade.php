@extends('layouts.app')

@section('content')
    @foreach($trashedBlogs as $trashedBlog)
        <p>{{ $trashedBlog->id }}</p>
        <h2><a href="{{ route('blogs.show', $trashedBlog->id) }}">{{ $trashedBlog->title }}</a></h2>
        <p>{{ $trashedBlog->body }}</p>
    @endforeach
@endsection