<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Crear Receta') }}
        </h2>
    </x-slot>

    <div class="py-12">
         
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg mb-12">
                <div class="p-6 bg-white dark:bg-gray-800 border-b border-gray-200 flex flex-col md:flex-row">
                    <form class="w-full md:w-2/3 mb-6 md:mb-0" action="{{url('/recetas/create/save')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="flex flex-wrap -mx-3 mb-6">
                            <div class="w-full md:w-2/3 px-3 mb-6 md:mb-0">
                                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="nombre">
                                    Nombre
                                </label>
                                <input class="appearance-none block w-full bg-gray-200 text-gray-700 border rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" id="nombre" name="nombre" type="text" value="{{ old('nombre') }}">
                            </div>
                            <div class="w-full md:w-1/3 px-3">
                                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="duracion">
                                    Duración
                                </label>
                                <input class="appearance-none block w-full bg-gray-200 text-gray-700 border  rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" type="number" id="duracion" name="duracion"  value="{{ old('duracion') }}">
                            </div>
                        </div>
                        <div class="flex flex-wrap -mx-3 mb-6">
                            <div class="w-full px-3 mb-6 md:mb-0">
                                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="descripcion">
                                    Descripción
                                </label>
                                <textarea class="appearance-none block w-full bg-gray-200 text-gray-700 border rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" id="descripcion" name="descripcion">{{ old('descripcion') }}</textarea>
                            </div>
                        </div>
                        <div class="flex flex-wrap -mx-3 mb-6">
                            <div class="w-full px-3 mb-6 md:mb-0">
                                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="pasos">
                                    Pasos
                                </label>
                                <textarea class="appearance-none block w-full bg-gray-200 text-gray-700 border rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" id="pasos" name="pasos" >{{ old('pasos') }}</textarea>
                            </div>
                        </div>
                        <div class="flex flex-wrap -mx-3 mb-6">
                            <div class="w-full md:w-2/3 px-3 mb-6 md:mb-0">
                                <label class="text-base text-gray-500 font-semibold mb-2 block">Subir imagen</label>
                                <input type="file" class="w-full text-gray-400 font-semibold text-sm bg-white border file:cursor-pointer cursor-pointer file:border-0 file:py-3 file:px-4 file:mr-4 file:bg-gray-100 file:hover:bg-gray-200 file:text-gray-500 rounded" name="imagen"/>
                                <p class="text-xs text-gray-400 mt-2">PNG, JPG SVG, WEBP, y GIF estan permitidos.</p>
                            </div>
                            <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="categoria">
                                    Categoría
                                </label>
                                <div class="relative">
                                    <select class="block appearance-none w-full bg-gray-200 border  text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="categoria" name="categoria">
                                        <option value="">Seleccione</option>
                                        @foreach ($categorias as $categoria)
                                            <option value="{{$categoria->name}}" {{ old('categoria') == $categoria->name ? 'selected' : '' }}>{{$categoria->name}}</option>
                                        @endforeach
                                    </select>
                                    <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                                        <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                            <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/>
                                        </svg>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="flex flex-wrap -mx-3 mb-2">
                            <div class="w-full md:w-1/3 px-3 md:mb-0 mt-7">
                                <input type="submit" value="Guardar receta" class="bg-yellow-400 hover:bg-yellow-500 text-white font-bold py-2 px-4 rounded">
                            </div>
                        </div>
                    </form>
                    <div class="hidden md:block md:w-1/3 px-3">
                        <img src="{{ asset('images/masa_madre.gif') }}" alt="Pan 4" class="w-full md:w-auto rounded-lg">
                    </div>
                   
                </div>
                @if ($errors->any())
                    <div class="p-6 bg-white dark:bg-gray-800 border-b border-gray-200 flex flex-col">
                        Errores:
                        @foreach ($errors->all() as $error)
                            <div class="p-4 mb-4 text-md text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
                                {{$error}}
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>