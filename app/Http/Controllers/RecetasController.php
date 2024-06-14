<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Recetas;
use App\Models\Categoria;
use App\Models\RecetasSinValidar;
use App\Models\User;
use App\Models\ComentarioUsuario;
use App\Models\Comentario;
use App\Models\Imagenes;
use Illuminate\Support\Facades\Storage;

class RecetasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(){
        $panes= Recetas::all();
        $imagenes= Imagenes::where("tabla","recetas")->get();
        return view('recetas',['recetas'=>$panes,'imagenes'=>$imagenes]);
    }

    public function create(){
        $categorias= Categoria::all();
        return view('crear_receta',['categorias'=>$categorias]);
    }

    public function verReceta(Request $request){
        $receta=Recetas::find($request->input("id")); 
        $users=User::all(); 
        $imagen= Imagenes::where("tabla","recetas")->where("recetas_id",$request->input("id"))->first();
        $comentarios=Comentario::where("recetas_id",$receta->id)->whereNotIn('user_id',User::where("roles_id",3)->get('id'))->get();
        $l=ComentarioUsuario::where("user_id",Auth::user()->id)->get();
        $likes=[];
        foreach ($l as $like) {
            $likes[] = $like->comentarios_id;
        }
        return view("ver-receta",["receta"=>$receta,"users"=> $users,"comentarios"=>$comentarios,"likes"=> $likes,"imagen"=>$imagen]);
    }
    /**
     * Store a newly created resource in storage.
     */
    public function save(Request $request){
        $user = Auth::user();
        $error=[];
        $titulo = $request->input('nombre');
        if(empty($titulo)){
            $error['titulo']="No se agrego el titulo";
        }
        $duracion = $request->input('duracion');
        if(empty($duracion)){
            $error['duracion']="No se agrego la duracion";
        }
        $categoria = $request->input('categoria');
        if($categoria==""){
            $error['categoria']="No se agrego la categoria";
        }
        $descripcion =  nl2br($request->input('descripcion'));
        if(empty($descripcion)){
            $error['descripcion']="No se agrego la descripción";
        }
        $pasos =  nl2br($request->input('pasos'));
        if(empty($pasos)){
            $error['pasos']="No se agrego los pasos";
        }
        if(empty($request->file("imagen"))){
            $error['imagen']="No se agrego una imagen";
        }else{
            $imagen = $request->file('imagen')->store('public');
        }
        
        if(sizeof($error)!=0){
            $categorias= Categoria::all(); 
            return redirect()->back()->withErrors($error)->withInput();
        }

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
    public function adminRecetas(){
        $recetas=Recetas::all();
        $recetasSV=RecetasSinValidar::all();
        $categorias=Categoria::all();
        $imagenes=Imagenes::all();

        return view("admin-recetas",["recetas"=>$recetas,"recetasSV"=>$recetasSV,"categorias"=>$categorias,"imagenes"=> $imagenes]);
    }

    public function delete(string $tipo,int $id){
        $datos="";
        if($tipo=="r"){
            $receta=Recetas::find($id);
            $datos="recetas";
            $receta->delete();
        }elseif($tipo=="rsv"){
            $receta=RecetasSinValidar::find($id);
            $datos="recetas_sin_validar";
            $receta->delete();
        }elseif($tipo=="validar"){
            $this->verificar($id);
            return redirect()->route("recetas.adminRecetas");
        }
        else{
            return abort(403,"Datos introducidos no validos");
        }   

        foreach(Comentario::where('recetas_id', $id)->get() as $comentario){
            $this->deleteSinRedirigir($comentario->id);
        }


        $imagenes = Imagenes::where('tabla', $datos)
                            ->where('recetas_id', $id)
                            ->first();

        $filePath = 'public/'. $imagenes->ruta;

        $imagenes->delete();

        if (Storage::exists($filePath)) {
            Storage::delete($filePath);
        }
        return redirect()->route("recetas.adminRecetas");
    }

    public function verificar(int $id){
        $recetaSV=RecetasSinValidar::find($id);
        $receta=Recetas::create([
            'nombre' => $recetaSV->nombre,
            'duracion' => $recetaSV->duracion,
            'categoria' => $recetaSV->categoria,
            'descripcion' => $recetaSV->descripcion,
            'pasos' => $recetaSV->pasos,
            'user_id' => $recetaSV->user_id,
        ]);

        $imagen = Imagenes::where('tabla', "recetas_sin_validar")
                            ->where('recetas_id', $id)
                            ->first();
        $imagen->tabla="recetas";
        $imagen->recetas_id=$receta->id;
        $recetaSV->delete();
        $receta->save();
        $imagen->save();
    }

    public function borrarCat(Request $request){
        $categoria =Categoria::where('name', $request->input("name"))->first();
        $categoria->delete();
        return redirect()->route("recetas.adminRecetas");
    }
    public function crearCat(Request $request){
        Categoria::create([
            'name' => $request->input("name"),
        ]);
        return redirect()->route("recetas.adminRecetas");
    }

    public function deleteSinRedirigir(int $id){
        $comentario=Comentario::find($id);
        ComentarioUsuario::where('comentarios_id', $comentario->id)->delete();
        $recetas_id=$comentario->recetas_id;
        $comentario->delete();
    }
}
