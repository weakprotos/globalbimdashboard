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

<h1>Edit {{ $lion->name }}</h1>


{{ HTML::ul($errors->all()) }}

{{ Form::model($lion, array('route' => array('lions.update', $lion->id), 'method' => 'PUT')) }}

	<div class="form-group">
		{{ Form::label('name', 'Name') }}
		{{ Form::text('name', null, array('class' => 'form-control')) }}
	</div>

	<div class="form-group">
		{{ Form::label('age', 'Age') }}
		{{ Form::text('age', null, array('class' => 'form-control')) }}
	</div>

	{{ Form::submit('Edit the Lion!', array('class' => 'btn btn-primary')) }}

{{ Form:: close() }}

</div>
</body>
</html>