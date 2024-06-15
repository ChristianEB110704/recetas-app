<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Administrar Recetas') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-12">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="flex flex-wrap -mx-3 mb-6">

                        <!-- Recetas Actuales -->
                        <div class="w-full 2xl:w-3/4  px-3 mb-6 md:mb-0 border-r border-gray-300">
                            <h3 class="text-lg font-semibold mb-4">Recetas Actuales</h3>
                            <div class="overflow-x-auto">
                                <table class="table-fixed w-full">
                                    <thead>
                                        <tr>
                                            <th class="w-1/5 px-4 py-2">ID</th>
                                            <th class="w-1/5 px-4 py-2">Usuario</th>
                                            <th class="w-1/5 px-4 py-2">Nombre</th>
                                            <th class="w-1/5 px-4 py-2">Categoría</th>
                                            <th class="w-1/5 px-4 py-2">Eliminar</th>
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
                                                <a href="{{url('/recetas/admin/r')}}/{{  $receta->id }}" onclick="return confirm('¿Estás seguro de que deseas eliminar esta receta?')" class="bg-red-500 hover:bg-red-400 text-white font-bold py-2 px-4 border-b-4 border-red-700 hover:border-red-500 rounded">Eliminar</a>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <!-- Categorías -->
                        <div class="w-full 2xl:w-1/4 px-3 mb-6 md:mb-0 ">
                            <h3 class="text-lg font-semibold mb-4">Categorías</h3>
                            <div class="overflow-x-auto">
                                <table class="table-fixed w-full">
                                    <thead>
                                        <tr>
                                            <th class="w-1/2 px-4 py-2">Nombre</th>
                                            <th class="w-1/2 px-4 py-2">Eliminar</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($categorias as $categoria)
                                        <tr>
                                            <td class="border px-4 py-2">{{$categoria->name}}</td>
                                            <td class="border px-4 py-2">
                                                <a href="{{route('recetas.borrarCat',['name'=>$categoria->name])}}" onclick="return confirm('¿Estás seguro de que deseas eliminar esta categoría?')" class="bg-red-500 hover:bg-red-400 text-white font-bold py-2 px-4 border-b-4 border-red-700 hover:border-red-500 rounded">Eliminar</a>
                                            </td>
                                        </tr>
                                        @endforeach
                                        <tr>
                                            <td class="border px-4 py-2">
                                                <input type="text" id="catNueva" class="border rounded p-2 w-full" placeholder="Nueva Categoría"/>
                                            </td>
                                            <td class="border px-4 py-2">
                                                <a href="#" onclick="crearCategoria()" class="bg-blue-500 hover:bg-blue-400 text-white font-bold py-2 px-4 border-b-4 border-blue-700 hover:border-blue-500 rounded">Crear</a>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <!-- Recetas Sin Validar -->
                        <div class="w-full px-3 mb-6 md:mb-0">
                            <h3 class="text-lg font-semibold mb-4">Recetas Sin Validar</h3>
                            <div class="overflow-x-auto">
                                <table class="table-fixed w-full">
                                    <thead>
                                        <tr>
                                            <th class="w-1/9 px-4 py-2">Imagen</th>
                                            <th class="w-1/9 px-4 py-2">ID</th>
                                            <th class="w-1/9 px-4 py-2">Usuario</th>
                                            <th class="w-1/9 px-4 py-2">Nombre</th>
                                            <th class="w-1/9 px-4 py-2">Descripción</th>
                                            <th class="w-1/9 px-4 py-2">Pasos</th>
                                            <th class="w-1/9 px-4 py-2">Categoría</th>
                                            <th class="w-1/9 px-4 py-2">Validar</th>
                                            <th class="w-1/9 px-4 py-2">Eliminar</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($recetasSV as $receta)
                                        <tr>
                                            <td class="border px-4 py-2">
                                                @foreach($imagenes as $img)
                                                @if ($receta->id == $img->recetas_id && $img->tabla == "recetas_sin_validar")
                                                <img src="{{ asset(Storage::disk('public')->url($img->ruta)) }}" alt="Imagen" class="w-32 h-32 rounded-md" style="max-width: 120px; height: auto;"> <!-- Ajusta el tamaño y el borde de la imagen según tus necesidades -->
                                                @endif
                                                @endforeach
                                            </td>
                                            <td class="border px-4 py-2 max-w-xs break-words">{{$receta->id}}</td>
                                            <td class="border px-4 py-2 max-w-xs break-words">{{$receta->user_id}}</td>
                                            <td class="border px-4 py-2 max-w-xs break-words">{{$receta->nombre}}</td>
                                            <td class="border px-4 py-2 max-w-xs break-words">{{$receta->descripcion}}</td>
                                            <td class="border px-4 py-2 max-w-xs break-words">{{$receta->pasos}}</td>
                                            <td class="border px-4 py-2 max-w-xs break-words">{{$receta->categoria}}</td>
                                            <td class="border px-4 py-2 max-w-xs">
                                                <a href="{{url('/recetas/admin/validar')}}/{{  $receta->id }}" class="bg-green-500 hover:bg-green-400 text-white font-bold py-1 px-2 border-b-4 border-green-700 hover:border-green-500 rounded">Validar</a>
                                            </td>
                                            <td class="border px-4 py-2 max-w-xs">
                                                <a href="{{url('/recetas/admin/rsv')}}/{{  $receta->id }}" onclick="return confirm('¿Estás seguro de que deseas eliminar esta receta?')" class="bg-red-500 hover:bg-red-400 text-white font-bold py-1 px-2 border-b-4 border-red-700 hover:border-red-500 rounded">Eliminar</a>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function crearCategoria() {
            var catNueva = document.getElementById('catNueva').value;
            var url = "{{url('/categoria/create')}}?name=" + catNueva;
            window.location.href = url;
        }
    </script>

</x-app-layout>