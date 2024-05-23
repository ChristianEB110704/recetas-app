@php
    use Illuminate\Support\Facades\Storage;
@endphp
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Recetas') }}
        </h2>
        <x-nav-link :href="route('recetas.create')" :active="request()->routeIs('recetas')">
            {{ __('Crear Receta') }}
        </x-nav-link>
        @if(auth()->user()->roles_id==1)
            <x-nav-link :href="route('recetas.adminRecetas')" :active="request()->routeIs('recetas')">
                {{ __('Administrar Recetas') }}
            </x-nav-link>
        @endif
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    @foreach($recetas as $receta)
                    <a href="{{route('recetas.verReceta', ['id' => $receta->id])}}" active="{{request()->routeIs('recetas')}}">
                        <div class="bg-white shadow-md rounded-lg p-6 mb-4 flex items-center"> <!-- Usamos flex para alinear la imagen y el contenido -->
                            @foreach($imagenes as $img)
                                @if ($receta->id == $img->recetas_id && $img->tabla == "recetas")
                                    <img src="{{ asset(Storage::disk('public')->url($img->ruta)) }}" alt="Imagen" class="w-32 h-32 rounded-md mr-6" style="max-width: 120px; height: auto; margin-right:10px;"> <!-- Ajusta el tamaño y el borde de la imagen según tus necesidades -->
                                @endif
                            @endforeach
                            <div class="flex-1"> <!-- Contenedor para el contenido de la receta, flex-1 para que ocupe el espacio restante -->
                                <h1 class="text-2xl font-semibold mb-2">{{ $receta->nombre }}</h1>
                                <p class="text-gray-700 mb-2"><strong>Duración:</strong> {{ $receta->duracion }} minutos</p>
                                <p class="text-gray-700 mb-2"><strong>Categoría:</strong> {{ $receta->categoria }}</p>
                                <!-- Aquí puedes mostrar otros detalles de la receta -->
                            </div>
                        </div>
                    </a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-app-layout>