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
		    <h1 class="page-header">SLIM BIM Model Survey</h1>
		
		                  </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
		<div class="col-lg-12">

 {{HTML::ul($errors->all()) }} 


{{Form::open(array('route'=>'slimtestvalues.store')) }}


<div class="form-group">
{{ Form::label('country','Country')}}
<div class="input-group">
{{ Form::select('country', $codes ,array('class'=>'form-control')) }}
</div>
</div>
<div class="form-group">
{{ Form::label('year','Year') }}
<div class="input-group">
	{{ Form::select('year',array('2009'=>'2009','2010'=>'2010','2012'=>'2012','2013'=>'2013'),Input::old('year'),array('class'=>'form-control')) }}
</div>
</div>




<div class="form-group">
	{{ Form::label('adoption','Adoption') }}
	<div class="input-group">
		{{ Form::number('adoption',Input::old('adoption'),array('class'=>'form-control'))}}<span class="input-group-addon">%</span>
	</div>
</div>
<div class="form-group">
	{{ Form::label('years','Years') }}
<div class="input-group">
	{{ Form::number('years',Input::old('years'),array('class'=>'form-control')) }}<span class="input-group-addon">%</span>
</div></div>
<div class="form-group">
	{{ Form::label('depth','Depth') }}
<div class="input-group">
	{{ Form::number('depth',Input::old('depth'),array('class'=>'form-control')) }}<span class="input-group-addon">%</span>
</div></div>
<div class="form-group">
	{{ Form::label('expertise','Expertise') }}
<div class="input-group">
	{{ Form::number('expertise',Input::old('expertise'),array('class'=>'form-control')) }}<span class="input-group-addon">%</span>
</div></div>


{{ Form::submit('Submit the Survey!',array('class'=>'btn btn-primary')) }}

{{ Form::close() }}




@stop

