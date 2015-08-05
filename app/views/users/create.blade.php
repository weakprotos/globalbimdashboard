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
            <div class="col-md-6 col-md-offset-3">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title"><b>Welcome To Global BIM Dashboard!</b><br /> Please Fill In Sign Up Form.</h3>
                    </div>
                    <div class="panel-body">

			@if (Session::has('message'))
 				  <div class="alert alert-info">{{ Session::get('message') }}</div>
			@endif
			 {{HTML::ul($errors->all()) }} 

			{{ Form::open(['route'=>'users.store'])  }}
				<div class="form-group">
					{{ Form::email('email',Input::old('email'),array('class'=>'form-control', 'placeholder'=>'E-mail')) }}

				</div>

				<div class="form-group">
					{{ Form::text('firstname',Input::old('firstname'),array('class'=>'form-control', 'placeholder'=>'First Name')) }}
				</div>


				<div class="form-group">
					{{ Form::text('lastname',Input::old('lastname'),array('class'=>'form-control', 'placeholder'=>'Last Name')) }}
				</div>


				<div class="form-group">
                                    			<input class="form-control" placeholder="Password" name="password" type="password" value="">
                              		 </div>

				<div class="form-group">
                                    			<input class="form-control" placeholder="Password" name="password2" type="password" value="">
                              		 </div>
				
				<div class="form-group">
					What is your country? <br />
					{{ Form::select('country', $codes ,array('class'=>'form-control')) }}
				</div>

				<div class="form-group">
					{{ Form::text('organization',Input::old('organization'),array('class'=>'form-control', 'placeholder'=>'What organization do you belong to&#63;')) }}
				</div>


				<div class="form-group">
					{{ Form::text('position',Input::old('position'),array('class'=>'form-control', 'placeholder'=>'What position are you in your organization&#63;')) }}
				</div>



				<div class="form-group">
			
				
				{{ Form::select('company',array(''=>'Which one of the following best describes your company?', '1'=>'Architectural Firm (Buildings)','2'=>'Architectural Firm (Landscape)','3'=>'Architectural Firm (Others)','4'=>'Engineering Firm (Building Services Engineer)','5'=>'Engineering Firm (Structural Engineer)','6'=>'Engineering Firm (Civil, Environmental, Geo-Tech Engineer)','7'=>'Engineering Firm (Others)','8'=>'General or Main Contractor','9'=>'Subcontractor (Mechanical/Sheet Metal/ Plumbing)','10'=>'Subcontractor (Electrical)','11'=>'Subcontractor (Steel)','12'=>'Subcontractor (Concrete)','13'=>'Subcontractor (Civil, Site, Geo-Tech)','14'=>'Quantity Surveyor','15'=>'Owner','16'=>'Planning Firm','17'=>'Building Product Manufacturer/Distributor','18'=>'Other'),array('class'=>'form-control'))}}
			

				</div>


				{{ Form::submit('Sign Up',array('class'=>'btn btn-outline btn-primary btn-block')) }}

			{{ Form::close() }}




                    </div>
                </div>
            </div>
        </div>
    </div>


@stop

