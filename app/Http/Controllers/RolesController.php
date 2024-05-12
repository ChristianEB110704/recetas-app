<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Roles;

class RolesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //Cuando se vaya a eliminar los roles comprobar que no sea ni el admin ni el Usuario, luego quiero que se puedan eliminar crear o "editar".
        //Tambien quiero un boton para asignar roles a todos los usuarios.
        return view('administrar-roles',["roles"=>Roles::all()]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function crearRoles(string $id)
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
    public function borrarRoles(string $id)
    {
        //
    }
}
