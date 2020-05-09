@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                    <h1>Show Category</h1>
                    <h2>Name: {{ $category->name }}</h2>
            </div>
            {{--                    Buttons --}}
            <div class="col-md-12">
                <div class="btn-group">
                    <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-primary mr-3">Edit</a>
                    <form action="{{ route('categories.destroy', $category->id) }}" method="post">
                        {{ method_field('delete') }}
                        <button type="submit" class="btn btn-danger">Delete</button>
                        @csrf
                    </form>
                </div>
            </div>

            <div id="line"><hr></div>
            <div class="col-md-12 mt-4">
                @foreach($category->blog as $blog)
                    <p>{{ $blog->id }}</p>
                    <h3><a href="{{ route('blogs.show', $blog->id) }}">{{ $blog->title }}</a></h3>
                    <p>{{ $blog->body }}</p>
                @endforeach
            </div>

        </div>
    </div>
@endsection