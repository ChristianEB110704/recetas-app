<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Crear Receta') }}
        </h2>
    </x-slot>
    
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form action="/recetas/create/save" method="POST" enctype="multipart/form-data">
                        @csrf
                        <label for="nombre">Nombre de la receta:</label><br>
                        <input type="text" id="nombre" name="nombre"><br>
                        
                        <label for="duracion">Duración (minutos):</label><br>
                        <input type="number" id="duracion" name="duracion"><br>
                        
                        <label for="categoria">Categoría:</label><br>
                        <select id="categoria" name="categoria">
                            <option value="1">Desayuno</option>
                            <option value="2">Almuerzo</option>
                            <option value="3">Cena</option>
                        </select><br>
                        
                        <label for="descripcion">Descripción:</label><br>
                        <textarea id="descripcion" name="descripcion"></textarea><br>
                        
                        <label for="pasos">Pasos:</label><br>
                        <textarea id="pasos" name="pasos"></textarea><br>
                        
                        <label for="imagen">Imagen:</label><br>
                        <input type="file" id="imagen" name="imagen"><br>
                        
                        <button type="submit">Guardar receta</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    
</x-app-layout>