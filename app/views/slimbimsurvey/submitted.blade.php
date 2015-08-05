@extends('layouts.slimbim')

@section('script-front')
	<!-- Bootstrap Core CSS -->
	<link href="../bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

	<!-- Custom CSS -->
	
	<link href="bower_components/bootstrap/dist/css/creative.css" rel="stylesheet">

	<!-- Custom Fonts -->
	<link href="../bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
@stop


@section('script-rear')
    <!-- jQuery -->
    <script src="../bower_components/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../bower_components/metisMenu/dist/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->



@stop


@section('slimbimchart')
<br>
<br>
<br>
            <div class="row">
                <div class="col-lg-2"></div>
		<div class="col-lg-8">
		    @if (Session::has('message'))
		    	<div class="alert alert-info">{{ Session::get('message') }}</div>
		    @endif
		
			<a href="{{ URL::to("slimbim")}}" class="btn btn-default btn-block">Go back to slimbim</a>
                </div>
            </div>
            <!-- /.row -->

@stop

