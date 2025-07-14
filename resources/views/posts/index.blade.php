<x-layout :pageTitle="$pageTitle">

    <!-- Success Message -->
    @if (session('success'))
        <div class="bg-green-100 text-green-800 px-4 py-3 rounded-md mb-6">
            {{ session('success') }}
        </div>
    @endif

    <!-- Create Button -->
    <div class="mt-6 flex items-center justify-end gap-x-6">
        <a href="{{ route('blog.create') }}"
            class="rounded-md bg-indigo-600 px-4 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600"
            aria-label="Create a new blog post">
            Create Post
        </a>
    </div>

    <!-- Blog Posts -->
    @forelse ($posts as $post)
        <article class="border border-gray-200 px-4 py-6 my-4 rounded-md shadow-sm">
            <a href="{{ route('blog.show', $post->id) }}" class="block hover:bg-gray-50 transition-colors duration-150"
                aria-label="View post titled {{ $post->title }}">
                <div>
                    <h1 class="text-2xl font-semibold text-gray-900">{{ Str::limit($post->title, 50) }}</h1>
                    <p class="text-sm text-gray-600">By {{ $post->author }}</p>
                    <p class="text-sm text-gray-500">{{ $post->created_at->format('d M, Y h:i A') }}</p>
                    <p class="text-sm text-gray-600 mt-2">{{ Str::limit($post->content, 100) }}</p>
                </div>
            </a>
            <div class="flex items-center gap-x-4 mt-4 justify-end">
                <a href="{{ route('blog.edit', $post->id) }}"
                    class="rounded-md bg-gray-600 px-4 py-2 text-sm font-medium text-white hover:bg-gray-700 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-gray-600"
                    aria-label="Edit post titled {{ $post->title }}">
                    Edit
                </a>
                <button type="button"
                    class="rounded-md bg-red-600 px-4 py-2 text-sm font-medium text-white hover:bg-red-700 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-gray-600"
                    onclick="openDeleteModal('{{ route('blog.destroy', $post->id) }}', '{{ Str::limit($post->title, 50) }}')"
                    aria-label="Open delete confirmation dialog for post titled {{ $post->title }}">
                    Delete
                </button>
            </div>
        </article>
    @empty
        <p class="text-gray-600 text-center my-6">No posts available.</p>
    @endforelse

    <!-- Delete Modal Component -->
    <x-delete-modal />


    <!-- Pagination -->
    <div class="mt-6">
        {{ $posts->links() }}
    </div>

    <!-- JavaScript for Modal -->
    <script>
        function openDeleteModal(formAction, postTitle) {
            const dialog = document.getElementById('delete-dialog');
            const form = document.getElementById('delete-form');
            const message = document.getElementById('delete-dialog-message');

            // Update form action and message
            form.action = formAction;
            message.textContent =
                `Are you sure you want to delete the post titled "${postTitle}"? This action cannot be undone.`;

            // Show modal
            dialog.classList.remove('hidden');
        }
    </script>

</x-layout>
