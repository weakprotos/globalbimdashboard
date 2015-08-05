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
		    <h1 class="page-header">All the SLIM BIM data</h1>
		
		    @if (Session::has('message'))
		    	<div class="alert alert-info">{{ Session::get('message') }}</div>
		    @endif

                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
		<div class="col-lg-12">
			  <div class="panel panel-default">
                        <div class="panel-heading">
                            SLIM BIM DATA
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>#</th>
					    <th>Country</th>
						<th>Year</th>
                                            <th>Adoption</th>
					    <th>Years</th>
						<th>Depth</th>
						<th>Expertise</th>
						<th>Actions</th>
                                        </tr>
                                    </thead>
				    <tbody>
@foreach($slimtestvalues as $key => $value)
                                        <tr>
                                            	<td>{{ $value->id}}</td>
						<td>{{ $value->country}}</td>
						<td>{{ $value->year }}</td>
          					<td>{{ $value->adoption}}</td>
           					<td>{{ $value->years}}</td>
            					<td>{{ $value->depth}}</td>
             					<td>{{ $value->expertise}}</td>
						<td>



 {{ Form::open(array('url' => 'slimtestvalues/' . $value->id, 'class' => 'pull-right')) }}
                    {{ Form::hidden('_method', 'DELETE') }}
                    {{ Form::submit('Delete', array('class' => 'btn btn-warning')) }}
                {{ Form::close() }}




							<a class="btn btn-small btn-success" href="{{URL::to('slimtestvalues/'.$value->id)}}">Show</a>
							<a class="btn btn-small btn-info" href="{{URL::to('slimtestvalues/'.$value->id.'/edit')}">Edit</a>


						</td>
					</tr>                                                                                                                                          				   
@endforeach
				   </tbody>
                                </table>
                            </div>
                            <!-- /.table-responsive -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
		</div>
	</div>
</div>


@stop

