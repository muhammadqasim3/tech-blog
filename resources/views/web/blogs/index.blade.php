@extends('layouts.app')

@section('title')
    Tech Blog | Blogs
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                @foreach($blogs as $blog)
{{--                    <p>{{ $blog->id }}</p>--}}
                    <h2><a href="{{ route('blogs.show', $blog->id) }}" style="text-decoration: none; font-weight: bold; color: grey">{{ $blog->title }}</a></h2>
                    @if($blog->featured_image)
                        <img src="{{ asset('storage/blogs/'.$blog->featured_image) }}" style="width: 200px; float: right; ">
                    @else
                        <img src="{{ asset('images/blog-default.png') }}" style="width: 200px; float: right;">
                    @endif
                    <p>{!! $blog->body !!}</p>
                    <span><strong>Author:</strong> <a href="{{ route('users.show', $blog->user->id) }}" class="text-muted" style="text-decoration: none">{{ $blog->user->name }}</a> | <strong>Posted:</strong> <span class="text-muted">{{ $blog->created_at->diffForHumans() }}</span>
                    <hr>
                @endforeach
            </div>
        </div>
    </div>
@endsection
