@extends('layouts.app')

@section('content')
  <div class="container-fluid">
      <h3>{{ $user->name }}'s recent blogs</h3>
      <p>Role: {{ $user->role->name }}</p>
      <hr>
      <h3 style="font-weight: bold; text-decoration: underline">Blogs</h3>
      <div class="m-4">
          @foreach($user->blogs as $blog)
              <h2><a href="{{ route('blogs.show', $blog->id) }}" style="text-decoration: none; font-weight: bold; color: grey">{{ $blog->title }}</a></h2>
          @endforeach
      </div>
  </div>

@endsection
