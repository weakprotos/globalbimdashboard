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

<h1>All the Lions</h1>

@if (Session::has('message'))
	<div class="alert alert-info">{{ Session::get('message') }}</div>
@endif

<table class="table tabel-striped table-bordered">
	<thead>
		<tr>
			<td>ID</td>
			<td>Name</td>
			<td>Age</td>
			<td>Actions</td>
		</tr>
	</thead>
	<tbody>
	@foreach($lions as $key => $value)
		<tr>
			<td>{{ $value->id }}</td>
			<td>{{ $value->name }}</td>
			<td>{{ $value->age }}</td>

			<td>
				{{ Form::open(array('url' => 'lions/'.$value->id, 'class' => 'pull-right')) }}
					{{ Form::hidden('_method', 'DELETE') }}
					{{ Form::submit('Delete this Lion', array('class' => 'btn btn-warning')) }}
				{{ Form::close() }}

				<a class="btn btn-small btn-success" href="{{ URL::to('lions/'.$value->id) }}">Show this Lion</a>
				<a class="btn btn-small btn-info" href="{{ URL::to('lions/'.$value->id.'/edit') }}">Edit this Lion</a>


			</td>
		</tr>
	@endforeach
	</tbody>
</table>
</div>
</body>
</html>