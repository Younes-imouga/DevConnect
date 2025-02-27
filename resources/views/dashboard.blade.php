<x-app-layout>

    <div class="max-w-7xl mx-auto pt-20 px-4">
        <div class="grid grid-cols-1 lg:grid-cols-4 gap-6">
            <!-- Profile Card -->
            <div class="space-y-6">
                <div class="bg-white rounded-xl shadow-sm overflow-hidden">
                    <div class="relative">
                        <div class="h-24 bg-gradient-to-r from-blue-600 to-blue-400"></div>
                        <img src="{{ auth()->user()->profile->image ? asset('storage/' . auth()->user()->profile->image) : 'data:image/jpeg;base64,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'}}" alt="Profile" 
                             class="absolute -bottom-6 left-4 w-20 h-20 rounded-full border-4 border-white shadow-md"/>
                    </div>
                    <div class="pt-14 p-4">
                        <div class="flex items-center justify-between">
                            <h2 class="text-xl font-bold">{{ auth()->user()->name }}</h2>
                            <a href="https://github.com" target="_blank" class="text-gray-600 hover:text-black">
                                <svg class="w-6 h-6" viewBox="0 0 24 24" fill="currentColor">
                                    <path d="M12 0c-6.626 0-12 5.373-12 12 0 5.302 3.438 9.8 8.207 11.387.599.111.793-.261.793-.577v-2.234c-3.338.726-4.033-1.416-4.033-1.416-.546-1.387-1.333-1.756-1.333-1.756-1.089-.745.083-.729.083-.729 1.205.084 1.839 1.237 1.839 1.237 1.07 1.834 2.807 1.304 3.492.997.107-.775.418-1.305.762-1.604-2.665-.305-5.467-1.334-5.467-5.931 0-1.311.469-2.381 1.236-3.221-.124-.303-.535-1.524.117-3.176 0 0 1.008-.322 3.301 1.23.957-.266 1.983-.399 3.003-.404 1.02.005 2.047.138 3.006.404 2.291-1.552 3.297-1.23 3.297-1.23.653 1.653.242 2.874.118 3.176.77.84 1.235 1.911 1.235 3.221 0 4.609-2.807 5.624-5.479 5.921.43.372.823 1.102.823 2.222v3.293c0 .319.192.694.801.576 4.765-1.589 8.199-6.086 8.199-11.386 0-6.627-5.373-12-12-12z"/>
                                </svg>
                            </a>
                        </div>
                        <p class="text-gray-600 text-sm mt-1">{{ auth()->user()->email }}</p>
                        <p class="text-gray-500 text-sm mt-2">{{ auth()->user()->profile->bio ?? 'No bio available.' }}</p>
                        
                        <div class="mt-4 flex flex-wrap gap-2">
                            @if(auth()->user()->profile->skills)
                                @foreach(explode(',', auth()->user()->profile->skills) as $skill)
                                    <span class="px-2 py-1 bg-indigo-100 text-indigo-800 text-xs font-medium rounded">{{ trim($skill) }}</span>
                                @endforeach
                            @else
                                <span class="text-gray-500 text-xs">No skills available.</span>
                            @endif
                        </div>

                        <div class="mt-4 pt-4 border-t">
                            <div class="flex justify-between text-sm">
                                <span class="text-gray-500">Connections</span>
                                <span class="text-blue-600 font-medium">487</span>
                            </div>
                            <div class="flex justify-between text-sm mt-2">
                                <span class="text-gray-500">Posts</span>
                                <span class="text-blue-600 font-medium">52</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Popular Tags -->
                <div class="bg-white rounded-xl shadow-sm p-4">
                    <h3 class="font-semibold mb-4">Trending Tags</h3>
                    <div class="space-y-2">
                        <a href="#" class="flex items-center justify-between hover:bg-gray-50 p-2 rounded">
                            <span class="text-gray-600">#javascript</span>
                            <span class="text-gray-400 text-sm">2.4k</span>
                        </a>
                        <a href="#" class="flex items-center justify-between hover:bg-gray-50 p-2 rounded">
                            <span class="text-gray-600">#react</span>
                            <span class="text-gray-400 text-sm">1.8k</span>
                        </a>
                        <a href="#" class="flex items-center justify-between hover:bg-gray-50 p-2 rounded">
                            <span class="text-gray-600">#webdev</span>
                            <span class="text-gray-400 text-sm">1.2k</span>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Main Feed -->
            <div class="lg:col-span-2 space-y-6">
                <!-- Post Creation -->
                <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data" class="bg-white p-4 rounded-lg shadow-md">
                    @csrf
                    <div class="mb-4">
                        <label for="content" class="block text-gray-700">Text</label>
                        <textarea id="content" name="content" rows="4" class="w-full border rounded-md p-2" placeholder="Enter your text here" required></textarea>
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
                        <input type="text" id="link" name="link" class="w-full border rounded-md p-2 hidden" placeholder="Enter your link here">
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
                    <button type="submit" class="bg-blue-600 text-white py-2 px-4 rounded">Create Post</button>
                </form>

                <!-- Posts -->
                <div class="bg-white rounded-xl shadow-sm">
                    <div class="p-4">
                        <div class="flex items-center justify-between">
                            <div class="flex items-center space-x-3">
                                <img src="https://avatar.iran.liara.run/public/boy" alt="User" class="w-12 h-12 rounded-full"/>
                                <div>
                                    <h3 class="font-semibold">Alex Chen</h3>
                                    <p class="text-gray-500 text-sm">Senior Backend Developer at Tech Corp</p>
                                    <p class="text-gray-400 text-xs">1h ago</p>
                                </div>
                            </div>
                            <button class="text-gray-400 hover:text-gray-600">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h.01M12 12h.01M19 12h.01M6 12a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0z"/>
                                </svg>
                            </button>
                        </div>
                        
                        <div class="mt-4">
                            <p class="text-gray-700">Just implemented a caching layer using Redis that reduced our API response time by 70%! Here's a simple example of how to implement caching in Node.js:</p>
                            
                            <div class="mt-4 bg-gray-900 rounded-lg p-4 font-mono text-sm text-gray-200">
                                <pre><code>
                                    const redis = require('redis');
                                    const client = redis.createClient();
                                    
                                    async function getCachedData(key) {
                                    const cached = await client.get(key);
                                    if (cached) {
                                        return JSON.parse(cached);
                                    }
                                    
                                    const data = await fetchDataFromDB();
                                    await client.setEx(key, 3600, JSON.stringify(data));
                                    return data;  
                                    }
                                </code></pre>
                            </div>

                            <div class="mt-4 flex flex-wrap gap-2">
                                <span class="px-2 py-1 bg-blue-100 text-blue-800 rounded-full text-xs">#nodejs</span>
                                <span class="px-2 py-1 bg-red-100 text-red-800 rounded-full text-xs">#redis</span>
                                <span class="px-2 py-1 bg-green-100 text-green-800 rounded-full text-xs">#performance</span>
                            </div>
            
                            <div class="mt-4 flex items-center justify-between border-t pt-4">
                                <div class="flex items-center space-x-4">
                                    <button class="flex items-center space-x-2 text-gray-500 hover:text-blue-500">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 10h4.764a2 2 0 011.789 2.894l-3.5 7A2 2 0 0115.263 21h-4.017c-.163 0-.326-.02-.485-.06L7 20m7-10V5a2 2 0 00-2-2h-.095c-.5 0-.905.405-.905.905 0 .714-.211 1.412-.608 2.006L7 11v9m7-10h-2M7 20H5a2 2 0 01-2-2v-6a2 2 0 012-2h2.5"/>
                                        </svg>
                                        <span>42</span>
                                    </button>
                                    <button class="flex items-center space-x-2 text-gray-500 hover:text-blue-500">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z"/>
                                        </svg>
                                        <span>12</span>
                                    </button>
                                </div>
                                <button class="text-gray-500 hover:text-blue-500">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.684 13.342C8.886 12.938 9 12.482 9 12c0-.482-.114-.938-.316-1.342m0 2.684a3 3 0 110-2.684m0 2.684l6.632 3.316m-6.632-6l6.632-3.316m0 0a3 3 0 105.367-2.684 3 3 0 00-5.367 2.684zm0 9.316a3 3 0 105.368 2.684 3 3 0 00-5.368-2.684z"/>
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            
                <!-- Right Sidebar -->
                <div class="space-y-6">
                    <!-- Job Recommendations -->
                    <div class="bg-white rounded-xl shadow-sm p-4">
                        <h3 class="font-semibold mb-4">Job Recommendations</h3>
                        <div class="space-y-4">
                            <div class="p-3 hover:bg-gray-50 rounded-lg transition-colors duration-200">
                                <div class="flex items-start space-x-3">
                                    <img src="/api/placeholder/40/40" alt="Company" class="w-10 h-10 rounded"/>
                                    <div>
                                        <h4 class="font-medium">Senior Full Stack Developer</h4>
                                        <p class="text-gray-500 text-sm">TechStart Inc.</p>
                                        <p class="text-gray-500 text-sm">Remote • Full-time</p>
                                        <div class="mt-2 flex flex-wrap gap-2">
                                            <span class="px-2 py-1 bg-gray-100 text-gray-600 rounded-full text-xs">React</span>
                                            <span class="px-2 py-1 bg-gray-100 text-gray-600 rounded-full text-xs">Node.js</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
            
                            <div class="p-3 hover:bg-gray-50 rounded-lg transition-colors duration-200">
                                <div class="flex items-start space-x-3">
                                    <img src="/api/placeholder/40/40" alt="Company" class="w-10 h-10 rounded"/>
                                    <div>
                                        <h4 class="font-medium">DevOps Engineer</h4>
                                        <p class="text-gray-500 text-sm">CloudScale Solutions</p>
                                        <p class="text-gray-500 text-sm">San Francisco • Hybrid</p>
                                        <div class="mt-2 flex flex-wrap gap-2">
                                            <span class="px-2 py-1 bg-gray-100 text-gray-600 rounded-full text-xs">AWS</span>
                                            <span class="px-2 py-1 bg-gray-100 text-gray-600 rounded-full text-xs">Docker</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button class="mt-4 w-full text-blue-500 hover:text-blue-600 text-sm font-medium">
                            View All Jobs
                        </button>
                    </div>
            
                    <!-- Suggested Connections -->
                    <div class="bg-white rounded-xl shadow-sm p-4">
                        <h3 class="font-semibold mb-4">Suggested Connections</h3>
                        <div class="space-y-4">
                            <div class="flex items-center justify-between">
                                <div class="flex items-center space-x-3">
                                    <img src="https://avatar.iran.liara.run/public/boy" alt="User" class="w-10 h-10 rounded-full"/>
                                    <div>
                                        <h4 class="font-medium">Emily Zhang</h4>
                                        <p class="text-gray-500 text-sm">Frontend Developer</p>
                                    </div>
                                </div>
                                <button class="text-blue-500 hover:text-blue-600">
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
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

            // Reset visibility
            imageInput.classList.add('hidden');
            imageLabel.classList.add('hidden');
            codeInput.classList.add('hidden');
            codeLabel.classList.add('hidden');
            linkInput.classList.add('hidden');
            linkLabel.classList.add('hidden');

            // Show relevant input based on selected type
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
