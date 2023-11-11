<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="ml-4 py-12">

        <style>
            .container {
                max-width: 600px;
                margin: 0 auto;
                text-align: center;
            }

            h1 {
                color: #333;
            }

            h2 {
                color: #555;
            }

            .btn-primary {
                display: inline-block;
                margin-top: 10px;
                padding: 8px 15px;
                background-color: #007BFF;
                color: white;
                text-decoration: none;
                border-radius: 4px;
            }

            .btn-primary:hover {
                background-color: #0056b3;
            }

            .comment-container {
                margin-bottom: 10px;
            }

            p {
                margin-bottom: 5px;
                display: inline-block;
            }

            a {
                color: #007BFF;
                text-decoration: none;
                margin-right: 10px;
            }

            a:hover {
                text-decoration: underline;
            }

            button {
                background-color: #dc3545;
                color: black;
                padding: 6px 10px;
                border: none;
                border-radius: 4px;
                cursor: pointer;
                margin-left: 5px;
            }

            button:hover {
                background-color: #c82333;
            }
        </style>

        <div class="container">
            <h1>{{ $post->title }}</h1>
            <h2>{{ $post->content }}</h2>

            @auth
            <a href="{{ route('comments.create', ['post' => $post->id]) }}" class="btn btn-primary">Add Comment</a>
            <br />
            @endauth

            <div id="comments">
                <strong>Comments:</strong>
                @if(count($post->comments) == 0)
                <p>No comments to display</p>
                @else
                @foreach ($post->comments as $comment)
                <div class="comment-container">
                    <p>
                        {{ $comment->body }}
                        @auth
                        @if ($comment->user_id == auth()->user()->id)
                        <a href="{{ route('comments.edit', $comment) }}">Edit</a>
                    <form method="POST" action="{{ route('comments.destroy', $comment) }}" style="display: inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Delete</button>
                    </form>
                    @endif
                    @endauth
                    </p>
                </div>
                @endforeach
                @endif
            </div>
        </div>



    </div>
</x-app-layout>