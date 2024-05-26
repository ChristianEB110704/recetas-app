<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    use HasFactory;
    
    protected $primaryKey = 'name';
    public $incrementing = false;
    protected $keyType = 'string';
    protected $fillable = ['name'];
}
