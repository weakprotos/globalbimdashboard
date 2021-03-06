<!DOCTYPE html>
<html>
<head>
<title></title>
</head>
<body>
@extends('layouts.sb-admin-2') 

@section('title') 
World slim BIM Model | GlobalBIM Dashboard 
@stop 

@section('script-front') <!-- Bootstrap Core CSS -->

<link href="../../bower_components/bootstrap/dist/css/bootstrap.min.css" rel=
"stylesheet"><!-- MetisMenu CSS -->
<link href="../../bower_components/metisMenu/dist/metisMenu.min.css" rel=
"stylesheet"><!-- Custom CSS -->
<link href=
"../../bower_components/startbootstrap-sb-admin-2/dist/css/sb-admin-2.css" rel=
"stylesheet"><!-- Custom Fonts -->
<link href="../../bower_components/font-awesome/css/font-awesome.min.css" rel=
"stylesheet" type="text/css">

<style>
canvas {
  width: 100%;
  height: auto;
}
</style>
@stop 

@section('script-rear') 

<!-- jQuery -->
 <script src="../../bower_components/jquery/dist/jquery.min.js"></script> <!-- Bootstrap Core JavaScript -->
 <script src="../../bower_components/bootstrap/dist/js/bootstrap.min.js"></script> <!-- Metis Menu Plugin JavaScript -->
 <script src="../../bower_components/metisMenu/dist/metisMenu.min.js"></script> <!-- Custom Theme JavaScript -->
 <script src=
"../../bower_components/startbootstrap-sb-admin-2/dist/js/sb-admin-2.js"></script> <script src="https://www.google.com/jsapi" type="text/javascript"></script> <script src="../../bower_components/chartjs/Chart.js"></script> <script>

var radarOptions = {
				
	//Boolean - If we show the scale above the chart data           
	scaleOverlay : false,
	
	//Boolean - If we want to override with a hard coded scale
	scaleOverride : false,
	
	//** Required if scaleOverride is true **
	//Number - The number of steps in a hard coded scale
	scaleSteps : null,
	//Number - The value jump in the hard coded scale
	scaleStepWidth : null,
	//Number - The centre starting value
	scaleStartValue : null,
	
	//Boolean - Whether to show lines for each scale point
	scaleShowLine : true,

	//String - Colour of the scale line 
	scaleLineColor : "#999",
	
	//Number - Pixel width of the scale line    
	scaleLineWidth : 1,

	//Boolean - Whether to show labels on the scale 
	scaleShowLabels : false,
	
	//Interpolated JS string - can access value
	
	//String - Scale label font declaration for the scale label
	scaleFontFamily : "'Arial'",
	
	//Number - Scale label font size in pixels  
	scaleFontSize : 12,
	
	//String - Scale label font weight style    
	scaleFontStyle : "normal",
	
	//String - Scale label font colour  
	scaleFontColor : "#000",
	
	//Boolean - Show a backdrop to the scale label
	scaleShowLabelBackdrop : true,
	
	//String - The colour of the label backdrop 
	scaleBackdropColor : "rgba(255,255,255,1)",
	
	//Number - The backdrop padding above & below the label in pixels
	scaleBackdropPaddingY : 2,
	
	//Number - The backdrop padding to the side of the label in pixels  
	scaleBackdropPaddingX : 2,
	
	//Boolean - Whether we show the angle lines out of the radar
	angleShowLineOut : true,
	
	//String - Colour of the angle line
	angleLineColor : "rgba(255,255,255,0.3)",
	
	//Number - Pixel width of the angle line
	angleLineWidth : 1,         
	
	//String - Point label font declaration
	pointLabelFontFamily : "'Arial'",
	
	//String - Point label font weight
	pointLabelFontStyle : "normal",
	
	//Number - Point label font size in pixels  
	pointLabelFontSize : 12,
	
	//String - Point label font colour  
	pointLabelFontColor : "#000000",
	
	//Boolean - Whether to show a dot for each point
	pointDot : true,
	
	//Number - Radius of each point dot in pixels
	pointDotRadius : 3,
	
	//Number - Pixel width of point dot stroke
	pointDotStrokeWidth : 1,
	
	//Boolean - Whether to show a stroke for datasets
	datasetStroke : true,
	
	//Number - Pixel width of dataset stroke
	datasetStrokeWidth : 1,
	
	//Boolean - Whether to fill the dataset with a colour
	datasetFill : true,
	
	//Boolean - Whether to animate the chart
	animation : true,

	//Number - Number of animation steps
	animationSteps : 60,
	
	//String - Animation easing effect
	animationEasing : "easeOutQuart",

	//Function - Fires when the animation is complete
	onAnimationComplete : null,
	
	tooltipTemplate: "<%if (label){%><%=label%>: <%}%><%= value %>"
	
}

