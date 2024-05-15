<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Roles;
use App\Models\User;

class RolesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //Cuando se vaya a eliminar los roles comprobar que no sea ni el admin ni el Usuario, luego quiero que se puedan eliminar crear o "editar".
        //Tambien quiero un boton para asignar roles a todos los usuarios.
        return view('roles',["roles"=>Roles::all()]);
    }

    /**
     * Display the specified resource.
     */
    public function crearRoles(string $nombre)
    {
        $nuevoRol=Roles::create([
            'name' => $nombre 
        ]);
        return redirect()->route("roles.index");
    }

    public function asignarRoles()
    {
        return view("administrar-roles",["usuarios"=>User::all(),"roles"=>Roles::all()]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function borrarRoles(int $id)
    {
        $rol=Roles::find($id);
        if($rol->name=="Administrador" || $rol->name=="Usuario"){
            echo "No se pudo borrar este rol";
        }
        $rol->delete();
        return redirect()->route("roles.index");
    }
    public function save(Request $request){
        $usuarios=User::all();
        foreach($usuarios as $usuario){
            if($usuario->id!=1){
                $rol=$request->input('usuario/'.$usuario->id);
                $usuario->roles_id=intval($rol);
                $usuario->save();
            }
        }
        return redirect()->route("roles.asignarRoles");
    }

}
