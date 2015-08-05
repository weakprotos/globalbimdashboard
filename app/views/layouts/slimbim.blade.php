<!DOCTYPE html>
<html>

<head>

	<meta charset="utf-8"/>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">

	<title>slim BIM chart</title>

@yield('script-front')

	<!-- Bootstrap Core CSS -->
	<link href="bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

	<!-- Custom Fonts -->
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
    
	<!-- Plugin CSS -->
    
	<!-- Custom CSS -->
	<link href="bower_components/bootstrap/dist/css/creative.css" rel="stylesheet">

<style>
	@if(Auth::check()===false)
		.confirmed1 {
		 color: #848484;
		}
		.confirmed2 {
		 color: #DF013A;
		}
	@elseif(Auth::user()->confirmed == 1) //로그?�한 경우
		.confirmed1 {
		 color: #337ab7;
		}
		.confirmed2 {
		 color: #DF013A;
		}
	@elseif(Auth::user()->confirmed == 2) //?�문조사까�? 참여??경우
		.confirmed1 {
		 color: #337ab7;
		}
		.confirmed2 {
		 color: #337ab7;
		}
	@endif 
</style>


</head>

<body id="page-top">

    <nav id="mainNav" class="navbar navbar-default navbar-fixed-top">
        <div class="container-fluid" >
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand page-scroll" href="{{URL::to("index")}}" style="color:gray">Global BIM Dashboard</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
					<li>
                        <a href="{{URL::to("slimbim#about")}}" style="color:gray">About slim BIM Charts</a>
                    </li>
					<li>
                        <a href="{{URL::to("slimbim#chart")}}" style="color:gray">Slim BIM Charts</a>
                    </li>
					<li>
                        <a href="{{URL::to("slimbim#survey")}}" style="color:gray">Slim BIM Survey</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>

@yield('slimbimchart')

	<!-- jQuery -->
	<script src="bower_components/jquery/dist/jquery.js"></script>

	<!-- Bootstrap Core JavaScript -->
	<script src="bower_components/bootstrap/js/bootstrap.min.js"></script>

	<!-- Plugin JavaScript -->
	<script src="bower_components/bootstrap/dist/js/jquery.fittext.js"></script>
	
	<!-- Custom Theme JavaScript -->
	<script src="bower_components/bootstrap/dist/js/creative.js"></script>

@yield('script-rear')

</body>
</html>
