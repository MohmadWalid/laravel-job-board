<x-layout :pageTitle="$pageTitle">
    <!-- Post Content -->
    <article
        class="max-w-4xl mx-auto my-8 px-6 py-8 border border-gray-200 rounded-md shadow-sm bg-gray-50 hover:shadow-md transition-shadow duration-150">
        <h1 class="text-3xl font-bold text-gray-900">{{ $post->title }}</h1>
        <p class="text-sm text-gray-600 mt-2">By {{ $post->author }}</p>
        <p class="text-sm text-gray-500">{{ $post->created_at->format('d M, Y h:i A') }}</p>
        <div class="mt-4 prose prose-gray max-w-none">
            {!! $post->body !!}
        </div>

        <!-- Buttons (Edit Post, Delete Post, Back to Posts) -->
        <div class="mt-8 pt-6 border-t border-gray-200 flex justify-center gap-x-4">
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
            <a href="{{ route('blog.index') }}"
                class="inline-block rounded-md bg-indigo-600 px-6 py-3 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 hover:scale-105 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600 transform transition-transform duration-150"
                aria-label="Return to blog post list">
                Back to Posts
            </a>
        </div>
    </article>

    <!-- Delete Modal Component -->
    <x-delete-modal />

    <!-- Comment Section -->
    <article
        class="max-w-4xl mx-auto my-8 px-6 py-8 border border-gray-200 rounded-md shadow-sm bg-gray-50 hover:shadow-md transition-shadow duration-150">
        <div class="mt-6">
            <h2 class="text-xl font-semibold text-gray-800">Top comments ({{ $post->comments_count }})</h2>
            <x-comment :comments="$post->comments" :post="$post" />
        </div>
    </article>

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
