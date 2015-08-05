<!doctype html>
<html>
<head>
	<meta charset="UTF-8">
	<title>@yield('title')</title>

	<style>
		@import url(//fonts.googleapis.com/css?family=Lato:700);

		body {
			margin:0;
			font-family:'Lato', sans-serif;
			text-align:center;
			color: #999;
		}
		.header {
			width:900px;
			height:50px;
			position: absolute;
			left: 50%;
			margin-left:-450px;		
		}	
		#regions_div {
			top:80px;
			left:50%;
			margin-left: -450px;
		}
		.content {
			width: 900px;
			height: 600px;
			position: absolute;
			left: 50%;
			top: 50px;
			margin-left: -450px;
			margin-top: 10px;
		}

		a, a:visited {
			text-decoration:none;
		}

		h1 {
			font-size: 32px;
			margin: 16px 0 0 0;
		}
		@yield('style')
	</style>
</head>
<body>
		<div class="header">
			@yield('header')
		</div>
		<div class="content">
	@yield('content')
		</div>
</body>
</html>
