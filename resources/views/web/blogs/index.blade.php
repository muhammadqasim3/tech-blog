@extends('layouts.app')

@section('content')
@foreach($blogs as $blog)
<p>{{ $blog->id }}</p>
<h2>{{ $blog->title }}</h2>
<p>{{ $blog->body }}</p>
@endforeach
@endsection