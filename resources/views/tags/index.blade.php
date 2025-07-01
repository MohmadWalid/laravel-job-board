<x-layout :pageTitle="$pageTitle">
    Tags

    @foreach ($tags as $tag)
        <h1>{{ $tag->title }}</h1>
        <h4>{{ $tag->created_at }}</h4>
        <h1>=============================</h1>
    @endforeach
</x-layout>
