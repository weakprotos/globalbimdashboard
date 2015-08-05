@extends('layouts.sb-admin-2')

@section('title')
Create | Global BIM Dashboard
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
		    <h1 class="page-header">The Level of BIM Adoption and Uses</h1>
		
		                  </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
		<div class="col-lg-12">

 {{HTML::ul($errors->all()) }} 


{{Form::open(array('route'=>'answers.store')) }}


<div class="form-group">
{{ Form::label('country','Q1. In which country do you work?')}}
<div class="input-group">
{{ Form::select('country', $codes ,array('class'=>'form-control')) }}
</div>
</div>



<div class="form-group">
	{{ Form::label('years','Q2. How long have you been using BIM?') }}
	<div class="input-group">
		{{ Form::number('years',Input::old('years'),array('class'=>'form-control'))}}<span class="input-group-addon">Years</span>
	</div>
</div>

<div class="form-group">
	{{ Form::label('depth_company','Q3. When, approximately, did your country(where you work) start using BIM?') }}
	<div class="input-group">
		{{ Form::number('depth_company',Input::old('depth_company'),array('class'=>'form-control'))}}<span class="input-group-addon"></span>
	</div>
</div>



<div class="form-group">
	{{ Form::label('','') }}
	<div class="input-group">
		{{ Form::number('',Input::old(''),array('class'=>'form-control'))}}<span class="input-group-addon"></span>
	</div>
</div>


{{ Form::submit('Submit the Survey!',array('class'=>'btn btn-primary')) }}

{{ Form::close() }}




@stop

