
@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="jumbotron">
            <h1>Edit Blog</h1>
        </div>

        <div class="col-md-12">
            <form action="{{ route('blogs.update', $blog->id) }}" method="post">
                {{ method_field('patch') }}
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" name="title" class="form-control" value="{{ $blog->title }}" required>
                </div>
                <div class="form-group">
                    <label for="body">Body</label>
                    <textarea type="text" name="body" class="form-control" required>{{ $blog->body }}</textarea>
                </div>

                <button class="btn btn-primary" type="submit">Update</button>
                @csrf
            </form>
        </div>

    </div>

@endsection