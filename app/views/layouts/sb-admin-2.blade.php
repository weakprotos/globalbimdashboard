<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>@yield('title')</title>

@yield('script-front')	


    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->


<style>
@if(Auth::check()===false)
.confirmed1 {
 color: #848484;
}
.confirmed2 {
 color: #DF013A;
}
@elseif(Auth::user()->confirmed == 1) //로그인한 경우
.confirmed1 {
 color: #337ab7;
}
.confirmed2 {
 color: #DF013A;
}
@elseif(Auth::user()->confirmed == 2) //설문조사까지 참여한 경우
.confirmed1 {
 color: #337ab7;
}
.confirmed2 {
 color: #337ab7;
}
@endif 
</style>


</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
<a class="navbar-brand" href="{{ URL::to('dashboard') }}">Global BIM Dashboard</a>            
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>
		    </a>
		    <ul class="dropdown-menu dropdown-user">

@if(Auth::check()===false)

                        <li><a href="{{ URL::to('login') }}"><i class="fa fa-sign-in fa-fw"></i> Sign In</a>
                        </li>
						
@else			
			<li>Welcome, {{Auth::user()->username}}</li>
			<li><a href="{{ URL::to('logout') }}"><i class="fa fa-sign-in fa-fw"></i> Sign Out</a>
                        </li>
@endif

		    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                                               <li>
                            <a href="{{ URL::to('dashboard') }}"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
			</li>
			

			<li>
                            <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i> slim BIM Models<span class="fa arrow"></span></a>
			
			<ul class="nav nav-second-level">


				<li>
                                    <a href="{{ URL::to('slim/about') }}"><i class="fa fa-question-circle fa-fw"></i> What are slim BIM Models?</a>
				</li>
                                <li>
                                    <a href="{{ URL::to('slim/map/world') }}" class="confirmed1"><i class="fa fa-globe fa-fw"></i> slim BIM Data Map</a>
								</li>
                                 <li>
                                     <a href="{{ URL::to('slim/model/world') }}" class="confirmed1"><i class="fa fa-bar-chart-o fa-fw"></i> Global BIM Adoption Status</a>
                               </li>
                                <li>
                                      <a href="{{ URL::to('slim/model/finder') }}" class="confirmed2"><i class="fa fa-search fa-fw"></i> Your slim BIM</a>
                                </li>
                                        
                                 

			
				

				 <li>
                                    <a href="{{ URL::to('languages/select') }}" class="confirmed1"><i class="fa fa-pencil fa-fw"></i> Join the slim BIM Survey</a>
                                </li> 
				
                            </ul>
                            <!-- /.nav-second-level -->

			</li>

			




			<li>
                            <a href="#"><i class="fa fa-search fa-fw"></i> BIM Project Finder<span class="fa arrow"></span></a>
			
			<ul class="nav nav-second-level">

 				 <li>
                                    <a href="{{ URL::to('casestudies') }}"><i class="fa fa-file fa-fw"></i> BIM Case Studies</a>
							</li>



                                <li>
                                    <a href="{{ URL::to('finder') }}"><i class="fa fa-search fa-fw"></i> BIM Project Finder</a>
							</li>


				 <li>
                                    <a href="{{ URL::to('#') }}"><i class="fa fa-pencil fa-fw"></i> Upload Your Project</a>
                                </li> 
				
                            </ul>
                          

			</li>
			
		





			<li>
                            <a href="#" class="confirmed1"><i class="fa fa-file fa-fw"></i> BIM References<span class="fa arrow"></span></a>
			
			<ul class="nav nav-second-level">
                                <li>
                                    <a href="{{ URL::route('reports.index') }}" class="confirmed1"><i class="fa fa-file fa-fw"></i> BIM Survey Reports</a>
							</li>


				 <li>
                                    <a href="{{ URL::route('organizations.index') }}" class="confirmed1"><i class="fa fa-group fa-fw"></i> BIM Organizations</a>
                                </li> 
				<li>
                                    <a href="{{ URL::route('guides.index') }}" class="confirmed1"><i class="fa fa-file fa-fw"></i> BIM Guides</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->

			</li>
			 <li>
                          		<a href="{{ URL::to('qna') }}"><i class="fa fa-question fa-fw"></i> Q&A</a>
                 	</li> 

                        <li>
                            <a href="{{ URL::to('about-us') }}"><i class="fa fa-smile-o fa-fw"></i> About Us</a>
                        </li> 
<!-- 
 
                        <li>
                            <a href="#"><i class="fa fa-wrench fa-fw"></i> UI Elements<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="{{ URL::to('ui/panels-wells') }}">Panels and Wells</a>
                                </li>
                                <li>
                                    <a href="{{ URL::to('ui/buttons') }}">Buttons</a>
                                </li>
                                <li>
                                    <a href="{{ URL::to('ui/notifications') }}">Notifications</a>
                                </li>
                                <li>
                                    <a href="{{ URL::to('ui/typography') }}">Typography</a>
                                </li>
                                <li>
                                    <a href="{{ URL::to('ui/icons') }}"> Icons</a>
                                </li>
                                <li>
                                    <a href="{{ URL::to('ui/grid') }}">Grid</a>
                                </li>
                            </ul>
			</li>
-->
                  </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>

        <!-- Page Content yield below starts from  div id="page-wrapper"-->
        @yield('page-wrapper')

    </div>
    <!-- /#wrapper -->

@yield('script-rear')	

</body>

</html>

