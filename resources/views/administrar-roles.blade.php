<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Roles Usuarios') }}
        </h2>
    </x-slot>
    
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg mb-12">
                <div class="p-6 bg-white dark:bg-gray-800 border-b border-gray-200 dark:border-gray-700">
                    <form action="/roles/save" method="POST" enctype="multipart/form-data">
                        @csrf
                        <table class="min-w-full table-auto">
                            <thead>
                                <tr class="bg-gray-200 dark:bg-gray-700">
                                    <th class="w-1/4 px-4 py-2 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">ID Usuario</th>
                                    <th class="w-1/4 px-4 py-2 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Nombre</th>
                                    <th class="w-1/4 px-4 py-2 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Rol</th>
                                    <th class="w-1/4 px-4 py-2 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Editar</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white dark:bg-gray-800 divide-y divide-gray-200 dark:divide-gray-700">
                                @foreach($usuarios as $usuario)
                                    <tr>
                                        <td class="px-4 py-2 whitespace-nowrap text-sm font-medium text-gray-900 dark:text-gray-100">{{$usuario->id}}</td>
                                        <td class="px-4 py-2 whitespace-nowrap text-sm text-gray-900 dark:text-gray-100">{{$usuario->name}}</td>
                                        <td class="px-4 py-2 whitespace-nowrap text-sm text-gray-900 dark:text-gray-100">
                                            @foreach($roles as $rol)
                                                @if($rol->id == $usuario->roles_id)
                                                    {{$rol->name}}
                                                @endif
                                            @endforeach
                                        </td>
                                        <td class="px-4 py-2 whitespace-nowrap text-sm text-gray-900 dark:text-gray-100">
                                            @if($usuario->id != 1)
                                                <select class="form-select mt-1 block w-full" name="{{ 'usuario/' . $usuario->id }}">
                                                    @foreach($roles as $rol)
                                                        <option value="{{ $rol->id }}" {{ $rol->id == $usuario->roles_id ? 'selected' : '' }}>
                                                            {{ $rol->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="mt-4 flex justify-end space-x-2">
                            <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 focus:outline-none dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Guardar</button>
                            <button type="reset" class="py-2.5 px-5 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">Resetear</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>