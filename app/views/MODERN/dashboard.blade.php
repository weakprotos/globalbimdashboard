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
  <!-- Header Carousel -->
    <header id="myCarousel" class="carousel slide">
        <!-- Indicators -->
        <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#myCarousel" data-slide-to="1"></li>
            <li data-target="#myCarousel" data-slide-to="2"></li>
        </ol>

        <!-- Wrapper for slides -->
        <div class="carousel-inner">
            <div class="item active">
                <div class="fill" style="background-image:url('images/img/map1.JPG');"></div>
          
		<div class="carousel-caption">
                    <h2 style="color:black">Number of slim BIM records</h2>
                </div>
            </div>
            <div class="item">
               <div class="fill" style="background-image:url(images/img/map2.JPG);"></div>
                <div class="carousel-caption">
                    <h2 style="color:black">slim BIM Diamond Index</h2>
                </div>
            </div>
            <div class="item">
                <div class="fill" style="background-image:url(images/img/map3.JPG);"></div>
                <div class="carousel-caption">
                    <h2 style="color:black">slim BIM Triangle Index</h2>
                </div>
            </div>
        </div>

        <!-- Controls -->
        <a class="left carousel-control" href="#myCarousel" data-slide="prev">
            <span class="icon-prev"></span>
        </a>
        <a class="right carousel-control" href="#myCarousel" data-slide="next">
            <span class="icon-next"></span>
        </a>
    </header>

    <!-- Page Content -->
    <div class="container">

        <!-- Marketing Icons Section -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                    Welcome to Global BIM Dashboard
                </h1>
				
				
	        
            </div>
			<div class="col-lg-12">
			<button class="btn btn-default">open to public</button>
	      
	        <button class="btn btn-warning">members only</button>
	      
	        <button class="btn btn-danger">contributors only</button>
			
			</div>
	       
            <div class="col-md-4">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4><i class="fa fa-fw fa-check"></i> Recent Uploads</h4>
                    </div>
                    <div class="panel-body">
                        <p>- A project </p>
						<p>- B project</p>
						<p>- C project</p>
						<p>- D project</p>
                        <a href="recent.html" class="btn btn-default">See More</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4><i class="fa fa-fw fa-list-ul"></i> Rank</h4>
                    </div>
                    <div class="panel-body">
                        <p>-abc company</p>
						<p>-abc company</p>
						<p>-abc company</p>
						<p>-abc company</p>
                        <a href="rank.html" class="btn btn-warning">See More</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4><i class="fa fa-fw fa-compass"></i> New Bid</h4>
                    </div>
                    <div class="panel-body">
                         <p>- A' project </p>
						 <p>- B' project</p>
					  	 <p>- C' project</p>
						 <p>- D' project</p>
                        <a href="upload_bid.html" class="btn btn-danger">See More</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.row -->

   
    

        <!-- Call to Action Section -->
        <div class="well">
            <div class="row">
                <div class="col-md-8">
                    <p>Do you have any questions?</p>
                </div>
                <div class="col-md-4">
                    <a class="btn btn-lg btn-default btn-block" href="#">Send an email</a>
                </div>
            </div>
        </div>

        <hr>

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