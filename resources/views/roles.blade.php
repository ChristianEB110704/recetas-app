<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Administrar Roles') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div id="cuerpo" class="overflow-x-auto">
                        <button onclick="enviarNombre()" class="focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800" type="button">Crear Rol </button>
                        <a href="{{ route('roles.asignarRoles') }}" class="focus:outline-none text-white bg-yellow-400 hover:bg-yellow-500 focus:ring-4 focus:ring-yellow-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:focus:ring-yellow-900">Asignar Roles</a><br><br>
                        <table class="table-auto">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nombre</th>
                                    <th>Eliminar</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($roles as $rol)
                                    @if ($rol->id===1 || $rol->id===2 || $rol->id===3)
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
                                            <a href="{{ route('roles.borrarRoles', ['id' => $rol->id]) }}" onclick="return confirm('¿Estás seguro de que deseas eliminar este rol?')" class="bg-red-500 hover:bg-red-400 text-white font-bold py-2 px-4 border-b-4 border-red-700 hover:border-red-500 rounded">Eliminar</a>
                                            </td>
                                        </tr>
                                    @endif
                                @endforeach
                            </tbody>
                        </table>
                        <br>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
<script>
    var br =document.createElement("br");
    document.getElementById("cuerpo").appendChild(br);
    
    var br2 =document.createElement("br");
    document.getElementById("cuerpo").insertBefore(br2,br);
    // Función para mostrar el cuadro de diálogo y enviar el nombre ingresado
    function enviarNombre() {
        // Pedir al usuario que ingrese un nombre
        var nombre = prompt("Por favor, ingresa un nombre:");
        if (nombre !== null) {
            enlace =document.createElement("a");
            enlace.textContent = "Agregar " + nombre;
            enlace.setAttribute("class","bg-white hover:bg-gray-100 text-gray-800 font-semibold py-2 px-4 border border-gray-400 rounded shadow")
            enlace.href = "http://127.0.0.1:8000/roles/crear-roles/"+nombre;
            document.getElementById("cuerpo").insertBefore(enlace,br2);
        }
    }
</script>