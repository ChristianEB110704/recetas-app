<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Imagenes extends Model
{
    protected $fillable = ['ruta',
                           'recetas_id',
                           'tabla'];

    public function scopeTablaReceta($query, $tabla, $recetas_id)
    {
        return $query->where('tabla', $tabla)->where('recetas_id', $recetas_id);
    }
    
}
    