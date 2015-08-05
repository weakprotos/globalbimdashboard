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






@stop


@section('page-wrapper')

<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
		    <h1 class="page-header">slim BIM Data Map</h1>
		</div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
		<div class="col-lg-6">
  <div class="panel panel-default">
                        <div class="panel-heading">
                            <b>number of slim BIM records stored by Country</b>
							
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">



					<div id="pop-div" style="width: 100%"></div>

					@geochart('Popularity', 'pop-div')
					
			 </div>
                        <!-- /.panel-body -->
                    </div>
		    <!-- /.panel -->
		</div>
		<!--/.col-lg-6 -->
		
		<div class="col-lg-6">
  <div class="panel panel-default">
                        <div class="panel-heading">
                            <b>slim BIM Diamond Index by Country</b>
							
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">



					<div id="diamond-div" style="width: 100%"></div>

					@geochart('Diamond', 'diamond-div')
					
			 </div>
                        <!-- /.panel-body -->
                    </div>
		    <!-- /.panel -->
		</div>
		<!--/.col-lg-6 -->
</div>
<div class="row">
		
		<div class="col-lg-6">
  <div class="panel panel-default">
                        <div class="panel-heading">
                            <b>slim BIM Triangle Index by Country</b>
						<!--	Created at {{ date('m/d/Y H:i:s', time()) }} -->
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">



					<div id="tri-div" style="width: 100%"></div>

					@geochart('Triangle', 'tri-div')
					
			 </div>
                        <!-- /.panel-body -->
                    </div>
		    <!-- /.panel -->
		</div>
		<!--/.col-lg-6 -->
		
		<div class="col-lg-6">
  <div class="panel panel-default">
                        <div class="panel-heading">
                            <b>slim BIM Rugby Index by Country</b>
						<!--	Created at {{ date('m/d/Y H:i:s', time()) }} -->
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">



					<div id="rugby-div" style="width: 100%"></div>

					@geochart('Rugby', 'rugby-div')
					
			 </div>
                        <!-- /.panel-body -->
                    </div>
		    <!-- /.panel -->
		</div>
		<!--/.col-lg-6 -->
			
		</div>
	</div>
	<!-- row-->	


@stop

