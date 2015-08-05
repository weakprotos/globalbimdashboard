<!DOCTYPE html>
<html>
<head>
	<title>Lions</title>
	<link rel="stylesheet"href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css">
</head>

<body>
<div class="container">

<nav class="navbar navbar-inverse">
	<div class="navbar-header">
		<a class="navbar-brand"href="{{ URL::to('lions') }}">Lion Alert</a>
	</div>
	<ul class="nav navbar-nav">
		<li><a href="{{ URL::to('lions') }}">View All Lions</a></li>
		<li><a href="{{ URL::to('lions/create') }}">Create a Lion</a></li>
	</ul>
</nav>

<h1>Showing {{ $lion->name }}</h1>

	<div class="jumbotron text-center">
		<p>
			<strong>Name:</strong> {{ $lion->name }}<br>
			<strong>Age:</strong> {{ $lion->age }}
		</p>
	</div>


</div>
</body>
</html>