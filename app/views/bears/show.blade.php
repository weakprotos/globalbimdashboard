<!DOCTYPE html>
<html>
<head>
	<title>Bears</title>
	<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css">
</head>
<body>
<div class="container">

<nav class="navbar navbar-inverse">
	<div class="navbar-header">
		<a class="navbar-brand" href="{{ URL::to('bears') }}">Bear Alert</a>

	</div>
	<ul class="nav navbar-nav">
		<li><a href="{{ URL::to('bears') }}">View All Bears</a></li>
		<li><a href="{{ URL::to('bears/create') }}">Create a Bear</a></li>
	</ul>
</nav>

<h1>Showing {{ $bear->name }}</h1>

	<div class="jumbotron text-center">
		<h2>{{ $bear->name }}</h2>
		<p>
			<strong>Name:</strong> {{ $bear->name }}<br>
			<strong>Age:</strong> {{ $bear->age }}
		</p>
	</div>


</div>
</body>
</html>