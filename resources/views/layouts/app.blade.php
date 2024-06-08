<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="bg-[#fbf6e3] font-sans antialiased">
        <div class="min-h-screen bg-[#fbf6e3] dark:bg-gray-900">
            @include('layouts.navigation')

            <!-- Page Heading -->
            @if (isset($header))
                <header class="bg-[#F9ECBE] dark:bg-gray-800 shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
            <footer class="bg-gray-900 text-white py-6 fixed bottom-0 w-full">
                <div class="container mx-auto flex justify-between items-center">
                    <div>
                        <p class="text-sm">&copy; {{ date('Y') }} Mi Sitio Web. Todos los derechos reservados.</p>
                        <p class="text-sm">Desarrollado con <span class="text-red-500">&hearts;</span> por Christian</p>
                    </div>
                    <div>
                        <p class="text-sm">Versión de Laravel: {{ app()->version() }}</p>
                        <p class="text-sm">Versión de PHP: {{ phpversion() }}</p>
                    </div>
                </div>
            </footer>
        </div>
    </body>
</html>
