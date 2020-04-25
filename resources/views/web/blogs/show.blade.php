@extends('layouts.app')

@section('content')

    <div class="container-fluid">
        <article>

            <div class="jumbotron">
                <div class="col-md-12">
                    <h1>{{ $blog->title }}</h1>
                </div>
{{--                    Buttons --}}
                    <div class="col-md-12">
                        <div class="btn-group">
                            <a href="{{ route('blogs.edit', $blog->id) }}" class="btn btn-primary mr-3">Edit</a>
                            <form action="{{ route('blogs.delete', $blog->id) }}" method="post">
                                {{ method_field('delete') }}
                                <button type="submit" class="btn btn-danger">Delete</button>
                                @csrf
                            </form>
                        </div>
                    </div>
                </div>

            <div class="col-md-12">
                <p>{{ $blog->body }}</p>
            </div>
        </article>
    </div>

@endsection