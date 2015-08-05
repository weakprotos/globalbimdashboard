@extends('layouts.slimbim')

@section('script-front')

@stop

@section('script-rear')
    <!-- jQuery -->
    <script src="../bower_components/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../bower_components/metisMenu/dist/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../bower_components/startbootstrap-sb-admin-2/dist/js/sb-admin-2.js"></script>@stop

@section('slimbimchart')
	<section id="survey">
		<div class="container">
			<div class="row">
				<div class="col-lg-12 text-center">
					<h1 class="section-heading">slim BIM Survey</h1>
					<hr class="primary">
					<h4 class="section-heading">Choose a language.</h4>
					{{Form::open(array('url' => 'slimbimsurvey/create')) }}
					<div class="form-group">
						{{ Form::select('language',array(''=>'Select Language', 'spanish'=>'Espanol','french'=>'Francais','russian'=>'русский','english'=>'English','chinese'=>'中文', 'arabic'=>'العربية','korean'=>'한국어'),Input::old('language'),array('class'=>'form-control')) }} 
					</div>
					{{ Form::submit('Select Language',array('class'=>'btn btn-primary btn-lg btn-block')) }}
				</div>
			</div>
        	</div>
	</section>	
@stop
