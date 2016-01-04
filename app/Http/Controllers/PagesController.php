<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class PagesController extends Controller
{
    //
    public function about(){
    	$name ='Manuel <span style="color: red;">Medina</span>';
    	return view('pages.about')->with('name',$name);
    }

    public function about2(){ //Cuando queremos pasar mas de un parametro, pasamos un arreglo
    	return view('pages.about')->with([
    			'nombre'=>'Manuel', //key and value
    			'apellido'=>'Medina'
    		]);
    }

    public function about3(){//usando un arreglo como segundo parametro
    	$datos=[];
    	$datos['nombre']='Manuel';
    	$datos['apellido']='Medina';
    	return view('pages.about',$datos);
    }

    public function about4(){//otra forma de pasar datos
    	$nombre='Manuel';
    	$apellido='Medina';
    	return view('pages.about',compact('nombre','apellido'));

    }

    public function about5(){
        $nombre='Manuel';
        $apellido='Medina';
        //puede que $ musics sea un arreglo vacios
        $musics=['rock','reggae','electro','jazz','ska'];
        //$musics=[];
        return view('pages.about',compact('nombre','apellido','musics'));
    }

    public function contact(){
        return view('pages.contact');
    }
}
