<!doctype html>
<html lang="en">

<link href="//netdna.bootstrapcdn.com/bootstrap/3.0.3/css/bootstrap.min.css" rel="stylesheet">

<body>

<div class="container">
@foreach(array_chunk($items->all(),3) as $row)
	<div class="row">
	
	@foreach($row as $item)
		<article class="col-md-4">
			<h2>{{$item->title}}</h2>
			<img src="{{$item->image}}" alt="{{ $item->title }}">
			<div class="body">
				{{$item->description}}
			</div>
		</article>
	@endforeach
	</div>
@endforeach

{{ $items->links() }}
</div>

</body>
</html>