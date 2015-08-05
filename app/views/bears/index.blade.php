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

<h1>All the Bears</h1>

<!-- will be used to show any messages -->
@if (Session::has('message'))
	<div class="alert alert-info">{{ Session::get('message') }}</div>
@endif

<table class="table table-striped table-boardered">
	<thead>
		<tr>
			<td>ID</td>
			<td>NAME</td>
			<td>AGE</td>
			<td>ACTONS</td>
		</tr>
	</thead>
	<tbody>
	@foreach($bears as $key => $value)
		<tr>
			<td>{{ $value->id }}</td>
			<td>{{ $value->name }}</td>
			<td>{{ $value->age }}</td>

			<td>

				{{ Form::open(array('url' => 'bears/' .$value->id, 'class' => 'pull-right')) }}
					{{ Form::hidden('_method', 'DELETE') }}
					{{ Form::submit('Delete this Bear', array('class' => 'btn btn-warning')) }}
				{{ Form::close() }}
				<a class="btn btn-small btn-success" href="{{ URL::to('bears/' . $value->id) }}">Show this Bear</a>
				<a class="btn btn-small btn-info" href="{{ URL::to('bears/' . $value->id . '/edit') }}">Edit this Bear</a>

			</td>
	</tr>
	@endforeach
	</tbody>
</table>

</div>
</body>
</html>