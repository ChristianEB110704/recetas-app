<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Recetas') }}
        </h2>
        <x-nav-link :href="route('recetas.create')" :active="request()->routeIs('recetas')">
            {{ __('Crear Receta') }}
        </x-nav-link>
        @if(auth()->user()->roles_id == 1)
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
                        <h1
                            class="m-0 p-0 mb-4 text-4xl font-extrabold leading-none tracking-tight text-gray-900 md:text-5xl lg:text-6xl dark:text-white">
                            {{$receta->nombre}}
                            @foreach($users as $user)
                                @if($user->id == $receta->user_id)
                                    @if ($user->roles_id == 1)
                                        <mark class="px-2 text-white bg-yellow-400 rounded dark:bg-yellow-500 lg:text-5xl">
                                            {{$user->name}}
                                        </mark>
                                    @elseif($user->roles_id == 3)
                                        <mark class="px-2 text-white bg-gray-400 rounded dark:bg-yellow-500 lg:text-5xl">
                                            {{$user->name}}
                                        </mark>
                                    @else
                                        <mark class="px-2 text-white bg-blue-600 rounded dark:bg-blue-500 lg:text-5xl">
                                            {{$user->name}}
                                        </mark>
                                    @endif
                                @endif
                            @endforeach
                            <!--Insertar imagen de la receta-->
                        </h1>
                        <button type="button"
                            class="text-white bg-gray-800 hover:bg-gray-900 focus:outline-none focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-xl px-5 py-2.5 me-2 mb-2 dark:bg-gray-800 dark:hover:bg-gray-700 dark:focus:ring-gray-700 dark:border-gray-700">
                            {{$receta->duracion}}'
                        </button>
                    </div>
                    <button type="button"
                        class="px-3 py-2 text-xs font-medium text-center text-white bg-green-700 rounded-full dark:bg-green-600">
                        {{$receta->categoria}}
                    </button>
                    <div class="p-6 text-gray-900 dark:text-gray-100 flex flex-col md:flex-row">
                        <div class="md:w-1/2 md:pr-6">
                            <h1
                                class="mb-4 text-4xl font-bold leading-none tracking-tight text-gray-700 md:text-2xl lg:text-3xl dark:text-white">
                                Descripcion
                            </h1>
                            <p class="my-4 text-lg text-gray-500 ">
                                {!! nl2br(strip_tags($receta->descripcion)) !!}
                            </p>
                            <h1
                                class="mb-4 text-4xl font-bold leading-none tracking-tight text-gray-700 md:text-2xl lg:text-3xl dark:text-white">
                                Pasos
                            </h1>
                            <p class="my-4 text-lg text-gray-500">
                                {!! nl2br(strip_tags($receta->pasos)) !!}
                            </p>
                        </div>
                        <div class="md:w-1/2 md:pr-6">
                            <img src="{{ asset(Storage::disk('public')->url($imagen->ruta)) }}" alt="Imagen" class="w-full rounded-md"/>
                        </div>
                    </div>
                    <a href="{{route('recetas.index')}}"
                        class="bg-blue-500 hover:bg-blue-400 text-white font-bold py-2 px-4 border-b-4 border-blue-700 hover:blue-blue-500 rounded">
                        Volver
                    </a>
                    <p class="mb-3 text-right rtl:text-left text-gray-500 dark:text-gray-400">
                        {{explode(' ', $receta->created_at)[0]}} | {{explode(' ', $receta->created_at)[1]}}</p>

                </div>
            </div>
        </div>
    </div>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg mb-12">
            <div class="p-6 text-gray-900 dark:text-gray-100">
                <h2 class="mb-4 text-3xl font-extrabold leading-none tracking-tight text-gray-900 md:text-4xl dark:text-white">Comentarios</h2>
                @foreach ($comentarios as $comentario)
                    <div class=" p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                        <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 18">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 5h9M5 9h5m8-8H2a1 1 0 0 0-1 1v10a1 1 0 0 0 1 1h4l3.5 4 3.5-4h5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1Z"/>
                        </svg>
                        <h5 class="mb-2 text-2xl font-semibold tracking-tight text-gray-900 dark:text-white">
                            @foreach($users as $user)
                                @if($user->id == $comentario->user_id)
                                    @if ($user->roles_id == 1)
                                        <mark class="px-2 text-white bg-yellow-400 rounded dark:bg-yellow-500">
                                            {{$user->name}}
                                        </mark>
                                    @elseif($user->roles_id == 3)
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
                        </h5>
                        <p class="mb-3 font-normal text-gray-500 dark:text-gray-400">{{$comentario->comentario}}</p>
                        <div class="flex justify-between">
                            <div class="flex items-start">
                                {{$comentario->like}}
                                    @if (in_array($comentario->id,$likes))
                                        <a href="{{route('comentario.dislikes',["comentario"=>$comentario->id])}} class="inline-flex font-medium items-center text-blue-600 hover:underline">
                                            <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 18 19">
                                                <path d="M15 1.943v12.114a1 1 0 0 1-1.581.814L8 11V5l5.419-3.871A1 1 0 0 1 15 1.943ZM7 4H2a2 2 0 0 0-2 2v4a2 2 0 0 0 2 2v5a2 2 0 0 0 2 2h1a2 2 0 0 0 2-2V4ZM4 17v-5h1v5H4ZM16 5.183v5.634a2.984 2.984 0 0 0 0-5.634Z"/>
                                            </svg>
                                        </a>
                                    @else
                                        <a href="{{route('comentario.likes',["comentario"=>$comentario->id])}}" class="inline-flex font-medium items-center text-blue-600 hover:underline">
                                            <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 19">
                                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m9 12 5.419 3.871A1 1 0 0 0 16 15.057V2.943a1 1 0 0 0-1.581-.814L9 6m0 6V6m0 6H2a1 1 0 0 1-1-1V7a1 1 0 0 1 1-1h7m-5 6h3v5a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1v-5Zm15-3a3 3 0 0 1-3 3V6a3 3 0 0 1 3 3Z"/>
                                            </svg>
                                        </a>
                                    @endif
                                </a> 
                            </div>
                            
                            @if(auth()->user()->roles_id==1)
                                <div class="items-end">
                                    <a href="{{ route('comentario.delete', ['id' => $comentario->id]) }}" class="bg-red-500 hover:bg-red-400 text-white font-bold py-2 px-4 border-b-4 border-red-700 hover:border-red-500 rounded">Eliminar</a>    
                                </div>
                            @endif
                        </div>
                    </div>
                @endforeach
                <div class="bg-white shadow-lg rounded-lg p-6 w-full">
                    <h2 class="text-2xl font-semibold mb-4">Deja un comentario</h2>
                    <form action="{{route("comentario.create")}}" method="POST">
                        @csrf
                        <input type="hidden" name="recetas_id" value="{{$receta->id}}" ></input>
                        <div class="mb-4">
                            <label for="comment" class="block text-sm font-medium text-gray-700">Comentario</label>
                            <textarea id="comment" name="comment" rows="4" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm" required></textarea>
                        </div>
                        <div class="flex justify-end">
                            <button type="submit" class="bg-green-500 hover:bg-green-400 text-white font-bold py-2 px-4 border-b-4 border-green-700 hover:blue-blue-500 rounded">
                            Enviar
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>