// Radar Data
var radarData = {
	labels : ["Depth of implementation(%)","Years using BIM(%)","Level of proficiency(%)","Level of adoption(%)"],
	datasets : [
		{
			label: "World Average(%)",
			fillColor : "rgba(151,187,205,0.5)",
			strokeColor : "rgba(151,187,205,1)",
			data : [{{$data['depth']}},{{$data['years']}},{{$data['proficiency']}},{{$data['adoption']}}]
		},
		{
			label: "100(%)",
			fillColor : "rgba(151,187,205,0.1)",
			strokeColor : "rgba(151,187,205,0.1)",
			data : [100,100,100,100]
		}
	]
}

var radarData2 = {
	labels : ["Depth of implementation(%)","Years using BIM(%)","Level of proficiency(%)"],
	datasets : [
		{
			label: "World Average",
			fillColor : "rgba(151,187,205,0.5)",
			strokeColor : "rgba(151,187,205,1)",
			data : [{{$data['depth']}},{{$data['years']}},{{$data['proficiency']}}]
		},
		{
			label: "100(%)",
			fillColor : "rgba(151,187,205,0.1)",
			strokeColor : "rgba(151,187,205,0.1)",
			data : [100,100,100]
		}
	]
}


//Get the context of the Radar Chart canvas element we want to select
var ctx = document.getElementById("canvas").getContext("2d");

// Create the Radar Chart
var myRadarChart = new Chart(ctx).Radar(radarData, radarOptions);


//Get the context of the Radar Chart canvas element we want to select
var ctx2 = document.getElementById("triangle").getContext("2d");

// Create the Radar Chart
var myRadarChart2 = new Chart(ctx2).Radar(radarData2, radarOptions);



var canvas = document.getElementById('rugby');

if(canvas.getContext) 
{
  var ctx = canvas.getContext('2d');
  //drawEllipse(ctx, 10, 10, 100, 60);
  drawEllipseByCenter(ctx, 200,200,{{$data['adoption']}},{{$data['depth']}});
}

function drawEllipseByCenter(ctx, cx, cy, w, h) {
  drawEllipse(ctx, cx - w/2.0, cy - h/2.0, w, h);
}

function drawEllipse(ctx, x, y, w, h) {
  var kappa = .5522848,
      ox = (w / 2) * kappa, // control point offset horizontal
      oy = (h / 2) * kappa, // control point offset vertical
      xe = x + w,           // x-end
      ye = y + h,           // y-end
      xm = x + w / 2,       // x-middle
      ym = y + h / 2;       // y-middle

  ctx.beginPath();
  ctx.moveTo(x, ym);
  ctx.bezierCurveTo(x, ym - oy, xm - ox, y, xm, y);
  ctx.bezierCurveTo(xm + ox, y, xe, ym - oy, xe, ym);
  ctx.bezierCurveTo(xe, ym + oy, xm + ox, ye, xm, ye);
  ctx.bezierCurveTo(xm - ox, ye, x, ym + oy, x, ym);
  //ctx.closePath(); // not used correctly, see comments (use to close off open path)
  ctx.stroke();
}




// Radar Data
var your_radarData = {
	labels : ["Depth of implementation(%)","Years using BIM(%)","Level of proficiency(%)","Level of adoption(%)"],
	datasets : [
		{
			label: "World Average(%)",
			fillColor : "rgba(151,187,205,0.5)",
			strokeColor : "rgba(151,187,205,1)",
			data : [{{$data['your_depth']}},{{$data['your_years']}},{{$data['your_proficiency']}},{{$data['your_adoption']}}]
		},
		{
			label: "100(%)",
			fillColor : "rgba(151,187,205,0.1)",
			strokeColor : "rgba(151,187,205,0.1)",
			data : [100,100,100,100]
		}
	]
}

var your_radarData2 = {
	labels : ["Depth of implementation(%)","Years using BIM(%)","Level of proficiency(%)"],
	datasets : [
		{
			label: "World Average",
			fillColor : "rgba(151,187,205,0.5)",
			strokeColor : "rgba(151,187,205,1)",
			data : [{{$data['your_depth']}},{{$data['your_years']}},{{$data['your_proficiency']}}]
		},
		{
			label: "100(%)",
			fillColor : "rgba(151,187,205,0.1)",
			strokeColor : "rgba(151,187,205,0.1)",
			data : [100,100,100]
		}
	]
}


//Get the context of the Radar Chart canvas element we want to select
var ctx3 = document.getElementById("yourcanvas").getContext("2d");

// Create the Radar Chart
var myRadarChart3 = new Chart(ctx3).Radar(your_radarData, radarOptions);


//Get the context of the Radar Chart canvas element we want to select
var ctx4 = document.getElementById("yourtriangle").getContext("2d");

// Create the Radar Chart
var myRadarChart4 = new Chart(ctx4).Radar(your_radarData2, radarOptions);




var canvas2 = document.getElementById('yourrugby');

if(canvas2.getContext) 
{
  var ctx2 = canvas2.getContext('2d');
  //drawEllipse(ctx, 10, 10, 100, 60);
  drawEllipseByCenter(ctx2, 200,200,{{$data['your_adoption']}},{{$data['your_depth']}});
}

function drawEllipseByCenter(ctx, cx, cy, w, h) {
  drawEllipse(ctx, cx - w/2.0, cy - h/2.0, w, h);
}

