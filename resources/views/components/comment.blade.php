    <div class="my-2">
        @foreach ($comments as $comment)
            <div class="mt-4 p-4 border border-gray-300 rounded-md bg-white">
                <p class="text-gray-800">{{ $comment->body }}</p>
                <p class="text-sm text-gray-500">By {{ $comment->author ?? 'Anonymous' }} on
                    {{ $comment->created_at->format('M d, Y') }}</p>
            </div>
        @endforeach
    </div>

    <hr>
    <article
        class="max-w-4xl mx-auto my-8 px-6 py-8 border border-gray-200 rounded-md shadow-sm bg-gray-50 hover:shadow-md transition-shadow duration-150">
        <div class="mt-6">
            <h2 class="text-xl font-semibold text-gray-800">Add Comment</h2>
            <form method="POST" action="{{ route('comments.store', $post->id) }}">
                @csrf

                <div class="space-y-12">
                    <div class="border-b border-gray-900/10 pb-12">
                        <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                            <div class="sm:col-span-full">
                                <label for="author" class="block text-sm/6 font-medium text-gray-900">Your
                                    Name</label>
                                <div class="mt-2">
                                    <input type="text" name="author" id="author" autocomplete="given-name"
                                        value="{{ old('author') }}" placeholder="Mohamad Walid"
                                        class="{{ $errors->has('author') ? 'outline-red-500' : 'outline-gray-300' }} block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6" />
                                </div>
                                {{-- Errors for the author field --}}
                                @error('author')
                                    <span class="text-red-500 text-sm">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col-span-full">
                                <label for="body" class="block text-sm/6 font-medium text-gray-900">Your
                                    Comment</label>
                                <div class="mt-2">
                                    <textarea name="body" id="body" rows="3"
                                        class="{{ $errors->has('body') ? 'outline-red-500' : 'outline-gray-300' }} block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6"
                                        placeholder="E.g. Laravel is a powerful PHP framework...">{{ old('body') }}</textarea>
                                </div>
                                <p class="mt-3 text-sm/6 text-gray-600">Write a few sentences about the article.</p>
                                {{-- Errors for the content field --}}
                                @error('body')
                                    <span class="text-red-500 text-sm">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>

                <div class="mt-6 flex items-center justify-end gap-x-6">
                    <button type="submit"
                        class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-xs hover:bg-indigo-500 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Add
                        Comment</button>
                </div>
            </form>
        </div>
    </article>
