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

<h1>Edit {{ $bear->name }}</h1>

<!-- if there are creation errors, they will show here -->
{{ HTML::ul($errors->all()) }}


{{ Form::model($bear, array('route' => array('bears.update', $bear->id), 'method' => 'PUT')) }}

	<div class="form-group">
		{{ Form::label('name', 'Name') }}
		{{ Form::text('name', null, array('class' => 'form-control')) }}
</div>

	<div class="form-group">
		{{ Form::label('age', 'Age') }}
		{{ Form::text('age', null, array('class' => 'form-control')) }}
	</div>

	{{ Form::submit('Edit the Bear!', array('class' => 'btn btn-primary')) }}


{{ Form::close() }}




</div>
</body>
</html>