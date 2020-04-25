@extends('layouts.app')

@section('content')
    @foreach($blogs as $blog)
        <p>{{ $blog->id }}</p>
        <h2><a href="{{ route('blogs.show', $blog->id) }}">{{ $blog->title }}</a></h2>
        <p>{{ $blog->body }}</p>
    @endforeach
@endsection