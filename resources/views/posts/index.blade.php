<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Posts') }}
        </h2>
    </x-slot>

    <style>
        table {
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        td,
        th {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        tr:nth-child(even) {
            background-color: #dddddd;
        }
    </style>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <a href="{{ route('posts.create') }}">Create new post</a><br />


            <table>
                <tr>
                    <th>Title</th>
                    <th>Created By</th>
                    <th>Edit</th>
                    <th>Delete</th>
                    <th>View Post</th>
                </tr>

                @foreach ($posts as $post)
                <tr>
                    <td>{{$post->title}}</td>
                    <td><p>{{ $post->user->name }} on {{ $post->created_at->format('Y-m-d') }}</p></td>
                    @if ($post->user_id == auth()->user()->id)
                    <td><a href="{{ route('posts.edit', $post) }}">Edit</a></td>
                    <td>
                        <form method="POST" action="{{ route('posts.destroy', $post) }}">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Delete</button>
                        </form>
                    </td>
                    @else
                    <td>-</td>
                    <td>-</td>
                    @endif

                    <td><a href="{{ route('posts.show', $post) }}">View Post</a></td>
                </tr>
                @endforeach
            </table>

            @if(count($posts) == 0)
            <p>No posts yet.</p>
            @endif

        </div>
    </div>
</x-app-layout>