function drawEllipse(ctx, x, y, w, h) {
  var kappa = .5522848,
      ox = (w / 2) * kappa, // control point offset horizontal
      oy = (h / 2) * kappa, // control point offset vertical
      xe = x + w,           // x-end
      ye = y + h,           // y-end
      xm = x + w / 2,       // x-middle
      ym = y + h / 2;       // y-middle

  ctx.beginPath();
  ctx.moveTo(x, ym);
  ctx.bezierCurveTo(x, ym - oy, xm - ox, y, xm, y);
  ctx.bezierCurveTo(xm + ox, y, xe, ym - oy, xe, ym);
  ctx.bezierCurveTo(xe, ym + oy, xm + ox, ye, xm, ye);
  ctx.bezierCurveTo(xm - ox, ye, x, ym + oy, x, ym);
  //ctx.closePath(); // not used correctly, see comments (use to close off open path)
  ctx.stroke();
}






</script> 
@stop 

@section('page-wrapper')
<div id="page-wrapper">
	<div class="row">
		<div class="col-lg-12">
			<h1 class="page-header">Global BIM Adoption Status</h1>
		</div><!-- /.col-lg-12 -->
	</div><!-- /.row -->
	<div class="row">
		<div class="col-lg-12">
			<div class="panel panel-default">
				<div class="panel-heading" style="font-weight: bold">
					World slim BIM Model
				</div><!-- /.panel-heading -->
			<div class="panel-body">
				<div class="row">
					<div class="col-lg-4">
						<div class="panel panel-default">
							<div class="panel-heading">Diamond Model</div>
								<div class="panel-body"><canvas height="400px" id="canvas" width="400px"></canvas></div>
							</div>
						</div>
						<div class="col-lg-4">
							<div class="panel panel-default">
								<div class="panel-heading">Triangle Model</div>
								<div class="panel-body"><canvas height="400px" id="triangle" width="400px"></canvas></div>
							</div>
						</div>
					
						<div class="col-lg-4">
							<div class="panel panel-default">
								<div class="panel-heading">Rugby Model</div>
								<div class="panel-body"><canvas height="400px" id="rugby" width="400px"></canvas></div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-lg-4">
							<div class="panel panel-default">
								<div class="panel-heading">Diamond Index</div>
								<div class="panel-body">
									<h1>{{$data['dindex']}}</h1>
								</div>
							</div>
						</div>
						<div class="col-lg-4">
	
							<div class="panel panel-default">
								<div class="panel-heading">Triangle Index</div>
								<div class="panel-body">
									<h1>{{$data['tindex']}}</h1>
								</div>
							</div>
						</div>
						<div class="col-lg-4">
							<div class="panel panel-default">
								<div class="panel-heading">Rugby Index</div>
								<div class="panel-body">
									<h1>{{$data['rindex']}}</h1>
								</div>
							</div>
						</div>
					</div>
				</div><!-- /.panel-body -->
			</div><!-- /.panel -->
		</div><!--/.col-lg-12 -->
		
	</div><!-- row-->
    <div class="row">
		<div class="col-lg-12">
			<div class="panel panel-default">
				<div class="panel-heading" style="font-weight: bold">
					Your country's slim BIM Model
				</div><!-- /.panel-heading -->
			<div class="panel-body">
				<div class="row">
					<div class="col-lg-4">
						<div class="panel panel-default">
							<div class="panel-heading">Diamond Model</div>
								<div class="panel-body"><canvas height="400px" id="yourcanvas" width="400px"></canvas></div>
							</div>
						</div>
						<div class="col-lg-4">
							<div class="panel panel-default">
								<div class="panel-heading">Triangle Model</div>
								<div class="panel-body"><canvas height="400px" id="yourtriangle" width="400px"></canvas></div>
							</div>
						</div>
					
						<div class="col-lg-4">
							<div class="panel panel-default">
								<div class="panel-heading">Rugby Model</div>
								<div class="panel-body"><canvas height="400px" id="yourrugby" width="400px"></canvas></div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-lg-4">
							<div class="panel panel-default">
								<div class="panel-heading">Diamond Index</div>
								<div class="panel-body">
									<h1>{{$data['your_dindex']}}</h1>
								</div>
							</div>
						</div>
						<div class="col-lg-4">
	
							<div class="panel panel-default">
								<div class="panel-heading">Triangle Index</div>
								<div class="panel-body">
									<h1>{{$data['your_tindex']}}</h1>
								</div>
							</div>
						</div>
						<div class="col-lg-4">
							<div class="panel panel-default">
								<div class="panel-heading">Rugby Index</div>
								<div class="panel-body">
									<h1>{{$data['your_rindex']}}</h1>
								</div>
							</div>
						</div>
					</div>
				</div><!-- /.panel-body -->
			</div><!-- /.panel -->
			<p> <a href="{{ URL::to('languages/select')  }}" type="button" class="btn btn-outline btn-primary btn-lg btn-block">Would you share your thoughts on the BIM implementation level of your region? </a></p>
		</div><!--/.col-lg-12 -->
		
	</div><!-- row-->
</div>
@stop
</div>
</body>
</html>