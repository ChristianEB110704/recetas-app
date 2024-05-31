<?php

use App\Http\Controllers\ComentariosController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RecetasController;
use App\Http\Controllers\RolesController;
use App\Http\Middleware\AdminMiddleware;
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
Route::get('/inicio', function () {
    return view('inicio');
})->middleware(['auth', 'verified'])->name('inicio');

Route::get('/acerca-de', function () {
    return view('acerca-de');
})->name('acerca-de');

Route::get('/roles', [RolesController::class,"index"])->name('roles.index')->middleware(['auth',AdminMiddleware::class]);
Route::get('/roles/crear-roles/{nombre?}', [RolesController::class, 'crearRoles'])->name('roles.crearRoles')->middleware(['auth',AdminMiddleware::class]);
Route::get('/roles/borrar-roles/{id}', [RolesController::class, 'borrarRoles'])->name('roles.borrarRoles')->middleware(['auth',AdminMiddleware::class]);
Route::get('/roles/asignar', [RolesController::class, 'asignarRoles'])->name('roles.asignarRoles')->middleware(['auth',AdminMiddleware::class]);
Route::post('/roles/save', [RolesController::class, 'save'])->middleware(['auth',AdminMiddleware::class]);

Route::get('/recetas', [RecetasController::class,"index"])->name("recetas.index")->middleware('auth');
Route::get('/recetas/create', [RecetasController::class,"create"])->name("recetas.create")->middleware('auth');
Route::post('/recetas/create/save', [RecetasController::class, 'save'])->middleware('auth');
Route::get('/recetas/ver-recetas', [RecetasController::class, 'verReceta'])->name("recetas.verReceta")->middleware('auth');
Route::get('/recetas/admin', [RecetasController::class, 'adminRecetas'])->name('recetas.adminRecetas')->middleware(['auth',AdminMiddleware::class]);
Route::get('/recetas/admin/{tipo}/{id}', [RecetasController::class, 'delete'])->middleware(['auth',AdminMiddleware::class]);

Route::post('/comentarios/create', [ComentariosController::class, 'create'])->name("comentario.create")->middleware('auth');
Route::get('/comentarios/delete', [ComentariosController::class, 'delete'])->name('comentario.delete')->middleware(['auth',AdminMiddleware::class]);


Route::get('/categoria/delete', [RecetasController::class, 'borrarCat'])->name("recetas.borrarCat")->middleware(['auth',AdminMiddleware::class]);
Route::get('/categoria/create', [RecetasController::class, 'crearCat'])->name("recetas.crearCat")->middleware(['auth',AdminMiddleware::class]);

//Route::middleware([AdminMiddleware::class])->group(function () {
//});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
