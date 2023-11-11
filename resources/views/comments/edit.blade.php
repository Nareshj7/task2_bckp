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

        textarea {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            box-sizing: border-box;
        }

        button {
            background-color: #007BFF;
            color: black;
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
        <form method="POST" action="{{ route('comments.update', $comment) }}">
            @csrf
            @method('PUT')
            <label for="content">Comment</label>
            <textarea name="body" id="body">{{ $comment->body }}</textarea>
            <button type="submit">Update Comment</button>
        </form>
    </div>
</x-app-layout>