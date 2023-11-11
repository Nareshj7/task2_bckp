<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        @foreach ($post->comments as $comment)
        <p>{{ $comment->content }}</p>
        @endforeach
    </div>
</x-app-layout>