<x-layout :pageTitle="$pageTitle">
    Blog

    @foreach ($comments as $comment)
        <h1>{{ $comment->title }}</h1>
        <h2>{{ $comment->author }}</h2>
        <h3>{{ $comment->body }}</h3>
        <h4>{{ $comment->created_at }}</h4>
        <a href="{{ route('blog.show', $comment->post->id) }}">
            {{ $comment->post->title }}
        </a>
        <h1>=============================</h1>
    @endforeach
</x-layout>
