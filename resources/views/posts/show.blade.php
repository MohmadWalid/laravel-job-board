<x-layout :pageTitle="$pageTitle">
    <h1>{{ $post->title }}</h1>
    <h2>{{ $post->author }}</h2>
    <h3>{{ $post->body }}</h3>
    <h4>{{ $post->created_at }}</h4>
</x-layout>
