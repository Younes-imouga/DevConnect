<x-app-layout>
<div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
    <h1 class="font-semibold text-center text-4xl text-gray-800 leading-tight mb-8 mt-14">
        My Posts
    </h1>

    @if($posts->isEmpty())
        <p class="text-gray-500">You have not created any posts yet.</p>
    @else
    @foreach($posts as $post)
    <div class="bg-white shadow-md rounded-lg p-4 max-w-4xl mx-auto mb-8">
        <div class="border-b border-gray-200 pb-4">
            <div class="flex items-center space-x-3">
                <img src="{{ $post->user->profile_picture ?? 'data:image/jpeg;base64,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' }}" alt="User Avatar" class="w-10 h-10 rounded-full">
                <div>
                    <p class="font-semibold">{{ $post->user->name }}</p>
                    <p class="text-gray-500 text-sm">{{ $post->created_at->format('M d, Y') }}</p>
                </div>
            </div>

            <p class="mt-3 text-gray-700 text-lg">{{ $post->text }}</p>

            @if($post->content->isNotEmpty())
                <div class="mt-3">
                    @foreach($post->content as $content)
                        @if($content->type === 'image')
                            <img src="{{ Storage::url($content->content) }}" alt="Post Image" class="w-full h-auto rounded-lg shadow-sm">
                        @elseif($content->type === 'code')
                            <pre class="bg-gray-900 text-gray-200 p-3 rounded-lg overflow-x-auto text-sm"><code>{{ $content->content }}</code></pre>
                        @elseif($content->type === 'link')
                            <a href="{{ $content->content }}" class="text-blue-500 font-medium hover:underline block mt-1">{{ $content->content }}</a>
                        @endif
                    @endforeach
                </div>
            @endif

            <div class="flex items-center justify-between mt-4 text-gray-600 text-sm">
                <button class="flex items-center space-x-1 hover:text-blue-600">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z"></path></svg>
               +     <span>Like</span>
                </button>
                <button class="hover:text-blue-600">Comment</button>
                <a href="{{ route('posts.edit', $post->id) }}" class="text-blue-600 hover:underline">Edit</a>
                
                <form action="{{ route('posts.destroy', $post->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this post?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="text-red-600 hover:underline">Delete</button>
                </form>
            </div>
        </div>
    </div>
    @endforeach

    @endif
</div>
</x-app-layout>