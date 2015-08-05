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

<h1>All the Geeks</h1>

@if (Session::has('message'))
	<div class="alert alert-info">{{ Session::get('message') }}</div>
@endif

<table class="table table-striped table-bordered">
	<thead>
		<tr>
			<td>ID</td>
			<td>Name</td>
			<td>Age</td>
			<td>Actions</td>
		<tr>
	</thead>
	<tbody>
	@foreach($geeks as $key => $value)
		<tr>
			<td>{{ $value->id }}</td>
			<td>{{ $value->name }}</td>
			<td>{{ $value->age }}</td>

			<td>
				{{ Form::open(array('url'=>'geeks/'.$value->id, 'class' => 'pull-right')) }}
					{{ Form::hidden('_method', 'DELETE') }}
					{{ Form::submit('Delete the Geek', array('class' => 'btn btn-warning')) }}
				{{ Form::close() }}

				<a class="btn btn-small btn-success" href="{{ URL::to('geeks/'.$value->id) }}">Show this Geek</a>
				<a class="btn btn-small btn-info" href="{{ URL::to('geeks/'.$value->id.'/edit') }}">Edit this Geek</a>
			</td>
		</tr>
	@endforeach
	</tbody>
</table>
</div>
</body>
</html>