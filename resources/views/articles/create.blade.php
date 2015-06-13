@extends('app')

@section('content')

	<h1>Create</h1>
	<hr>

	{!! Form::open(['url'=>'articles']) !!}
		@include('articles.form')
	{!! Form::close() !!}

	@include('errors.list')
	
@stop