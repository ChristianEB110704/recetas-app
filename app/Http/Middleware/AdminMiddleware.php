<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\Roles;
use App\Models\User;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Verificar si el usuario está autenticado
        if (!$request->user()) {
            return redirect()->route('login');
        }
        // Verificar si el usuario tiene el rol de administrador
        if (!$this->isAdmin($request->user())) {
            abort(403, 'Acceso no autorizado.');
        }
        return $next($request);
    }

    public function isAdmin($user)
    {

        // Obtenemos todos los roles de la base de datos
        $roles = Roles::all();
        
        // Buscamos el ID del rol del usuario
        $userRoleId = $user->roles_id;
        foreach ($roles as $rol) {
            if ($userRoleId === $rol->id && $rol->name === "Administrador") {
                return true;
            }
        }
        return false;
    }
}
