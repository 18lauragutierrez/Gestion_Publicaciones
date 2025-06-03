<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Publicacion extends Model
{
    protected $fillable = ['titulo', 'cuerpo', 'imagen', 'usuario_id'];
}