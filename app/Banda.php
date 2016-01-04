<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Banda extends Model
{
    protected $fillable=[
    	'nombre',
    	'genero',
    	'descripcion',
    	'puntaje'
    ];
}
