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
                <div class="overflow-x-auto">
                    <table class="table-auto">
                        <!-- head -->
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Eliminar</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach ($roles as $rol)
                                @if ($rol->id===1 || $rol->id===2)
                                    <tr class="bg-gray-100">
                                        <th class="border px-4 py-2">
                                            {{$rol->id}}
                                        </th>
                                        <td class="border px-4 py-2">
                                            {{$rol->name}}
                                        </td>
                                        <td class="border px-4 py-2">
                                        </td>
                                    </tr>
                                @else
                                    <tr>
                                        <th class="border px-4 py-2">
                                            {{$rol->id}}
                                        </th>
                                        <td class="border px-4 py-2">
                                            {{$rol->name}}
                                        </td>
                                        <td class="border px-4 py-2">
                                            BOTON ELIMINAR
                                        </td>
                                    </tr>
                                @endif
                            @endforeach
                        </tbody>
                    </table>
                </div>












                    

                </div>
            </div>
        </div>
    </div>
</x-app-layout>