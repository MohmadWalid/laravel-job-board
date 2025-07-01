<x-layout :pageTitle="$pageTitle">
    @foreach ($posts as $post)
        <h1 class="text-2x1">{{ $post->title }}</h1>
        <p class="text-1k1">{{ $post->author }}</p>
        <p>{{ $post->body }}</p>
        <h4>{{ $post->created_at }}</h4>
        <h1>=============================</h1>
    @endforeach

    {{ $posts->links() }}
</x-layout>
