@extends('app')
    
@section('content')

    <h1>Edit: {!! $article->title !!}</h1>

    <hr/>
        <!--En este caso cuando hacemos submit en este form la convencion es submit un patch request
        a articles/{articles}, por lo tanto el metodo en este caso sera PATCH, para poner la ruta
        podemos hacer: 'url'=>'articles/'.$article->id ; 'route'=>'articles/'.$article->id ; o
        como en este caso usamos action con el metodo del controlador que usamos, y el id
        del articulo, estos dos dentro deun arreglo

        En un comienzo no tenemos nada en nuestro formulario, para llenar el formulario con los valores
        de $article, para hacemos uso de Form::model lo que hace es enlazar un modelo eloquent en el form
        lo unico que hacemos es cambiar open a model y pasarle como primer parametro nuestro objeto ($article)-->
	{!! Form::model($article,['method'=>'PATCH','action'=>['ArticlesController@update',$article->id ]]) !!}
		
        @include('articles.form',['submitButtonText'=>'Update Article'])

	{!! Form::close() !!}

	@include('errors.list')

@stop
