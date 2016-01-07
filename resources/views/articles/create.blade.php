@extends('app')

@section('content')

	<h1>Write a new article</h1>
	<hr/>
	{!! Form::open(['url'=>'articles']) !!}
		<div class="form-group">
			{!! Form::label('title','Title:')!!}
			{!! Form::text('title', null, ['class'=>'form-control']) !!}
		</div>	
		<div class="form-group">
			{!! Form::label('body','Body:')!!} <!-- El primer parametro es el name del label, el segundo es su valor-->
			{!! Form::textarea('body', null, ['class'=>'form-control']) !!} 
			<!-- El primer parametro es el name, el segundo es su valor por defecto, el tercero es un array con los demas atributos-->
		</div>	
		<div class="form-group">
			{!! Form::label('published_at','Publish On:')!!}
			{!! Form::input('date','published_at', date('Y-m-d'), ['class'=>'form-control']) !!} 
			<!-- El primer parametro es el type del input, el segundo su name, el tercero su valor por defecto-->
			<!-- Como tercer parametro tambien se podria usar Carbon: Carbon\Carbon::now()->format('Y-m-d'),
			pero en este caso solo se usa la funcion date de php, lo malo es que en la base solo se guardara la fecha,
			pero no la hora-->

		</div>
		<div class="form-group">
			{!! Form::submit('Add Article',['class'=>'btn btn-primary form-control'])!!}
		</div>

	{!! Form::close() !!}

	@if($errors->any())
		<ul class="alert alert-danger">
			@foreach($errors->all() as $error)
				<li>{{$error}}</li>
			@endforeach
		</ul> 
	@endif
@stop