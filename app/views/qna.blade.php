@extends('layouts.sb-admin-2')

@section('title')
Blank | Global BIM Dashboard
@stop

@section('script-front')
    <!-- Bootstrap Core CSS -->
    <link href="bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="bower_components/startbootstrap-sb-admin-2/dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">



@stop


@section('script-rear')
    <!-- jQuery -->
    <script src="bower_components/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="bower_components/metisMenu/dist/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="bower_components/startbootstrap-sb-admin-2/dist/js/sb-admin-2.js"></script>


@stop


@section('page-wrapper')

 <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Q & A</h1>
                </div>
     </div>
     <div class="row">
     <div class="col-lg-8">
        	<div class="panel panel-default">
                        <!-- /.panel-heading -->
                  <div class="panel-heading">
                            검색어 순위
                        </div>
	
			<div class="panel-body">
				<h2>검색어 순위</h2>
                기간 : <input type="text" name="fname"> - <input type="text" name="fname"><button type="submit" form="form1" value="Submit">Search</button>
                        </div>
			<!-- /.panel-body -->

                      
                    </div>
                    <!-- /.panel -->
         </div>
      <div class="col-lg-4">
                 	<div class="panel panel-default">
                        <!-- /.panel-heading -->
                  <div class="panel-heading">
                            Q & A 질문 코너
                        </div>
	
			<div class="panel-body">
				<h2>Q & A 질문 코너</h2>
                        </div>
			<!-- /.panel-body -->

                      
                    </div>
                    <!-- /.panel -->
         </div>
     
     
     </div>

                 
</div>


@stop

