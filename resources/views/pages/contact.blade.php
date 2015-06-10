@extends('app')

@section('content')
	<h1>contact page</h1>
@stop

@section('footer')
	<p>footer from contact</p>


	<?php
		$name = "John";
	?>
	@if ($name == 'John')
		<h1>hi John</h1>
	@else 
	@endif


@stop