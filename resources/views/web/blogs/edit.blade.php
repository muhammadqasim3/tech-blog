
@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="jumbotron" style="padding-top: 70px">
            <h1>Edit Blog</h1>
            @if($blog->featured_image)
                <img src="{{ asset('storage/blogs/'.$blog->featured_image) }}" style="width: 200px; float: right; margin-top: -110px">
            @else
                <img src="{{ asset('images/blog-default.png') }}" style="width: 200px; float: right; margin-top: -110px">
            @endif
        </div>

        <div class="col-md-12">
            <form action="{{ route('blogs.update', $blog->id) }}" method="post"  enctype="multipart/form-data">
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

                <div class="form-group">
                    <label for="featured_image">Featured Image</label>
                    <input type="file" name="featured_image" class="form-control py-1">
                </div>

                <hr>
                <button class="btn btn-primary" type="submit">Update</button>
                @csrf
            </form>
        </div>

    </div>

@endsection