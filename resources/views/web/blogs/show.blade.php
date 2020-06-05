@extends('layouts.app')

@include('partials.meta_dynamic')
@section('content')
    <div class="container-fluid">
        <article>
            <div class="jumbotron">
                <div class="col-md-12">
                    <h1>{{ $blog->title }}</h1>
                    <span class="font-weight-bold">Categories: </span>
                    @foreach($blog->category as $category)
                        <a href="{{ route('categories.show', $category->slug) }}"><span class="mx-1">{{ $category['name'] }}</span></a>
                    @endforeach
                </div>
{{--                    Buttons --}}
                @if(Auth::user()  && (Auth::user()->role_id === 1 || Auth::user()->role_id === 2 && Auth::user()->id === $blog->user->id))
                    <div class="col-md-12 mt-2">
                        <div class="btn-group">
                            <a href="{{ route('blogs.edit', $blog->id) }}" class="btn btn-primary mr-3">Edit</a>
                            <form action="{{ route('blogs.delete', $blog->id) }}" method="post">
                                {{ method_field('delete') }}
                                <button type="submit" class="btn btn-danger">Delete</button>
                                @csrf
                            </form>
                        </div>
                    </div>
                @endif
                </div>

            <div class="col-md-12">
                <p>{!! $blog->body !!} </p>
            </div>
            <span><strong>Author:</strong> <a href="{{ route('users.show', $blog->user->id) }}" class="text-muted" style="text-decoration: none">
                    {{ $blog->user->name }}</a>
                | <strong>Posted:</strong> <span class="text-muted">{{ $blog->created_at->diffForHumans() }}</span>
            </span>
        </article>
        <hr>
{{--        DISQUS Comments--}}
    <aside>
        <div id="disqus_thread"></div>
        <script>
            (function() {
                var d = document, s = d.createElement('script');
                s.src = 'https://techblog-13.disqus.com/embed.js';
                s.setAttribute('data-timestamp', +new Date());
                (d.head || d.body).appendChild(s);
            })();
        </script>
    </aside>


    </div>

@endsection
