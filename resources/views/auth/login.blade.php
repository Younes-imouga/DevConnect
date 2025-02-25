<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}" class="max-w-md mx-auto p-8 mt-10">
        @csrf

        <h2 class="text-2xl font-semibold text-center mb-6">Se connecter</h2>

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" class="block text-gray-700 font-semibold" />
            <x-text-input id="email" class="block mt-1 w-full p-3 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2 text-red-600" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Mot de passe')" class="block text-gray-700 font-semibold" />
            <x-text-input id="password" class="block mt-1 w-full p-3 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"
                            type="password" name="password" required autocomplete="current-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2 text-red-600" />
        </div>

        <!-- Remember Me -->
        <div class="flex items-center mt-4">
            <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-blue-600 shadow-sm focus:ring-blue-500" name="remember">
            <label for="remember_me" class="ms-2 text-sm text-gray-600">{{ __('Se souvenir de moi') }}</label>
        </div>

        <div class="flex items-center justify-between mt-4">
            @if (Route::has('password.request'))
                <a class="text-sm text-blue-600 hover:underline" href="{{ route('password.request') }}">
                    {{ __('Mot de passe oublié?') }}
                </a>
            @endif
            
            <x-primary-button class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg shadow-md">
                {{ __('Se connecter') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
