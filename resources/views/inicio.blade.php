<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Inicio') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <p>Bienvenido a tu página de inicio. Aquí puedes agregar tu contenido personalizado.</p>
                    <p>Por ejemplo, podrías mostrar una lista de recetas, noticias recientes, o cualquier otro contenido relevante para tu aplicación.</p>
                    <p>¡Sé creativo y haz que esta página sea única para tus usuarios!</p>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>