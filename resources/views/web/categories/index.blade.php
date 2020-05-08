@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                @foreach($categories as $category)
                    <p>{{ $category->id }}</p>
                    <h2><a href="{{ route('categories.show', $category->slug) }}">{{ $category->name }}</a></h2>
                    <p>{{ $category->slug }}</p>
                @endforeach
            </div>
        </div>
    </div>
@endsection