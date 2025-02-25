<x-guest-layout>
    <form method="POST" action="{{ route('register') }}" class="max-w-md mx-auto p-8 mt-10">
        @csrf

        <h2 class="text-2xl font-semibold text-center mb-6">S'inscrire</h2>

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Nom')" class="block text-gray-700 font-semibold" />
            <x-text-input id="name" class="block mt-1 w-full p-3 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2 text-red-600" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" class="block text-gray-700 font-semibold" />
            <x-text-input id="email" class="block mt-1 w-full p-3 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2 text-red-600" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Mot de passe')" class="block text-gray-700 font-semibold" />
            <x-text-input id="password" class="block mt-1 w-full p-3 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" type="password" name="password" required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2 text-red-600" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirmer le mot de passe')" class="block text-gray-700 font-semibold" />
            <x-text-input id="password_confirmation" class="block mt-1 w-full p-3 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" type="password" name="password_confirmation" required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2 text-red-600" />
        </div>

        <div class="flex items-center justify-between mt-4">
            <a class="text-sm text-blue-600 hover:underline" href="{{ route('login') }}">
                {{ __('Déjà inscrit ?') }}
            </a>

            <x-primary-button class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg shadow-md">
                {{ __('S\'inscrire') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
