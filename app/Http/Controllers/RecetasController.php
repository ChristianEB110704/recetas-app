<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Recetas;
use App\Models\Categoria;
use App\Models\RecetasSinValidar;
use App\Models\Imagenes;


class RecetasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(){
        $panes= Recetas::all();
        $imagenes= Imagenes::all();
        return view('recetas',['recetas'=>$panes,'imagenes'=>$imagenes]);
    }

    public function create(){
        $categorias= Categoria::all();
        return view('crear_receta',['categorias'=>$categorias]);
    }

    public function verReceta(int $id){
        $panes= Recetas::all();
        return view('ver_receta');
    }
    /**
     * Store a newly created resource in storage.
     */
    public function save(Request $request){
        $user = Auth::user();
        $titulo = $request->input('nombre');
        $duracion = $request->input('duracion');
        $categoria = $request->input('categoria');
        $descripcion = $request->input('descripcion');
        $pasos = $request->input('pasos');
        $imagen = $request->file('imagen')->store('public');
        
        if ($user->roles_id==1){
            $nuevaReceta=Recetas::create([
                'nombre' => $titulo,
                'duracion' => $duracion,
                'categoria' => $categoria,
                'descripcion' => $descripcion,
                'pasos' => $pasos,
                'user_id' => $user->id, // Asignar el ID del usuario autenticado
            ]);
            $ruta=str_replace("public/","",$imagen);
            Imagenes::create(['ruta' => $ruta,"recetas_id"=> $nuevaReceta->id,"tabla"=>"recetas"]);
        }
        elseif ($user->roles_id==3) {
            return abort(403, 'Cuenta suspendida por baneo de un administrador');
        }
        else{
            $nuevaReceta=RecetasSinValidar::create([
                'nombre' => $titulo,
                'duracion' => $duracion,
                'categoria' => $categoria,
                'descripcion' => $descripcion,
                'pasos' => $pasos,
                'user_id' => $user->id, // Asignar el ID del usuario autenticado
            ]);
            $ruta=str_replace("public/","",$imagen);
            Imagenes::create(['ruta' => $ruta,"recetas_id"=> $nuevaReceta->id,"tabla"=>"recetas_sin_validar"]);
            
        }
        
        return redirect()->route("recetas.index");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
