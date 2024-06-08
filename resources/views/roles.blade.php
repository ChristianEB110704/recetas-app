<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Administrar Roles') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-12">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="overflow-x-auto">
                        <button onclick="enviarNombre()" class="focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 mt-2 ml-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800" type="button">Crear Rol </button>
                        <a href="{{ route('roles.asignarRoles') }}" class="focus:outline-none text-white bg-yellow-400 hover:bg-yellow-500 focus:ring-4 focus:ring-yellow-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 mt-2 ml-2 dark:focus:ring-yellow-900">Asignar Roles</a><br><br>
                        <table class="min-w-full">
                            <thead>
                                <tr class="bg-gray-100 dark:bg-gray-800">
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ID</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nombre</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Eliminar</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200 dark:bg-gray-900 dark:divide-gray-800">
                                @foreach ($roles as $rol)
                                    @if ($rol->id===1 || $rol->id===2 || $rol->id===3)
                                        <tr class="bg-gray-100 dark:bg-gray-800">
                                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900 dark:text-gray-100">{{$rol->id}}</td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-gray-100">{{$rol->name}}</td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-gray-100"></td>
                                        </tr>
                                    @else
                                        <tr class="bg-white dark:bg-gray-900">
                                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900 dark:text-gray-100">{{$rol->id}}</td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-gray-100">{{$rol->name}}</td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-gray-100">
                                                <a href="{{ route('roles.borrarRoles', ['id' => $rol->id]) }}" onclick="return confirm('¿Estás seguro de que deseas eliminar este rol?')" class="text-red-500 hover:text-red-700 dark:text-red-400 dark:hover:text-red-200 font-medium">Eliminar</a>
                                            </td>
                                        </tr>
                                    @endif
                                @endforeach
                            </tbody>
                        </table>
                        <br>
                        <div id="nuevoRol" class="mt-4"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
<script>
    // Función para mostrar el cuadro de diálogo y enviar el nombre ingresado
    function enviarNombre() {
        // Pedir al usuario que ingrese un nombre
        var nombre = prompt("Por favor, ingresa un nombre:");
        if (nombre !== null) {
            var enlace = document.createElement("a");
            enlace.textContent = "Agregar " + nombre;
            enlace.setAttribute("class", "inline-block bg-white hover:bg-gray-100 text-gray-800 dark:text-gray-200 dark:hover:bg-gray-800 dark:hover:text-white font-semibold py-2 px-4 border border-gray-400 rounded shadow-sm");
            enlace.href = "http://127.0.0.1:8000/roles/crear-roles/" + nombre;
            document.getElementById("nuevoRol").appendChild(enlace);
            document.getElementById("nuevoRol").appendChild(document.createElement("br"));
        }
    }
</script>
