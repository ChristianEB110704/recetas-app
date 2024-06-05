<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ComentarioUsuario extends Model
{
    use HasFactory;
    protected $table = "usuarios_like";

    protected $fillable = [
                    "user_id",
                    "comentarios_id",
    ];
    public $incrementing = false;
    protected $primaryKey = ['user_id', 'comentarios_id'];
}
