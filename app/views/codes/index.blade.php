@extends('layouts.default')

@section('content')
<h1>All Country Codes</h1>
@foreach ($codes as $code)
	<li>
	{{ link_to("/codes/{$code->codename}", $code->codename) }}
	</li>
@endforeach
@stop
