@extends('layouts.sb-admin-2')

@section('title')
Overview | Global BIM Dashboard
@stop

@section('script-front')
    <!-- Bootstrap Core CSS -->
    <link href="../../bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="../../bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../../bower_components/startbootstrap-sb-admin-2/dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../../bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">






@stop


@section('script-rear')
    <!-- jQuery -->
    <script src="../../bower_components/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../../bower_components/metisMenu/dist/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../../bower_components/startbootstrap-sb-admin-2/dist/js/sb-admin-2.js"></script>

<script type="text/javascript" src="https://www.google.com/jsapi"></script>


<script src="../../bower_components/chartjs/Chart.js"></script>

<script type="text/javascript">

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
	scaleLabel : "<%=value%>",
	
	//String - Scale label font declaration for the scale label
	scaleFontFamily : "'Arial'",
	
	//Number - Scale label font size in pixels	
	scaleFontSize : 12,
	
	//String - Scale label font weight style	
	scaleFontStyle : "normal",
	
	//String - Scale label font colour	
	scaleFontColor : "#666",
	
	//Boolean - Show a backdrop to the scale label
	scaleShowLabelBackdrop : true,
	
	//String - The colour of the label backdrop	
	scaleBackdropColor : "rgba(255,255,255,0.75)",
	
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
	pointLabelFontColor : "#EFEFEF",
	
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
	onAnimationComplete : null
	
}

// Radar Data
var radarData = {
	labels : ["Depth of implementation","Years using BIM","Level of proficiency","Level of adoption"],
	datasets : [
		{
			fillColor : "rgba(151,187,205,0.5)",
			strokeColor : "rgba(151,187,205,1)",
			data : [28,48,40,19]
		}
	]
}

var radarData2 = {
	labels : ["Depth of implementation","Years using BIM","Level of proficiency"],
	datasets : [
		{
			fillColor : "rgba(151,187,205,0.5)",
			strokeColor : "rgba(151,187,205,1)",
			data : [28,48,40]
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


</script>



@stop


@section('page-wrapper')

<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
		    <h1 class="page-header">SLIM BIM Map By Year</h1>
		</div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
		<div class="col-lg-9">
  <div class="panel panel-default">
                        <div class="panel-heading">
                            World Map
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
					<div id="pop-div" style="width: 100%"></div>

<script  type="text/javascript">

function selectCallback(event, chart) {
  // Useful for using chart methods such as chart.getSelection();
   console.log(chart.getSelection());
   
   $(document).ready(function(){
    function codeAddress() {
        var address = document.getElementById("formatedAddress").value;
        geocoder.geocode( { 'address': address}, function(results, status) {
            if (status == google.maps.GeocoderStatus.OK) {
                map.setCenter(results[0].geometry.location);
            }
        });
    }
    $("#img-clck").click(codeAddress);
});
	
}

</script>

					@geochart('Popularity', 'pop-div')
					
			 </div>
                        <!-- /.panel-body -->
                    </div>
		    <!-- /.panel -->
		</div>
		<!--/.col-lg-8 -->
		<div class="col-lg-3">
			<div class="panel panel-default">
				<div class="panel-heading">
					Current Location
				</div>
				<div class="panel-body">
					Asia
				</div>
			</div>
			<div class="panel panel-default">
				<div class="panel-heading">
					Diamond Model
				</div>
				<div class="panel-body">
<canvas id="canvas" width="300" height="200"></canvas>
				</div>
			</div>
			<div class="panel panel-default">
				<div class="panel-heading">
					Triangle Model
				</div>
				<div class="panel-body">
<canvas id="triangle" width="300" height="200"></canvas>
				</div>
			</div>
			
		</div>
	</div>
	<!-- row-->	


@stop

