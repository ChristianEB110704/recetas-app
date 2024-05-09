<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Acerca de') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <p class="text-lg font-bold mb-4">Bienvenido a nuestra página web</p>
                    <p class="mb-4">Somos una comunidad apasionada por la panadería y la repostería. Nuestro objetivo es compartir recetas deliciosas y únicas con personas de todo el mundo.</p>
                    <p class="mb-4">En nuestra página, encontrarás una amplia variedad de recetas de panes, pasteles, galletas y mucho más. ¡Esperamos que encuentres inspiración para tu próxima creación en nuestra comunidad!</p>
                    <p class="mb-4">Si tienes alguna pregunta o sugerencia, no dudes en ponerte en contacto con nosotros. ¡Estamos aquí para ayudarte!</p>
                    <p class="mb-4">Creador: Christian Expósito Bautista</p>
                    <p>¡Gracias por visitar nuestra página web y disfruta explorando nuestras recetas!</p>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>