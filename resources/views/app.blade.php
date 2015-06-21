<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Lar 5</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
	{{-- select2 plugin --}}
	<link href="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/css/select2.min.css" rel="stylesheet" />
	
</head>
<body>

	<div class="container">
		<p>header</p>
		@yield('content')
	</div>
	
	<script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
	<script src="http://cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/js/select2.min.js"></script>


	@yield('footer')
		
</body>
</html>