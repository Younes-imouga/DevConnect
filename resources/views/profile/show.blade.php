<x-app-layout>
    <div class="max-w-7xl mx-auto pt-20 px-4">
        <h1 class="font-semibold text-center text-4xl text-gray-800 leading-tight mb-8">{{ $user->name }}'s Profile</h1>

        <div class="bg-white rounded-xl shadow-md p-6">
            <div class="flex items-center space-x-4">
                <img src="{{ $profile->image ? asset('storage/' . $profile->image) : 'data:image/jpeg;base64,...' }}" alt="User Avatar" class="w-32 h-32 rounded-full border-4 border-gray-200 shadow-lg">
                <div>
                    <h2 class="text-2xl font-bold">{{ $user->name }}</h2>
                    <p class="text-gray-600 text-sm">{{ $user->email }}</p>
                    <p class="text-gray-500 mt-2">{{ $profile->bio ?? 'No bio available.' }}</p>
                    <div class="mt-4 flex flex-wrap gap-2">
                        @foreach(explode(',', $profile->skills ?? '') as $skill)
                            <span class="px-2 py-1 bg-indigo-100 text-indigo-800 text-xs font-medium rounded">{{ trim($skill) }}</span>
                        @endforeach
                    </div>
                </div>
            </div>

            <div class="mt-6">
                <h3 class="text-lg font-semibold">Social Links</h3>
                <div class="mt-2">
                    <p class="text-gray-500">GitHub: <a href="{{ $profile->github_url }}" class="text-blue-500 hover:underline">{{ $profile->github_url ?? 'Not provided' }}</a></p>
                    <p class="text-gray-500">LinkedIn: <a href="{{ $profile->linkedin_url }}" class="text-blue-500 hover:underline">{{ $profile->linkedin_url ?? 'Not provided' }}</a></p>
                </div>
            </div>
        </div>
    </div>
</x-app-layout> 