@extends('layouts.sb-admin-2')

@section('title')
Reports | Global BIM Dashboard
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

					<h1 class="page-header">BIM Survey Reports</h1>
					
					<p> <a href="{{ URL::route('reports.create')  }}" type="button" class="btn btn-outline btn-primary btn-lg btn-block">Add Your BIM Report</a></p>
                </div>
                <!-- /.col-lg-12 -->
            </div>
			<div class="row">
                <div class="col-lg-12">
				{{Form::open(array('route'=>'reports.search'))}}
				<div class="input-group">
					{{Form::text('search',Input::old('search'),array('class'=>'form-control'))}}<span class="input-group-addon">{{ Form::submit('Search')}}</span>
				</div>
				
                            <!-- /input-group -->
				{{Form::close()}}
				
				</div>
                <!-- /.col-lg-12 -->
            </div>



@foreach(array_chunk($reports->all(),2) as $row)
<div class="row">
@foreach($row as $value)
<div class="col-lg-6 col-md-12">

			<div class="panel panel-success">
			<div class="panel-heading">

                        	{{$value->name}}

 			</div>
			<div class="panel-body">
				{{ $value->introduction }}

			</div>
			<div class="panel-footer">
				URL: <a href="{{ URL::to($value->url) }}">{{ $value->url }}</a>
			</div>
		
		</div>

</div>
@endforeach
</div>
@endforeach

{{ $reports->appends(Request::only('search'))->links() }}
</div>
</div>
</div>
@stop

