<x-guest-layout>
    <form method="POST" action="{{ route('register') }}" class="max-w-md mx-auto bg-white p-6 rounded-lg shadow-md">
        @csrf

        <!-- Título -->
        <h2 class="text-2xl font-bold text-center text-brown-800 mb-6">Registrarse</h2>

        <!-- Nombre -->
        <div>
            <x-input-label for="name" :value="__('Nombre')" class="text-brown-700" />
            <x-text-input id="name" class="block mt-1 w-full border-brown-300 focus:border-yellow-500 focus:ring-yellow-500 rounded-md shadow-sm" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2 text-red-500" />
        </div>

        <!-- Dirección de correo electrónico -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Correo electrónico')" class="text-brown-700" />
            <x-text-input id="email" class="block mt-1 w-full border-brown-300 focus:border-yellow-500 focus:ring-yellow-500 rounded-md shadow-sm" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2 text-red-500" />
        </div>

        <!-- Contraseña -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Contraseña')" class="text-brown-700" />
            <x-text-input id="password" class="block mt-1 w-full border-brown-300 focus:border-yellow-500 focus:ring-yellow-500 rounded-md shadow-sm" type="password" name="password" required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2 text-red-500" />
        </div>

        <!-- Confirmar Contraseña -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirmar Contraseña')" class="text-brown-700" />
            <x-text-input id="password_confirmation" class="block mt-1 w-full border-brown-300 focus:border-yellow-500 focus:ring-yellow-500 rounded-md shadow-sm" type="password" name="password_confirmation" required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2 text-red-500" />
        </div>

        <div class="flex items-center justify-end mt-6">
            <a class="underline text-sm text-brown-600 hover:text-brown-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-yellow-500" href="{{ route('login') }}">
                {{ __('¿Ya estás registrado?') }}
            </a>

            <x-primary-button class="ml-4 bg-yellow-500 hover:bg-yellow-600 text-white rounded-md shadow-sm">
                {{ __('Registrarse') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>