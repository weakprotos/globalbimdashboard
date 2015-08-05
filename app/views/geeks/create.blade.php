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

<h1>Create a Geek</h1>

{{ HTML::ul($errors->all()) }}

{{ Form::open(array('url'=>'geeks')) }}

	<div class="form-group">
		{{ Form::label('name', 'Name') }}
		{{ Form::text('name', Input::old('name'), array('class' => 'form-control')) }}
	</div>
	<div class="form-group">
		{{ Form::label('age', 'Age') }}
		{{ Form::text('age', Input::old('age'), array('class' => 'form-control')) }}
	</div>
	
	{{ Form::submit('Create the Geek!', array('class'=>'btn btn-primary')) }}

{{ Form::close() }}


</div>
</body>
</html>