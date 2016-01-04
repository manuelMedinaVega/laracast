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
    	'published_at'
    ];

    protected $dates=['published_at']; //cambia el atributo published_at a una instancia de Carbon

    //mutaters
    public function setPublishedAtAttribute($date){ //guarda el campo published_at como si fuera una instancia de Carbon para que se guarde con hora
    	$this->attributes['published_at']=Carbon::parse($date); 
    }

    //scopes
    public function scopePublished($query){ 
    	$query->where('published_at','<=',Carbon::now());
    }

    public function scopeUnpublished($query){
    	$query->where('published_at','>',Carbon::now());
    }
}
