<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
class Article extends Model
{
    //

    protected $fillable=[
    	'title',
    	'body',
    	'published_at',
        'user_id' //temporalmente
    ];

    protected $dates=['published_at']; //cambia el atributo published_at a una instancia de Carbon

    //mutaters
    public function setPublishedAtAttribute($date){ //guarda el campo published_at como si fuera una instancia de Carbon para que se guarde con hora
    	$this->attributes['published_at']=Carbon::parse($date); 
    }

    //scopes, para que solo se muestren los q esten antes de la fecha actual, los que tienen fecha en el futuro no se muestran
    public function scopePublished($query){ 
    	$query->where('published_at','<=',Carbon::now());
    }

    public function scopeUnpublished($query){
    	$query->where('published_at','>',Carbon::now());
    }
    
    /*Esta funcion sirve para definir la relacion que existe entre un articulo y usuario,
    un articulo pertenece a un usuario*/                                   
    public function user(){
        return $this->belongsTo('App\User');
    }
}
