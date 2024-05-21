<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RecetasSinValidar extends Model
{
    use HasFactory;
    protected $table = 'recetas_sin_validar';

    protected $fillable = [
        'nombre',
        'duracion',
        'categoria',
        'descripcion',
        'pasos',
        'user_id',
        'imagen',
    ];
}
