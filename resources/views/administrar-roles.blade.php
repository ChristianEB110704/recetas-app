<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Roles Usuarios') }}
        </h2>
    </x-slot>
    
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form action="/roles/save" method="POST" enctype="multipart/form-data">
                        @csrf
                    <table class="table-fixed">
                        <thead>
                            <tr>
                                <th class="w-1/2 px-4 py-2">ID Usuario</th>
                                <th class="w-1/2 px-4 py-2">Nombre</th>
                                <th class="w-1/2 px-4 py-2">Rol</th>
                                <th class="w-1/2 px-4 py-2">Editar</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($usuarios as $usuario)
                            
                                <tr>
                                    <td class="border px-4 py-2">{{$usuario->id}}</td>
                                    <td class="border px-4 py-2">{{$usuario->name}}</td>
                                    @foreach($roles as $rol)
                                        @if($rol->id == $usuario->roles_id)
                                            <td class="border px-4 py-2">{{$rol->name}}</td>
                                        @endif
                                    @endforeach
                                    <td class="border px-4 py-2">
                                        @if($usuario->id!=1)
                                            <select class="form-control m-bot15" name="{{ 'usuario/' . $usuario->id }}">
                                                @foreach($roles as $rol)
                                                    @if($rol->id == $usuario->roles_id)
                                                        <option value="{{ $rol->id }}" selected>{{ $rol->name }}</option>
                                                    @else
                                                        <option value="{{ $rol->id }}">{{ $rol->name }}</option>
                                                    @endif
                                                @endforeach
                                            </select>
                                        @endif
                                    </td>
                                </tr>
                            
                        @endforeach
                        </tbody>
                    </table>
                    <br>
                    <input type="submit"  class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800" value="Guardar"></input>
                    <input type="reset"  class="py-2.5 px-5 me-2 mb-2 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700" value="Resetear"></input>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>