@extends('layouts.sb-admin-2')

@section('title')
Overview | Global BIM Dashboard
@stop

@section('script-front')
    <!-- Bootstrap Core CSS -->
    <link href="bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="bower_components/startbootstrap-sb-admin-2/dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">


<style>
canvas {

  width: 100%;
  height: auto;
}

.chart {
  width: 100%; 
  height: auto;
}

</style>


	
@stop


@section('script-rear')
    <!-- jQuery -->
    <script src="bower_components/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="bower_components/metisMenu/dist/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="bower_components/startbootstrap-sb-admin-2/dist/js/sb-admin-2.js"></script>


<script src="bower_components/chartjs/Chart.js"></script>

<script>

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
var factor = 2.5;

  //drawEllipse(ctx, 10, 10, 100, 60);
for(var i=0;i<10;i++){
drawEllipseByCenter2(ctx, 200,200,10*i*factor,10*i*factor);
}	
  drawEllipseByCenter(ctx, 200,200,{{$data['adoption']}}*factor,{{$data['depth']}}*factor);
   
}
ctx.strokeStyle='#000000';
ctx.moveTo(200,200);
ctx.lineTo(400,200);
ctx.stroke();
ctx.moveTo(200,200);
ctx.lineTo(200,0);
ctx.stroke();
ctx.font = "10px Arial";
ctx.fillStyle='#000000';
ctx.globalAlpha = 1;
ctx.fillText("Adoption(%)",340,190);
ctx.fillText("Depth(%)",210,20);

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
ctx.globalAlpha = 0.5;
ctx.fillStyle = '#97BBCD';
      ctx.fill();
ctx.strokeStyle='#97BBCD';
  ctx.stroke();
}

function drawEllipseByCenter2(ctx, cx, cy, w, h) {
  drawEllipse2(ctx, cx - w/2.0, cy - h/2.0, w, h);
}

function drawEllipse2(ctx, x, y, w, h) {
  

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
ctx.globalAlpha = 0.5;

ctx.strokeStyle='#999999';
  ctx.stroke();
}








</script>





@stop



			


@section('page-wrapper')

	<div id="page-wrapper">



            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Dashboard</h1>
	<h1>Global BIM Dashboard website </h1>
		<h2>visualizes the status of BIM adoption and implementation of each country in the world. enrolls and searches the statistical data of and the best case of BIM projects.</h2>
                <h2><br /></h2>
		</div>
                <!-- /.col-lg-12 -->
            </div>


<div class="row">
	

	
	<div class="col-lg-4 col-md-12">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            World slim BIM Diamond Model
                        </div>
                       
                        <div class="panel-body">
       
 			<canvas id="canvas" width="400px" height="300px"></canvas>
								
                       </div>
                        
                    </div>
	</div>

	<div class="col-lg-4 col-md-12">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            World slim BIM Triangle Model
                        </div>
                       
                        <div class="panel-body">
       
 			<canvas id="triangle" width="400px" height="300px"></canvas>
								
                       </div>
                        
                    </div>
	</div>

<div class="col-lg-4 col-md-12">
	<div class="panel panel-primary">
		<div class="panel-heading">World slim BIM Rugby Model</div>
		<div class="panel-body"><canvas height="400px" id="rugby" width="400px"></canvas></div>
	</div>
</div>
<div class="col-lg-8 col-md-12">
	<a href="{{ URL::to('slim/about') }}" class="btn">Do you want to know what's slim BIM?</a>
</div>



</div>
<div class="row">



	
	<div class="col-lg-7 col-md-12">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            World Average slim BIM Indices
                        </div>
                       
                        <div class="panel-body">
           
						     <div id="temps_div" class="chart"></div>
@columnchart('Temps', 'temps_div')
                               
                       </div>
                        
                    </div>
	</div>
	



	<div class="col-lg-5 col-md-12">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            BIM Organizations
                        </div>
                       
                        <div class="panel-body">
           
						       <div id="chart-div" class="chart"></div>
							@piechart('IMDB', 'chart-div')
      
                               
                       </div>
                        
                    </div>
	</div>











	


</div>

<!--

<div class="row">
	

	
	<div class="col-lg-6 col-md-12">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            BIM Keyword Trend - Building information modeling
                        </div>
                       
                        <div class="panel-body">
<div class="embed-responsive embed-responsive-4by3">

                               			<script type="text/javascript" src="//www.google.com/trends/embed.js?hl=en-US&q=/m/0b9qp4&tz&content=1&cid=TIMESERIES_GRAPH_0&export=5&w=500&h=330"></script>                       </div>
                        
</div>
                    </div>
	</div>
	
	<div class="col-lg-6 col-md-12">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            BIM Keyword Trends - BIM
                        </div>
                       
                        <div class="panel-body">


                               <div class="embed-responsive embed-responsive-4by3">
									<iframe class="embed-responsive-item" src="http://www.google.com/trends/fetchComponent?q=BIM&cid=TIMESERIES_GRAPH_0&export=5"></iframe>
								</div>
                       </div>
                        
                    </div>
	</div>
	
	


</div>

<div class="row">



	<div class="col-lg-6 col-md-12">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            Top regions for Building information modeling
                        </div>
                       
                        <div class="panel-body">

                               <div class="embed-responsive embed-responsive-4by3">
<script type="text/javascript" src="//www.google.com/trends/embed.js?hl=en-US&q=/m/0b9qp4&tz&content=1&cid=GEO_TABLE_0_0&export=5&w=500&h=330"></script>
</div>

                       </div>
                        
                    </div>
	</div>



	<div class="col-lg-6 col-md-12">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            Top searches for Building information modeling
                        </div>
                       
                        <div class="panel-body">

                               <div class="embed-responsive embed-responsive-4by3">
<script type="text/javascript" src="//www.google.com/trends/embed.js?hl=en-US&q=/m/0b9qp4&tz&content=1&cid=TOP_QUERIES_0_0&export=5&w=300&h=420"></script>
</div>

                       </div>
                        
                    </div>
	</div>

</div>

-->



            <div class="row">
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-database fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">{{ $data['number_of_answers'] }}</div>
                                    <div>slim BIM Records!</div>
                                </div>
                            </div>
                        </div>
                        <a href="{{ URL::to('slim/map/world') }}">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-green">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-building fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">{{ $data['number_of_organizations'] }}</div>
                                    <div>Registered BIM Organizations!</div>
                                </div>
                            </div>
                        </div>
                        <a href="{{ URL::route('organizations.index') }}">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-yellow">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-file fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">{{ $data['number_of_guides'] }}</div>
                                    <div>BIM Guides!</div>
                                </div>
                            </div>
                        </div>
                        <a href="{{ URL::route('guides.index') }}">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-red">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-file fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">{{ $data['number_of_reports'] }}</div>
                                    <div>BIM Case Reports!</div>
                                </div>
                            </div>
                        </div>
                        <a href="{{ URL::route('reports.index') }}">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            <!-- /.row -->
       </div>
        <!-- /#page-wrapper -->





@stop

