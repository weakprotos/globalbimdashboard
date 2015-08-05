@extends('layouts.modern')

@section('title')
Dashboard | Global BIM Dashboard
@stop

@section('css')
    <!-- Bootstrap Core CSS -->
    <link href="bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="bower_components/modern/modern-business.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
@stop

@section('content')
  

    <!-- Page Content -->
    <div class="container">

        <!-- Marketing Icons Section -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                    Maps
                </h1>
            </div>
        </div>
        <!-- /.row -->
	<div class="row">
		<div class="col-lg-12">
			<div id="pop-div"></div>
			@geochart('GeoMap', 'pop-div')
		</div>
	</div>
   
    


        <!-- Footer -->
        <footer>
            <div class="row">
                <div class="col-lg-12">
                    <p>Copyright &copy; Your Website 2014</p>
                </div>
            </div>
        </footer>

    </div>
@stop

@section('js')

	<!-- jQuery -->
    <script src="bower_components/jquery/dist/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Script to Activate the Carousel -->
    <script>
    $('.carousel').carousel({
        interval: 5000 //changes the speed
    })
    </script>
@stop