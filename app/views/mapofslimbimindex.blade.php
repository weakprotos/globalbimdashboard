@extends('layouts.dashboard')

@section('content')
<div class="content_header">
			<h1>The World Map of SLIM BIM Index</h1>
		</div>
		<div id="regions_div" style="width: 850px; height: 400px"></div>
		<div class="content_footer">
			<h1></h1>
		</div>

@stop


@section('map-script')

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

@stop

@section('map-style')

<style>
		
		.content_header {


		}	
		#regions_div {

		}

		.content_footer {

		}

</style>


@stop
