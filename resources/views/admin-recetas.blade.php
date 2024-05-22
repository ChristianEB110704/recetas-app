<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Administrar Recetas') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class=" mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="flex flex-wrap -mx-3 mb-6">
                        <div class="w-full md:w-1/4 px-3 mb-6 md:mb-0">
                            <table class="table-fixed">
                                <thead>
                                    <tr>
                                        <th class="w-2/9 px-4 py-2">ID</th>
                                        <th class="w-2/9 px-4 py-2">Usuario</th>
                                        <th class="w-1/3 px-4 py-2">Nombre</th>
                                        <th class="w-1/3 px-4 py-2">Categoria</th>
                                        <th class="w-1/3 px-4 py-2">Eliminar</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($recetas as $receta)
                                    
                                        <tr>
                                            <td class="border px-4 py-2">{{$receta->id}}</td>
                                            <td class="border px-4 py-2">{{$receta->user_id}}</td>
                                            <td class="border px-4 py-2">{{$receta->nombre}}</td>
                                            <td class="border px-4 py-2">{{$receta->categoria}}</td>
                                            <td class="border px-4 py-2">
                                                <a href="/recetas/admin/r/{{  $receta->id }}" onclick="return confirm('¿Estás seguro de que deseas eliminar este rol?')" class="bg-red-500 hover:bg-red-400 text-white font-bold py-2 px-4 border-b-4 border-red-700 hover:border-red-500 rounded">Eliminar</a>
                                            </td>
                                        </tr>
                                    
                                @endforeach
                                </tbody>
                            </table>
                        </div>

                        <div class="w-full md:w-3/4 px-3 mb-6 md:mb-0">
                            <table class="table-fixed">
                                <thead>
                                    <tr>
                                        <th class="w-1/9 px-4 py-2">Imagen</th>
                                        <th class="w-1/9 px-4 py-2">ID</th>
                                        <th class="w-1/9 px-4 py-2">Usuario</th>
                                        <th class="w-1/3 px-4 py-2">Nombre</th>
                                        <th class="w-1/3 px-4 py-2">Descripcion</th>
                                        <th class="w-1/3 px-4 py-2">Pasos</th>
                                        <th class="w-1/3 px-4 py-2">Categoria</th>
                                        <th class="w-1/3 px-4 py-2">Ok</th>
                                        <th class="w-1/3 px-4 py-2">Eliminar</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($recetasSV as $receta)
                                    
                                        <tr>
                                            <td class="border px-4 py-2">
                                                @foreach($imagenes as $img)
                                                    @if ($receta->id == $img->recetas_id && $img->tabla == "recetas_sin_validar")
                                                        <img src="{{ asset(Storage::disk('public')->url($img->ruta)) }}" alt="Imagen" class="w-32 h-32 rounded-md mr-6" style="max-width: 120px; height: auto; margin-right:10px;"> <!-- Ajusta el tamaño y el borde de la imagen según tus necesidades -->
                                                    @endif
                                                @endforeach
                                            </td>
                                            <td class="border px-4 py-2">{{$receta->id}}</td>
                                            <td class="border px-4 py-2">{{$receta->user_id}}</td>
                                            <td class="border px-4 py-2">{{$receta->nombre}}</td>
                                            <td class="border px-4 py-2">{{$receta->descripcion}}</td>
                                            <td class="border px-4 py-2">{{$receta->pasos}}</td>
                                            <td class="border px-4 py-2">{{$receta->categoria}}</td>
                                            <td class="border px-4 py-2">
                                                <a href="/recetas/admin/validar/{{  $receta->id }}" class="bg-green-500 hover:bg-green-400 text-white font-bold py-2 px-4 border-b-4 border-green-700 hover:blue-green-500 rounded">Ok</a>
                                            </td>
                                            <td class="border px-4 py-2">
                                                <a href="/recetas/admin/rsv/{{  $receta->id }}" onclick="return confirm('¿Estás seguro de que deseas eliminar este rol?')" class="bg-red-500 hover:bg-red-400 text-white font-bold py-2 px-4 border-b-4 border-red-700 hover:border-red-500 rounded">Eliminar</a>
                                            </td>
                                            
                                        </tr>
                                    
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!--Añadir lista de Categoria para insertar una categoria o borrarla-->
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>