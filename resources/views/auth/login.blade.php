<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}" class="max-w-md mx-auto bg-white p-6 rounded-lg ">
        @csrf

        <!-- Title -->
        <h2 class="text-2xl font-bold text-center text-brown-800 mb-6">Iniciar Sesión</h2>

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" class="text-brown-700" />
            <x-text-input id="email" class="block mt-1 w-full border-brown-300 focus:border-yellow-500 focus:ring-yellow-500 rounded-md shadow-sm" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2 text-red-500" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" class="text-brown-700" />
            <x-text-input id="password" class="block mt-1 w-full border-brown-300 focus:border-yellow-500 focus:ring-yellow-500 rounded-md shadow-sm" type="password" name="password" required autocomplete="current-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2 text-red-500" />
        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded border-brown-300 text-yellow-600 shadow-sm focus:ring-yellow-500" name="remember">
                <span class="ml-2 text-sm text-brown-600">{{ __('Remember me') }}</span>
            </label>
        </div>

        <div class="flex items-center justify-end mt-4">
            @if (Route::has('password.request'))
                <a class="underline text-sm text-brown-600 hover:text-brown-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-yellow-500" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif

            <x-primary-button class="ml-3 bg-yellow-500 hover:bg-yellow-600 text-white rounded-md shadow-sm">
                {{ __('Log in') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
