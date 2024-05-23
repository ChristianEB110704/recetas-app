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
                    <div class="flex items-center justify-between">
                        <h1 class="m-0 p-0 mb-4 text-4xl font-extrabold leading-none tracking-tight text-gray-900 md:text-5xl lg:text-6xl dark:text-white">
                            {{$receta->nombre}}
                            @foreach($users as $user)
                                    @if($user->id==$receta->user_id)
                                        @if ($user->roles_id==1)
                                        <mark class="px-2 text-white bg-yellow-400 rounded dark:bg-yellow-500">
                                            {{$user->name}}
                                        </mark>
                                        @elseif($user->roles_id==3)
                                            <mark class="px-2 text-white bg-gray-400 rounded dark:bg-yellow-500">
                                                {{$user->name}}
                                            </mark>
                                        @else
                                        <mark class="px-2 text-white bg-blue-600 rounded dark:bg-blue-500">
                                            {{$user->name}}
                                        </mark>
                                        @endif
                                    @endif
                            @endforeach
                            <!--Insertar imagen de la receta-->
                        </h1>
                        <button type="button" class="text-white bg-gray-800 hover:bg-gray-900 focus:outline-none focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-xl px-5 py-2.5 me-2 mb-2 dark:bg-gray-800 dark:hover:bg-gray-700 dark:focus:ring-gray-700 dark:border-gray-700">
                            {{$receta->duracion}}'
                        </button>
                    </div>
                    <button type="button" class="px-3 py-2 text-xs font-medium text-center text-white bg-green-700 rounded-full dark:bg-green-600">
                        {{$receta->categoria}}
                    </button>
                    <br/><br/>
                    <h1 class="mb-4 text-4xl font-bold leading-none tracking-tight text-gray-700 md:text-2xl lg:text-3xl dark:text-white">
                        Descripcion
                    </h1>
                    <p class="my-4 text-lg text-gray-500 ">
                        {{$receta->descripcion}}
                    </p>
                    <h1 class="mb-4 text-4xl font-bold leading-none tracking-tight text-gray-700 md:text-2xl lg:text-3xl dark:text-white">
                        Pasos
                    </h1>
                    <p class="my-4 text-lg text-gray-500">
                        {{$receta->pasos}}
                    </p>
                    <br>
                    <a href="{{route('recetas.index')}}" class="bg-blue-500 hover:bg-blue-400 text-white font-bold py-2 px-4 border-b-4 border-blue-700 hover:blue-blue-500 rounded">
                        Volver
                    </a>
                    <p class="mb-3 text-right rtl:text-left text-gray-500 dark:text-gray-400">{{explode(' ', $receta->created_at)[0]}} | {{explode(' ', $receta->created_at)[1]}}</p>
                    
                </div>
            </div>
        </div>
    </div>
</x-app-layout>