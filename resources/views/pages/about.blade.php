@extends('app')
@section('contenido')
	<h1>About me: {{ $nombre }} {{$apellido}}</h1>
	<p>This is my first time with laravel, don't judge me please!</p>
	@if(count($musics))
		<h3>Music I like:</h3>
		<ul>
			@foreach ($musics as $music)
				<li>{{$music}}</li>
			@endforeach
		</ul>
	@endif
@stop
