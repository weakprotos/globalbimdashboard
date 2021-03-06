@extends('layouts.sb-admin-2')

@section('title')
Tables | Global BIM Dashboard
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
		    <h1 class="page-header">Participate In SLIM BIM Model</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
			
			
			
			   <div class="row">
		<div class="col-lg-12">
		
		{{Form::open(array('url' => 'answers/selected')) }}
		
		<div class="form-group">
		{{ Form::select('language',array(''=>'Select Language', 'spanish'=>'Español','french'=>'Français','russian'=>'????кий','english'=>'English','chinese'=>'�?��', 'arabic'=>'ا?عرب?ة'),Input::old('language'),array('class'=>'form-control')) }}
		</div>
		
		
		{{ Form::submit('Select Language',array('class'=>'btn btn-outline btn-primary btn-lg btn-block')) }}

	{{ Form::close() }}
</div>

@stop

