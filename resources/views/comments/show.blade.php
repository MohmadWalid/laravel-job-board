<x-layout :pageTitle="$pageTitle">
    <h1>{{ $comment->author }}</h1>
    <h3>{{ $comment->body }}</h3>
    <h3>{{ $comment->post }}</h3>
    <h4>{{ $comment->created_at }}</h4>
</x-layout>
