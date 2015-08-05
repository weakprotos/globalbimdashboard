<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Global BIM Dashboard</title>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap-theme.min.css">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="https://www.google.com/jsapi"></script>
	<script type="text/javascript">
		google.load("visualization","1",{packages:["geochart"]});
		google.setOnLoadCallback(drawRegionsMap);

		function drawRegionsMap(){
			var data = google.visualization.arrayToDataTable([
				['Region Code','Continent','SLIM BIM INDEX'],
				['002','Africa',0],
				['150','Europe',31],
				['019','Americas',50],
				['142','Asia',17],
				['009','Oceania',0]
			]);

			var options = {
				resolution:'continents'
			};

			var chart = new google.visualization.GeoChart(document.getElementById('regions_div'));
			chart.draw(data,options);
		}
		</script>







	<style>
		@import url(//fonts.googleapis.com/css?family=Lato:700);

		body {
			margin:0;
			font-family:'Lato', sans-serif;
			text-align:center;
			color: #999;
		}
		.content_header {
			width:900px;
			height:50px;
			position: absolute;
			left: 50%;
			top:0px;
			margin-left:-550px;		
		}	
		#regions_div {
			top:40px;
			left:50%;
			margin-left: -550px;
		}
		.content_footer {
			width: 900px;
			height: 100px;
			position: absolute;
			left: 50%;
			top: 650px;
			margin-left: -550px;
			margin-top: -50px;
		}

		a, a:visited {
			text-decoration:none;
		}

		h1 {
			font-size: 32px;
			margin: 16px 0 0 0;
		}

/*
 *  * Base structure
 *   */

/* Move down content because we have a fixed navbar that is 50px tall */
body {
  padding-top: 50px;
}


/*
 *  * Global add-ons
 *   */

.sub-header {
  padding-bottom: 10px;
  border-bottom: 1px solid #eee;
}

/*
 *  * Top navigation
 *   * Hide default border to remove 1px line.
 *    */
.navbar-fixed-top {
  border: 0;
}

/*
 *  * Sidebar
 *   */

/* Hide for mobile, show later */
.sidebar {
  display: none;
}
@media (min-width: 768px) {
	  .sidebar {
		      position: fixed;
		          top: 51px;
		          bottom: 0;
			      left: 0;
			      z-index: 1000;
			          display: block;
			          padding: 20px;
				      overflow-x: hidden;
				      overflow-y: auto; /* Scrollable contents if viewport is shorter than content. */
				          background-color: #f5f5f5;
				          border-right: 1px solid #eee;
					    }
}

/* Sidebar navigation */
.nav-sidebar {
  margin-right: -21px; /* 20px padding + 1px border */
  margin-bottom: 20px;
  margin-left: -20px;
}
.nav-sidebar > li > a {
  padding-right: 20px;
  padding-left: 20px;
}
.nav-sidebar > .active > a,
.nav-sidebar > .active > a:hover,
.nav-sidebar > .active > a:focus {
  color: #fff;
  background-color: #428bca;
}


/*
 *  * Main content
 *   */

.main {
  padding: 20px;
}
@media (min-width: 768px) {
  .main {
    padding-right: 40px;
    padding-left: 40px;
  }
}
.main .page-header {
  margin-top: 0;
}


/*
 *  * Placeholder dashboard ideas
 *   */

.placeholders {
  margin-bottom: 30px;
  text-align: center;
}
.placeholders h4 {
  margin-bottom: 0;
}
.placeholder {
  margin-bottom: 20px;
}
.placeholder img {
  display: inline-block;
  border-radius: 50%;
}


	</style>
</head>
<body>
<nav class="navbar navbar-inverse navbar-fixed-top">
<div class="container-fluid">
        <div class="navbar-header">
		<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
			<span class="sr-only">Toggle navigation</span>
            		<span class="icon-bar"></span>
            		<span class="icon-bar"></span>
            		<span class="icon-bar"></span>
          	</button>
		<a class="navbar-brand" href="#">Global BIM Dashboard</a>
	</div>
        <div id="navbar" class="collapse navbar-collapse">
		<ul class="nav navbar-nav">
			<li class="active"><a href="#">Home</a></li>
			<li><a href="#about">About</a></li>
			<li><a href="#contact">Contact</a></li>
           	</ul>
		<ul class="nav navbar-nav navbar-right">
			<li><a href="#about"></a></li>
			<li><a href="#contact"></a></li>
          	</ul>
	</div><!--/.nav-collapse -->
</div>
</nav>




    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
          <ul class="nav nav-sidebar">
            <li class="active"><a href="#">Overview <span class="sr-only">(current)</span></a></li>
            <li><a href="#">Reports</a></li>
            <li><a href="#">Analytics</a></li>
            <li><a href="#">SLIM BIM Survey</a></li>
          </ul>
          <ul class="nav nav-sidebar">
            <li><a href="">BIM Cases</a></li>
            <li><a href="">BIM Cases Survey</a></li>
          </ul>
          <ul class="nav nav-sidebar">
            <li><a href="">BIM Guides</a></li>
            <li><a href="">BIM Guide Generator</a></li>
          </ul>
        </div>








<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">

		<div class="content_header">
			<h1>The World Map of SLIM BIM Index</h1>
		</div>
		<div id="regions_div" style="width: 900px; height: 500px"></div>
		<div class="content_footer">
			<h1></h1>
		</div>
</div>
</body>
</html>
