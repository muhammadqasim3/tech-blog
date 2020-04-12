
@extends('layouts.app')

@section('content') 

<div class="container">
<div class="jumbotron">
    <h1>Create New Blog</h1>
</div>

<div class="col-md-12">
    <form action="{{ route('blogs.store') }}" method="post">
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" name="title" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="body">Body</label>
            <textarea type="text" name="body" class="form-control" required></textarea>
        </div>

        <button class="btn btn-primary" type="submit">Create</button>
        @csrf
    </form>
</div> 

</div>

@endsection 