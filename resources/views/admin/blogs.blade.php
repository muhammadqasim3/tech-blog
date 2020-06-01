@extends('layouts.app')

@section('title')
    Tech Blog | Blogs
@endsection

@section('content')
    <div class="container">
        <div class="jumbotron">
            <h1 class="text-center text-muted">Manage Blogs</h1>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row mt-4">
            <div class="col-md-6">
                <h3 class="font-weight-bold text-muted">Published</h3>
                <hr>
                @foreach($published_blogs as $blog)
                    {{--                    toggle button for publish/draft--}}
                    <form action="{{ route('blogs.update', $blog->id) }}" method="post"  class="float-right">
                        {{ method_field('patch') }}
                        @csrf
                        <input type="checkbox" name="status" value="0" checked style="display: none">
                        <button class="btn btn-info text-dark btn-xs font-weight-bold text-white" type="submit">Save as draft</button>
                    </form>

                    <h2><a href="{{ route('blogs.show', $blog->id) }}">{{ $blog->title }}</a></h2>
                    <p>{!! str_limit($blog->body, 300)  !!}</p>

                @endforeach
            </div>
            <div class="col-md-6">
                <h3 class="font-weight-bold text-muted">Draft</h3>
                <hr>
                @foreach($draft_blogs as $blog)
                    <form action="{{ route('blogs.update', $blog->id) }}" method="post"  class="float-right">
                        {{ method_field('patch') }}
                        @csrf
                        <input type="checkbox" name="status" value="1" checked style="display: none">
                        <button class="btn btn-success text-dark btn-xs font-weight-bold" type="submit">Publish</button>
                    </form>

                    <h2><a href="{{ route('blogs.show', $blog->id) }}">{{ $blog->title }}</a></h2>
                    <p>{!! str_limit($blog->body, 300) !!}</p>
                @endforeach
            </div>
        </div>
    </div>
@endsection