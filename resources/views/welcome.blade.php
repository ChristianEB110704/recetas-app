<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bienvenido</title>
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <!-- Styles -->
    <style>
        /* ! tailwindcss v3.4.1 | MIT License | https://tailwindcss.com */
        /* Importante: el contenido de las clases Tailwind CSS aquí */
    </style>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased dark:bg-black dark:text-white/50">
    <div class="bg-[#fbf6e3] text-black/50 dark:bg-black dark:text-white/50 relative min-h-screen flex flex-col items-center justify-center selection:bg-[#FF2D20] selection:text-white">
        <img id="background" class="absolute hidden md:block lg:left-20 top-0 max-w-[500px] w-1/2 sm:w-1/3 left-1/2 transform -translate-x-1/2 lg:translate-x-0 lg:w-auto" src="{{ asset('images/pantallaPrincipal.png') }}" />
        <div class="relative w-full max-w-2xl px-6 lg:max-w-7xl">
            <header class="flex flex-col items-center py-10 space-y-6 lg:space-y-10">
                <div class="flex justify-center">
                    <x-application-logo class="block h-32 w-32 sm:h-40 sm:w-40 md:h-48 md:w-48 lg:h-80 lg:w-80 fill-current rounded-full" />
                </div>
                <h1 class="text-3xl font-extrabold leading-none tracking-tight text-gray-900 md:text-5xl lg:text-6xl dark:text-white">Panaderia CH</h1>
                <p class="text-base sm:text-lg text-center font-normal text-gray-500 lg:text-xl sm:px-16 xl:px-48 dark:text-gray-400">Bienvenido a la pagina web en la que podras explorar y dar a conocer las recetas que mas te interesen</p>
                @if (Route::has('login'))
                    <nav class="flex flex-col items-center space-y-2 lg:flex-row lg:space-y-0 lg:space-x-2">
                        @auth
                            <a href="{{ url('/inicio') }}" class="focus:outline-none text-white bg-yellow-400 hover:bg-yellow-500 focus:ring-4 focus:ring-yellow-300 font-medium rounded-lg text-sm px-14 py-2.5 dark:focus:ring-yellow-900">
                                Inicio
                                <svg class="w-3.5 h-3.5 ms-2 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
                                </svg>
                            </a>
                        @else
                            <a href="{{ route('login') }}" class="focus:outline-none text-white bg-yellow-400 hover:bg-yellow-500 focus:ring-4 focus:ring-yellow-300 font-medium rounded-lg text-sm px-14 py-2.5 dark:focus:ring-yellow-900">
                                Log in
                                <svg class="w-3.5 h-3.5 ms-2 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
                                </svg>
                            </a>
                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="focus:outline-none text-white bg-yellow-400 hover:bg-yellow-500 focus:ring-4 focus:ring-yellow-300 font-medium rounded-lg text-sm px-14 py-2.5 dark:focus:ring-yellow-900">
                                    Register
                                    <svg class="w-3.5 h-3.5 ms-2 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
                                    </svg>
                                </a>
                            @endif
                        @endauth
                    </nav>
                @endif
            </header>
        </div>
    </div>
</body>
</html>