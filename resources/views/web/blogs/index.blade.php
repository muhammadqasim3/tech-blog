@extends('layouts.app')

@section('title')
    Tech Blog | Blogs
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                @foreach($blogs as $blog)
                    <p>{{ $blog->id }}</p>
                    <h2><a href="{{ route('blogs.show', $blog->id) }}">{{ $blog->title }}</a></h2>
                    <p>{!! $blog->body !!}</p>
                @endforeach
            </div>
        </div>
    </div>
@endsection