<x-app-layout>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <h1 class="font-semibold text-center text-4xl text-gray-800 leading-tight mb-8 mt-14">
            Edit Post
        </h1>

        <form action="{{ route('posts.update', $post->id) }}') }}" method="POST" enctype="multipart/form-data" class="bg-white p-4 rounded-lg shadow-md">
            @csrf
            <div class="mb-4">
                <label for="content" class="block text-gray-700">Text</label>
                <textarea id="content" name="content" rows="4" class="w-full border rounded-md p-2" required>{{ $post->text }}</textarea>
            </div>
            <div class="mb-4">
                <label for="type" class="block text-gray-700">Add Content</label>
                <select id="type" name="type" class="w-full border rounded-md p-2" onchange="toggleInputFields()">
                    <option value="none">none</option>
                    <option value="code">Code</option>
                    <option value="image">Image</option>
                    <option value="link">Link</option>
                </select>
            </div>
            <div class="mb-4">
                <label for="image" class=" text-gray-700 hidden" id="imageLabel">Upload Image</label>
                <input type="file" id="image" name="image" accept="image/*" class="w-full border rounded-md p-2 hidden">
            </div>
            <div class="mb-4">
                <label for="code" class=" text-gray-700 hidden" id="codeLabel">Code</label>
                <textarea id="code" name="code" rows="4" class="w-full border rounded-md p-2 hidden" placeholder="Enter your code here"></textarea>
            </div>
            <div class="mb-4">
                <label for="link" class=" text-gray-700 hidden" id="linkLabel">Link</label>
                <input type="url" id="link" name="link" class="w-full border rounded-md p-2 hidden" placeholder="Enter your link here">
            </div>
            <button type="submit" class="bg-blue-600 text-white py-2 px-4 rounded">Edit Post</button>
        </form>
    </div>
    <script>
        function toggleInputFields() {
            const type = document.getElementById('type').value;
            const imageInput = document.getElementById('image');
            const imageLabel = document.getElementById('imageLabel');
            const codeInput = document.getElementById('code');
            const codeLabel = document.getElementById('codeLabel');
            const linkInput = document.getElementById('link');
            const linkLabel = document.getElementById('linkLabel');

            imageInput.classList.add('hidden');
            imageLabel.classList.add('hidden');
            codeInput.classList.add('hidden');
            codeLabel.classList.add('hidden');
            linkInput.classList.add('hidden');
            linkLabel.classList.add('hidden');

            if (type === 'image') {
                imageInput.classList.remove('hidden');
                imageLabel.classList.remove('hidden');
            } else if (type === 'code') {
                codeInput.classList.remove('hidden');
                codeLabel.classList.remove('hidden');
            } else if (type === 'link') {
                linkInput.classList.remove('hidden');
                linkLabel.classList.remove('hidden');
            }
        }
    </script>
</x-app-layout>
