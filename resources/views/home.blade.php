@extends('layouts.app')

@section('content')
    <h2>All Posts</h2>
    @foreach ($posts as $post)
        <div class="post">
            <h3><a href="{{ route('posts.show', $post) }}">{{ $post->title }}</a></h3>
            <p>{{ $post->content }}</p>
            <p>Posted by {{ $post->user->name }} on {{ $post->created_at->format('Y-m-d') }}</p>
        </div>
    @endforeach
@endsection
