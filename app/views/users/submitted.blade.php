@extends('layouts.sb-no-nav')

@section('title')
Sign Up | Global BIM Dashboard
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

<?php header("Refresh: 3;url=http://globalbimdashboard.org/login"); ?>

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


<div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Submitted.</h3>
                    </div>
                    <div class="panel-body">

			@if (Session::has('message'))
		    	<div class="alert alert-info">{{ Session::get('message') }}</div>
		    @endif





                    </div>
                </div>
            </div>
        </div>
    </div>


@stop

