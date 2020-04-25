@extends('layouts.app')

@section('content')

    <div class="container-fluid">
        <article>
            <div class="jumbotron">
                <h1>{{ $blog->title }}</h1>
            </div>

            <div class="col-md-12">
                <p>{{ $blog->body }}</p>
            </div>
            <a href="{{ route('blogs.edit', $blog->id) }}" class="btn btn-primary">Edit</a>

            <form action="{{ route('blogs.delete', $blog->id) }}" method="post">
                {{ method_field('delete') }}
                <button type="submit" class="btn btn-danger">Delete</button>
                @csrf
            </form>
        </article>
    </div>

@endsection