<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('about','PagesController@about5');
Route::get('contact','PagesController@contact');
//Route::get('articles','ArticlesController@index');
//Route::get('articles/create','ArticlesController@create');
//Route::get('articles/{id}','ArticlesController@show');
//Route::post('articles','ArticlesController@store');

//Creando manualmente una ruta para actualizar un articulo seria:
//Route::get('articles/{id}/edit','ArticlesController@edit');

/*Existen rutas resource dedicadas para esto
Si comentamos y creamos un nuevo Route::resource (el segundo parametro es el controlador responsable)
crearemos las rutas de arriba, para manipular nuestros articulos, esto sirve para no tener tantas rutas
con una sola linea creamos todas las rutas de arriba, el controlador tendra los metodos a los que 
las rutas hacen referencia */
Route::resource('articles','ArticlesController');

/*Ruta que viene por defecto*/
Route::controllers([
    'auth'=>'Auth\AuthController',
    'password'=>'Auth\PasswordController',
]);