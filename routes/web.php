<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RecetasController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;

Route::get('/storage/imagenes/{archivo}', function ($archivo) {
    // Ruta al archivo dentro de tu sistema de almacenamiento
    $rutaArchivo = '/storage/app/imagenes/' . $archivo;

    // Verificar si el archivo existe
    if (Storage::exists($rutaArchivo)) {
        // Devolver el archivo al cliente
        return Storage::response($rutaArchivo);
    } else {
        // Manejar el caso en que el archivo no exista
        abort(404);
    }
});

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/inicio', function () {
    return view('inicio');
})->name('inicio');

Route::get('/acerca-de', function () {
    return view('acerca-de');
})->name('acerca-de');

Route::resource('/recetas', RecetasController::class)->middleware('auth');
Route::post('/recetas/create/save', [RecetasController::class, 'save'])->middleware('auth');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
