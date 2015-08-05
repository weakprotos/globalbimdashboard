<html>
<head>
<title>Dogs List</title>
</head>

<body>
	<h1>Dogs</h1>

@foreach ($dogs as $dog)
	<li>
		{{ $dog->name}} (  {{$dog->age}} ) is owned by {{ $dog->owner }}

	</li>
@endforeach


</body>
</html>

