
@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="jumbotron">
            <h1>Edit Blog</h1>
        </div>

        <div class="col-md-12">
            <form action="{{ route('blogs.update', $blog->id) }}" method="post">
                {{ method_field('patch') }}
                <div class="form-group mt-3">
                    <label for="title">Title</label>
                    <input type="text" name="title" class="form-control" value="{{ $blog->title }}" required>
                </div>
                <div class="form-group form-check form-check-inline">
{{--                    checked boxes--}}
                    {{ $blog->category->count() ? 'Selected Categories: ' : '' }} &nbsp;
                    @foreach($blog->category as $category)
                        <input type="checkbox" value="{{ $category->id }}" name="category_id[]" class="form-check-input" checked>
                        <label class="form-check-label mr-3"> {{ $category->name }}</label>
                    @endforeach
                </div>
                <br>
                <div class="form-group form-check form-check-inline">
                    {{--                    checked boxes--}}
                    {{ $filtered_categories->count() ? 'Unselected Categories: ' : '' }} &nbsp;
                    @foreach($filtered_categories as $category)
                        <input type="checkbox" value="{{ $category->id }}" name="category_id[]" class="form-check-input">
                        <label class="form-check-label mr-3"> {{ $category->name }}</label>
                    @endforeach
                </div>

                <div class="form-group">
                    <label for="body">Body</label>
                    <textarea type="text" name="body" class="form-control" required>{{ $blog->body }}</textarea>
                </div>
                <hr>
                <button class="btn btn-primary" type="submit">Update</button>
                @csrf
            </form>
        </div>

    </div>

@endsection