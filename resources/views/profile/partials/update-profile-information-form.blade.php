    <style>
        input, textarea, select {
            border: 1px solid #e2e8f0;
            border-radius: 0.375rem;
            padding: 0.5rem 0.75rem;
        }
        input:disabled {
            background-color: #f3f4f6;
        }
    </style>
    <div class="container mx-auto px-4">
        <section class="w-full mx-auto">
            <header class="mb-8">
                <h2 class="text-2xl font-semibold text-gray-900">
                    Profile Information
                </h2>

                <p class="mt-2 text-sm text-gray-600">
                    Update your account's profile information and details.
                </p>
            </header>

            <div class="bg-white rounded-lg shadow overflow-hidden">
                <!-- Profile Overview Section -->
                <div class="p-6 border-b border-gray-200">
                    <div class="flex flex-col md:flex-row">
                        <div class="flex-shrink-0 mb-4 md:mb-0 md:mr-6">
                            <img src="{{ asset('storage/' . $profile->image) ?? 'data:image/jpeg;base64,/9j/4AAQSkZJRgABAQAAAQABAAD/2wCEAAkGBwgHBgkIBwgKCgkLDRYPDQwMDRsUFRAWIB0iIiAdHx8kKDQsJCYxJx8fLT0tMTU3Ojo6Iys/RD84QzQ5OjcBCgoKDQwNGg8PGjclHyU3Nzc3Nzc3Nzc3Nzc3Nzc3Nzc3Nzc3Nzc3Nzc3Nzc3Nzc3Nzc3Nzc3Nzc3Nzc3Nzc3N//AABEIAJQAtQMBIgACEQEDEQH/xAAbAAEAAgMBAQAAAAAAAAAAAAAAAQYCBAUDB//EADsQAAEDAgMGAwMMAgIDAAAAAAEAAgMEERIhQQUTIjFRYQZScTJC0RQjM0NTYoGRobHB4XLwg5MVY4L/xAAUAQEAAAAAAAAAAAAAAAAAAAAA/8QAFBEBAAAAAAAAAAAAAAAAAAAAAP/aAAwDAQACEQMRAD8A+y8IHsnBfJmoPVSLh1y4YtX6EdFANs8YufrND2Q254cue78vdAAsBwkC/C3ynqgyJxHMjid5+wTMcVxfV/n7ISGi5FmjMNP1fdA1Fh2aPJ6rj7U25DSl0NM1ssuYeSeG60Ns7bdKX09G6zDlJKDnJ6dAuHpZB71dXPVvx1EhfbkOQHYBa6lEBERAREQEREBERB0dnbZqaIYXHfQnnG4527FWqhroa1mOnfdw0ORj9QqIs4ZZIJBJC8teORCD6AORyOH3m29s9Qpsb3xcej9GjouXsfazNoDdvsyobrpbsumP8bjyebugcPl4PJrfqpscV8QxH39COiXz9vP7T+FHUBmX2fQ9UEjEBwPbE3yu5oosPfi3p8wRA5WGDvuundL5Xxk3+s83ZMgLmQ2v9J17Jnc3bn5PL3QCLW4f/ge53VY8QbVMr3UlO+8bTaSQfWHp6Bb/AIg2iaWnbTwvvJKM364VVBy5WQEREBERARDkuns7YtTWNEh+ZiPJ7hmfQIOYitkPh2iYPnMcp6k2/QL2dsPZ5Fvk9vRxQU1FZarw1E4F1LM5jvK/MfmuDV0c9HLu52Fp0Oh9Cg8EREBERBLHvjeHxnC5puHDRXLY+0hXw8Rwzs9t3T0HRUxe1HUvpKlk8di5uh5EdCgvvbAeu7691Ol8fpJ/C8qaoZU07JmPOB4vjPMdl6Z39kB32fTugcst7ufuWvZFIBPKMSDzFEBoIcQWjF5NAF5ySsihdK95EQF8ep7LLhDAcRwaO1JXG8VVLoqZkF7SSnjaOQaPiUFcrKl9XUyTyZF59noNAvFPwI9UQEREBEWxs+mNXWwwcg52fpqg6/h7ZTZGtralt2H6JhHP7ysiNAa0NaLAZABEBERBK8amnjqoXQzNxMdp09O69UQUbadE+gqjE83ac2O8w+K1Vctv0vyrZ73ADeRcbf5/RU1AREQEREHd8LVpZUOpXcTH3LGnldWbK2Tzhvk/Unovn0UjopGyMNnNIIV+ppvlEMUzALyMDsI5WP8AKDM4QbPkMZ8reQULJgfh+aa1zeruaIBxYswN5b8AFTPEE4m2nIGklsYDBf8A3qriCzDdxO7ByGt+qoE8hmmkld7T3lx/E3QYIiICIiAuz4VjxbQe/wAkR/Uj+1xl2PC0gbtJzNXxkD1BB/a6C1oiICIiAiIghwDmlp5HIr585uBxb0Nl9Bc5rGue7JrQSfQL57cnM8zmgIiICIiArX4Yn3mz3QuPDFJlbnny/BVRd3wlK4Vc8bbcUd7Hsf7QWV2DF8+XB/3eSLNgkAtDYM0xc0QeNW5zaeZ9xvWxOOLS1lQL9FfK4A0FRYHCIncGoNjmqH0QEREBERAXrSTmlqop25ljsVh+v6LyRB9BikZLG2SM3Y8XaeyyVV2Ftf5IdxUfQOOR8h+CtLXBwDmEOaRcEciglERARStauroaCAyzHmOFoObvRBpeI6wQUJhHtzDD6N1KqK962qlrKl08uRJyaOTR0XggIiICIiAun4cIG1Y7gkFrgbel1zF0vDd//MRWIHC7n6FBcHBhPzrXPd1byRZNxW4HtjHldzRBjI0yMe3ELuBG869l89ANhfnZfQwLWsz/AI+ndUXacQg2hURg3aHkg9jmg1kREBERARE0QFuUO0qmhyhfwasdmP6WoxrnvDGNLnHk0C5K6VPsOvmAdu2xg/aOsfyQdGHxPGQN/TOa7UxuBC9neJKO2TJif8Rf91qs8MPP0lWB/jGT+5WZ8Lstw1jv+r+0HjVeJZX3FLAI9MbziP5clxZpZJ5DJNI57zzc45rsy+GZ2/R1Mcn+QLfiudVbNq6QF00LsA99uY/NBqIouLAjkpQEREBERAXX8LsxbUccOIMjcT+YH8rkKx+E4rMqJicNyGB3pmR+qCwEC+cZl++ET/l3P3LckQMrAh+X2nXsqx4qp8FTFOGhuNti3oR/X7K0cQJs0YvJoO60dr0orNnyRt4i3ijceZcNP3QUlERAREQQuxsrYktWBLOXRw6C3E/4La2Dse7W1dU29842H9yrGc+yDXpKOno2YYImt6nU/ivdEQEREBTrdQiDm1+xaarBcwbmU+8wZH1Cq1dRT0Mu7nba/suHJ3or3zXnU08VTA6GVuJrtOncIKAi3NqbPfs+fASXRuzY/r29VpoCIiByV12LTmm2dDG4XkIxuZ66qr7HpHVm0I48ILRxu9ArtkG2DuC+T9SeiCRe3DHvR5jqiglt+OQxO8reQUIJu0NBxOwH3tSVNnYuQD7cTdAOo7pxB9gBvLZjSyxOEsGZ3d8jrdBU/ENAKWp+URAmCc87Zh2oXJV9raVlZDJBMM3Dit7vcd1SKumkpah0UoseYNsiOqDxXU2Bs/5bVbyUDcxWJ+8dAuWrzsqlFHQxxH2yMT/U8/h+CDa0CIiAiIgIiICIiAiIg166kZXUzoJMi72XeU6FUeaN0Uro5AQ9hsQV9AVb8VUga+KraLY+F/rp/vZBwERdnw/ssVEnyqoB+TsNgPMfgg62wKIUlFvZBhdKQXOHMdAurnitZuO3s6W6+qcWLkN7bJulliMODmd3fnri+CDNmMtvG1r2+Z/NQsX7vF88XNfqG8kQBgwcjur3A1ushixnMby2Z0snEHXxNx+fS3T1UZYRkcF7huoPVAFsLbXwX4RqD3WjtXZzNoxFrjhmZnjt+gW9mHEk8VuJ2jh0CWsG9PdGrfVBTdn0Mo2vDTzsLXNdicD0GeXZXNYljTJvLDGBYutzHQKe6AiIgIiICIiAiIgIiIC09swfKNmzs1DcQ7WzW4mVjcZajU+iCnbG2U6vO9lu2mabucOb+wVwjYIwxkQa0tFo7ey1qMYI2sbGGtwizLZNYOhTLCeE4L5t1J6hA4MPI7q+bdbrLix8xvLc9LfFLuxYrtx29v3bdPVRYYfZdgv7Ot+vogyjL8PzOFrNA7miwdgJvK1z3eZnJEGYY0zGK3ABcBeeM7psl+NzsJPZSiDKw3j4/dY3E0dCovwRu96R1nHqERAdkZQPqhdnZA4gw/8As9ruoRBPvPHR1kHJQiCUREBERAREQFIUIgm13RDR98SxucMrtYjZnZEQZAAvjZbhkbicOpWBeRE6T32uwg9lKIM8Ld+IbcBbit3XmHkxb0+2X4b9lKIMZpXQSFkZs3opREH/2Q==' }}" alt="Profile Image" class=" 2 w-32 rounded-full object-cover">
                        </div>
                        <div class="flex-1">
                            <h3 class="text-xl font-medium text-gray-900">{{ $user->name }}</h3>
                            <p class="text-gray-600">{{ $user->email }}</p>
                            
                            <div class="mt-3">
                                <p class="text-gray-700">{{ $profile->bio ?? 'No bio available.' }}</p>
                            </div>
                            
                            <div class="mt-4 flex flex-wrap gap-2">
                                @foreach(explode(',', $profile->skills ?? '') as $skill)
                                    <span class="px-2 py-1 bg-indigo-100 text-indigo-800 text-xs font-medium rounded">{{ trim($skill) }}</span>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Edit Form Section -->
                <form method="POST" action="{{ route('profile.update') }}" enctype="multipart/form-data" class="p-6">
                    @csrf
                    @method('PATCH')
                    <div class="space-y-6">
                        <!-- Basic Information -->
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Name</label>
                                <input id="name" name="name" type="text" class="block w-full" value="{{ old('name', $user->name) }}" required>
                            </div>

                            <div>
                                <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                                <input id="email" name="email" type="email" class="block w-full" value="{{ old('email', $user->email) }}" required>
                            </div>
                        </div>

                        <!-- Profile Image -->
                        <div>
                            <label for="image" class="block text-sm font-medium text-gray-700 mb-1">Profile Image</label>
                            <div class="flex items-center">
                                <div class="flex-shrink-0">
                                    <img src="{{ asset('storage/' . $profile->image) }}" alt="Profile Image" class="h-16 w-16 rounded-full object-cover">
                                </div>
                                <input type="file" id="image" name="image" class="ml-4 text-sm text-gray-600">
                            </div>
                        </div>

                        <!-- Bio -->
                        <div>
                            <label for="bio" class="block text-sm font-medium text-gray-700 mb-1">Bio</label>
                            <textarea id="bio" name="bio" rows="4" class="block w-full">{{ old('bio', $profile->bio ?? '') }}</textarea>
                        </div>

                        <!-- Social Links -->
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label for="github_url" class="block text-sm font-medium text-gray-700 mb-1">GitHub URL</label>
                                <input id="github_url" name="github_url" type="url" class="block w-full" value="{{ old('github_url', $profile->github_url ?? '') }}" placeholder="https://github.com/username">
                            </div>

                            <div>
                                <label for="linkedin_url" class="block text-sm font-medium text-gray-700 mb-1">LinkedIn URL</label>
                                <input id="linkedin_url" name="linkedin_url" type="url" class="block w-full" value="{{ old('linkedin_url', $profile->linkedin_url ?? '') }}" placeholder="https://linkedin.com/in/username">
                            </div>
                        </div>

                        <!-- Skills -->
                        <div>
                            <label for="skills" class="block text-sm font-medium text-gray-700 mb-1">Skills (comma separated)</label>
                            <input id="skills" name="skills" type="text" class="block w-full" value="{{ old('skills', $profile->skills ?? '') }}" placeholder="PHP, Laravel, JavaScript, etc.">
                        </div>

                        <!-- Created/Updated (Read Only) -->
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label for="created_at" class="block text-sm font-medium text-gray-700 mb-1">Member Since</label>
                                <input id="created_at" type="text" class="block w-full bg-gray-100" value="March 12, 2021" disabled>
                            </div>

                            <div>
                                <label for="updated_at" class="block text-sm font-medium text-gray-700 mb-1">Last Updated</label>
                                <input id="updated_at" type="text" class="block w-full bg-gray-100" value="February 23, 2025" disabled>
                            </div>
                        </div>
                    </div>

                    <div class="flex items-center justify-end gap-4 mt-6">
                        <button type="submit" class="px-4 py-2 bg-indigo-600 text-white text-sm font-medium rounded-md hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            Save
                        </button>
                        <p class="text-sm text-gray-600 hidden">Saved.</p>
                    </div>
                </form>
            </div>
        </section>
    </div>