
@extends('layouts.app')

@section('content') 

<div class="container">
<div class="jumbotron">
    <h1>Create New Blog</h1>
</div>

<div class="col-md-12">
    <form action="{{ route('blogs.store') }}" method="post">
        <div class="form-group mt-3">
            <label for="title">Title</label>
            <input type="text" name="title" class="form-control" required>
        </div>
        <div>
            Categories
        </div>
        <div class="form-group form-check form-check-inline">
            @foreach($categories as $category)
                <input type="checkbox" value="{{ $category->id }}" name="category_id[]" class="form-check-input">
                <label class="form-check-label mr-3"> {{ $category->name }}</label>
            @endforeach
        </div>
        <div class="form-group">
            <label for="body">Body</label>
            <textarea type="text" name="body" class="form-control" rows="10" required></textarea>
        </div>
        <hr>
        <button class="btn btn-primary" type="submit">Create</button>
        @csrf
    </form>
</div> 

</div>

@endsection 