<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <style>
        form {
            max-width: 400px;
            margin: 0 auto;
        }

        label {
            display: block;
            margin-bottom: 5px;
        }

        input,
        textarea {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            box-sizing: border-box;
        }

        button {
            background-color: #007BFF;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        button:hover {
            background-color: #0056b3;
        }
    </style>

    <div class="py-12">
        <form method="POST" action="{{ route('posts.update', $post) }}">
            @csrf
            @method('PUT') <!-- Use the PUT method for updating -->
            <label for="title">Title</label>
            <input type="text" name="title" id="title" value="{{ $post->title }}">
            <label for="content">Content</label>
            <textarea name="content" id="content">{{ $post->content }}</textarea>
            <button type="submit">Update Post</button>
        </form>
    </div>
</x-app-layout>