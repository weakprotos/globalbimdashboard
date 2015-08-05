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
                    <h1 class="page-header">BIM Organizations</h1>
			<p> <a href="{{ URL::route('organizations.create')  }}" type="button" class="btn btn-outline btn-primary btn-lg btn-block">Add Your BIM Organization</a></p>
                </div>
                <!-- /.col-lg-12 -->
            </div>



@foreach(array_chunk($organizations->all(),4) as $row)
<div class="row">
@foreach($row as $value)


<div class="col-lg-3 col-md-6">
@if((int)$value->category === 1 )
			<div class="panel panel-success">
<div class="panel-heading">
University
@elseif((int)$value->category === 2 )
			<div class="panel panel-info">
<div class="panel-heading">
Research Center
@elseif((int)$value->category === 3 )
			<div class="panel panel-warning">
<div class="panel-heading">
Governmental Organization
@elseif((int)$value->category === 4 )
			<div class="panel panel-danger">
<div class="panel-heading">
Others
@else
			<div class="panel panel-danger">
<div class="panel-heading">
Others
@endif
                        

 			</div>
			<div class="panel-body">
				{{ HTML::image('uploads/'.$value->image_name, $value->name, array('class' => 'thumb','width'=>70,'height'=>70)) }}<b>&nbsp;&nbsp;{{$value->name}}</b><br />
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

{{ $organizations->links() }}
</div>
</div>
</div>
@stop

