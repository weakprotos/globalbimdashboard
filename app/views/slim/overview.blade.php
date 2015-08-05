@extends('layouts.sb-admin-2')

@section('title')
Overview | Global BIM Dashboard
@stop

@section('script-front')
    <!-- Bootstrap Core CSS -->
    <link href="../bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="../bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../bower_components/startbootstrap-sb-admin-2/dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
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

		window.addEventListener('resize', function () { 
			   // "use strict";
			   // window.location.reload();
		//google.load("visualization","1",{packages:["geochart"]});
		//google.setOnLoadCallback(drawRegionsMap);
			//
			drawRegionsMap(); 
		});




</script>

<script src="../bower_components/chartjs/Chart.js"></script>
<script>

var radarChartData = {
	labels: ["Depth of BIM Implementation", "Years using BIM", "Level of BIM Proficiency", "Level of BIM Adoption"],
	datasets: [
	
	{
		label: "South Korea, 2012",
		fillColor: "rgba(151,187,205,0.2)",
		strokeColor: "rgba(151,187,205,1)",
		pointColor: "rgba(151,187,205,1)",
		pointStrokeColor: "#fff",
		pointHighlightFill: "#fff",
		pointHighlightStroke: "rgba(151,187,205,1)",
		data: [0.13,0.25,0.28,0.58]
	}
]};
var radarChartData2 = {
	labels: ["Depth of BIM Implementation", "Years using BIM", "Level of BIM Proficiency"],
	datasets: [
	
	{
		label: "South Korea, 2012",
		fillColor: "rgba(151,187,205,0.2)",
		strokeColor: "rgba(151,187,205,1)",
		pointColor: "rgba(151,187,205,1)",
		pointStrokeColor: "#fff",
		pointHighlightFill: "#fff",
		pointHighlightStroke: "rgba(151,187,205,1)",
		data: [0.13,0.25,0.28]
	}
]};



window.onload = function(){
	window.myRadar = new Chart(document.getElementById("triangle").getContext("2d")).Radar(radarChartData2, {
	responsive: true
	});
	window.myRadar = new Chart(document.getElementById("canvas").getContext("2d")).Radar(radarChartData, {
	responsive: true
	});

}
</script>

@stop


@section('script-rear')
    <!-- jQuery -->
    <script src="../bower_components/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../bower_components/metisMenu/dist/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../bower_components/startbootstrap-sb-admin-2/dist/js/sb-admin-2.js"></script>

@stop


@section('page-wrapper')

<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
		    <h1 class="page-header">Overview</h1>
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
				<div id="regions_div" style="width: 100%"></div>

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

