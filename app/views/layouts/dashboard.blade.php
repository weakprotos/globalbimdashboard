<!doctype html>
<html lang="en">


<head>
	<meta charset="UTF-8">
	<title>@yield('title')</title>
<script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
<!-- Bootstrap -->
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap-theme.min.css">
<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
<!-- Google Visualization API -->
<script type="text/javascript" src="https://www.google.com/jsapi"></script>
<!-- Style for Bootstrap Dashboard -->
@extends('layouts.dashboard-style')
<!-- Custom Script for the World Map of SLIM BIM INDEX -->
@yield('map-script')
<!-- Style for the World Map of SLIM BIM-->
@yield('map-style')

</head>


<body>
<nav id="primary" class="navbar navbar-default  navbar-fixed-top">
<div class="container-fluid">
        <div class="navbar-header">
		<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar">
			<span class="sr-only">Toggle navigation</span>
            		<span class="icon-bar"></span>
            		<span class="icon-bar"></span>
            		<span class="icon-bar"></span>
          	</button>
		<a class="navbar-brand" href="{{ URL::to('overview') }}">Global BIM Dashboard</a>
	</div>
        <div id="navbar" class="collapse navbar-collapse">
		<ul class="nav navbar-nav">
			<li><a href="{{ URL::to('about-us') }}">About</a></li>
			<li><a href="#contact">Contact</a></li>
			<li><a href="#">World BIM Ecology</a><li>
           	</ul>
		<ul class="nav navbar-nav navbar-right">
			<li><a href="#about"></a></li>
			<li><a href="#contact"></a></li>
          	</ul>
	</div><!--/.nav-collapse -->
</div>
</nav>

<!--
<nav id="secondary" class="navbar navbar-default navbar-lower" role="navigation">
<div class="container-fluid">
			<div class="navbar-header" id="center-title">
				<ul class="nav navbar-nav navbar-header"><li><a>@yield('title')</a></li></ul>
			</div>			
</div>
</nav>
-->





<div class="container-fluid">
	<div class="row">
        	<div class="col-sm-3 col-md-2 sidebar">
			<ul class="nav nav-sidebar nav-sidebar-default">
            			<li><a href="{{ URL::to('overview') }}">Overview <span class="sr-only">(current)</span></a></li>
            			<li><a href="{{ URL::to('') }}#">Reports</a></li>
            			<li><a href="{{ URL::to('') }}#">Analytics</a></li>
            			<li><a href="{{ URL::to('maps/slimbimindex') }}">SLIM BIM Index</a></li>
          		</ul>
          		<ul class="nav nav-sidebar">
            			<li><a href="{{ URL::to('') }}#">BIM Cases</a></li>
            			<li><a href="{{ URL::to('') }}#">BIM Cases Survey1</a></li>
				<li><a href="{{ URL::to('') }}#">BIM Cases Survey2</a></li>
			
			</ul>
       		</div>
		<!--Content-->
		<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
			@yield('content')
		</div>
	</div>
</div>




</body>






</html>
