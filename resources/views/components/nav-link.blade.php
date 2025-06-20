@props(['href' => '/', 'active' => false])

<!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
@php
    $classes = $active ? 'bg-gray-900 text-white' : 'text-gray-300 hover:bg-gray-700 hover:text-white';
@endphp

<a href="{{ $href }}" class="rounded-md px-3 py-2 text-sm font-medium {{ $classes }}"
    aria-current="page">{{ $slot }}</a>
