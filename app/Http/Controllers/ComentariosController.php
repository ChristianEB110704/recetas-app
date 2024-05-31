<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ComentarioUsuario;
use App\Models\Comentario;

class ComentariosController extends Controller
{
    public function create(Request $request){
        $comentario=$request->comment;
        $user_id=auth()->user()->id;
        $recetas_id=$request->input("recetas_id");
        $data=['comentario'=>$comentario,'user_id'=>$user_id,'recetas_id'=> $recetas_id];
        Comentario::create($data);
        return redirect()->route('recetas.verReceta',["id"=>$recetas_id]);
    }

    public function agregarLike()
    {
        //
    }

    public function delete(Request $request){
        $comentario=Comentario::find($request->input("id"));
        $likesRel = ComentarioUsuario::where('comentarios_id', $comentario->id)->get();
        // Verificar si se encontraron relaciones de "Me gusta" para el comentario
        if ($likesRel->isNotEmpty()) {
            // Si se encontraron relaciones, las recorremos y las eliminamos
            foreach ($likesRel as $like) {
                $like->delete();
            }
        }
        $recetas_id=$comentario->recetas_id;
        $comentario->delete();

        return redirect()->route('recetas.verReceta',["id"=>$recetas_id]);
    }
    
}
