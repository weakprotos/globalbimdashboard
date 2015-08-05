<!DOCTYPE html>
<html>
<head>
	<title>Geeks</title>
	<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css">
</head>

<body>
<div class="container">

<nav class="navbar navbar-inverse">
	<div class="navbar-header">
		<a class="navbar-brand" href="{{ URL::to('geeks') }}">Geek Alert</a>
	</div>
	<ul class="nav navbar-nav">
		<li><a href="{{ URL::to('geeks') }}">View All Geeks</a></li>
		<li><a href="{{ URL::to('geeks/create') }}">Create a Geek</a></li>
	</ul>
</nav>

<h1>Showing {{ $geek->name }}</h1>

<div class="jumbotron text-center">
	<p>
		<strong>Name:</strong> {{ $geek->name }} <br>
		<strong>Age: </strong> {{ $geek->age }}
	</p>
</div>


</div>
</body>
</html>