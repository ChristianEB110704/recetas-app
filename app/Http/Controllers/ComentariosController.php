<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ComentarioUsuario;
use Illuminate\Support\Facades\Auth;
use App\Models\Comentario;


class ComentariosController extends Controller{
    public function create(Request $request){
        $user = Auth::user();
        $recetas_id=$request->input("recetas_id");
        if ($user->roles_id!=3) {
            $comentario=$request->comment;
            $user_id=auth()->user()->id;
            $data=['comentario'=>$comentario,'user_id'=>$user_id,'recetas_id'=> $recetas_id];
            Comentario::create($data);
        }
        return redirect()->route('recetas.verReceta',["id"=>$recetas_id]);
    }

    public function likes(Request $request){
        $user = Auth::user();
        $comentario=Comentario::find($request->input("comentario"));
        if ($user->roles_id!=3) {
            $l=ComentarioUsuario::where("user_id",auth()->user()->id)->get();
            $likes=[];
            foreach ($l as $like) {
                $likes[] = $like->comentarios_id;
            }
            if(!in_array($comentario->id, $likes)){
                ComentarioUsuario::create([
                    "user_id"=>auth()->user()->id,
                    "comentarios_id"=>$comentario->id,
                ]);
                $comentario->like= $comentario->like+1;
                $comentario->save();
            }
        }
        $recetas_id=$comentario->recetas_id;
        return redirect()->route('recetas.verReceta',["id"=>$recetas_id]);
    }

    public function dislikes(Request $request){
        $user = Auth::user();
        $comentario=Comentario::find($request->input("comentario"));
        if ($user->roles_id!=3) {
            $l=ComentarioUsuario::where("user_id",auth()->user()->id)->get();
            $likes=[];
            foreach ($l as $like) {
                $likes[] = $like->comentarios_id;
            }
            if (in_array($comentario->id, $likes)) {
                $comentarioLike = ComentarioUsuario::where([
                    "user_id"=>auth()->user()->id,
                    "comentarios_id"=>$comentario->id,
                ]);;
            
                if ($comentarioLike) {
                    $comentario->like = $comentario->like - 1;
                    $comentarioLike->delete();
                    $comentario->save();
                }
            }  
        }
        $recetas_id=$comentario->recetas_id;
        return redirect()->route('recetas.verReceta',["id"=>$recetas_id]);
    }
    public function delete(Request $request){
        $comentario=Comentario::find($request->input("id"));
        ComentarioUsuario::where('comentarios_id', $comentario->id)->delete();
        $recetas_id=$comentario->recetas_id;
        $comentario->delete();

        return redirect()->route('recetas.verReceta',["id"=>$recetas_id]);
    }
    
}
