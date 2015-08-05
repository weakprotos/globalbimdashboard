@extends('layouts.sb-admin-2')

@section('title')
Organizations | Global BIM Dashboard
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
                    <h1 class="page-header">BIM Guides</h1>
			<p> <a href="{{ URL::route('guides.create')  }}" type="button" class="btn btn-outline btn-primary btn-lg btn-block">Add Your BIM Guide</a></p>
                </div>
                <!-- /.col-lg-12 -->
            </div>



@foreach(array_chunk($guides->all(),2) as $row)
<div class="row">
@foreach($row as $value)
<div class="col-lg-6 col-md-12">

			<div class="panel panel-warning">
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

{{ $guides->links() }}
</div>
</div>
</div>
@stop

