@extends('layouts.app')

@section('content')
    <div class="col-md-12">
        @foreach($blogs as $blog)
            <p>{{ $blog->id }}</p>
            <h2><a href="{{ route('blogs.show', $blog->id) }}">{{ $blog->title }}</a></h2>
            <p>{{ $blog->body }}</p>
        @endforeach
    </div>
@endsection