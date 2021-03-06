@extends('layouts.NewDashboardLayout')

@section('dashboard')
    <header class="bg-primary">
        <div class="header-content" style="color:black">
            <!--<div class="header-content-inner">-->
			<div class="container" >
                <h1>Tracking Global BIM Trends</h1>
                <hr>
                <h2>View maps, rankings. Find projects.</h2>
				<p></p>
                <a href="#map" class="btn btn-default btn-xl page-scroll">Find Out More</a>
            </div>
        </div>
    </header>

	<section  id="map">
		<div class="container">
			<div class="row">
				<div class="text-center">
					<h1 class="section-heading">Global BIM Adoption & Implementation Status</h1>
					<hr class="light">

					<div class="btn-group btn-group-justified" role="group" aria-label="...">
						<div class="btn-group" role="group">
							<button type="button" class="btn btn-default">By # of projects</button>
						</div>
						<div class="btn-group" role="group">
							<button type="button" class="btn btn-default"># of users</button>
						</div>
						<div class="btn-group" role="group">
							<button type="button" class="btn btn-default">slim BIM D-value</button>
						</div>
						<div class="btn-group" role="group">
							<button type="button" class="btn btn-default">B-value</button>
						</div>
						<div class="btn-group" role="group">
							<button type="button" class="btn btn-default">T-value</button>
						</div>
					</div>

					
					<img src="img/blue_map.jpg" width=100%>
					<p></p>
					<h4 class="section-heading">2013 | 2014 | <ins>2015</ins> </h4>
					<hr class="light">
					<h4 class="section-heading">Click a region to view the status in slim BIM charts</h4>
					<hr class="light">
					<a href="{{URL::to('slimbim')}}" class="btn btn-primary btn-xl">What is slim BIM?</a>
					<a href="{{URL::to('slimbimsurvey')}}" class="btn btn-primary btn-xl">Join our slim BIM survey</a>
				</div>
			</div>
		</div>
	</section>

	<section class="bg-primary" id="rank">
        	<div class="container">
			<div class="row">
				<div class="col-lg-12 text-center">
					<h1 class="section-heading">BIM Ranks</h1>
					<hr class="primary">
					<!--
					<div class="btn-group" role="group" aria-label="...">
						<div class="btn-group" role="group">
							<button type="button" class="btn btn-default">By company</button>
						</div>
						<div class="btn-group" role="group">
							<button type="button" class="btn btn-default">region</button>
						</div>
					</div>
					
					<div class="btn-group btn-group-justified" role="group" aria-label="...">
						<div class="btn-group" role="group">
							<button type="button" class="btn btn-default">gross floor area</button>
						</div>
						<div class="btn-group" role="group">
							<button type="button" class="btn btn-default"># of projects</button>
						</div>
						<div class="btn-group" role="group">
							<button type="button" class="btn btn-default">contract cost</button>
						</div>
						<div class="btn-group" role="group">
							<button type="button" class="btn btn-default">slim BIM D-value</button>
						</div>
						<div class="btn-group" role="group">
							<button type="button" class="btn btn-default">B-value</button>
						</div>
						<div class="btn-group" role="group">
							<button type="button" class="btn btn-default">T-value</button>
						</div>
					</div>
					-->
					<h4 class="section-heading">By <ins>company</ins> | region </h4>
					<h4 class="section-heading">By <ins>gross floor area</ins> | # of projects | contract cost | slim BIM D-value | B-value | T-value </h4>
				</div>
			</div>
		</div>
        <div class="container">
            <div class="row">
                <div class="col-lg-2 col-md-6 text-center">
                    <div class="service-box">
                        <i class="fa fa-4x wow bounceIn" style="color:#f05f40">1</i>
                        <h3>GS Construction</h3>
                        <p class="text-muted">South Korea</p>
                    </div>
                </div>
                <div class="col-lg-2 col-md-6 text-center">
                    <div class="service-box">
                        <i class="fa fa-4x wow bounceIn" style="color:#f05f40">2</i>
                        <h3>Samsung C&T</h3>
                        <p class="text-muted">South Korea</p>
                    </div>
                </div>
                <div class="col-lg-2 col-md-6 text-center">
                    <div class="service-box">
                        <i class="fa fa-4x wow bounceIn" style="color:#f05f40">3</i>
                        <h3>Skanska</h3>
                        <p class="text-muted">Finland</p>
                    </div>
                </div>
                <div class="col-lg-2 col-md-6 text-center">
                    <div class="service-box">
                        <i class="fa fa-4x wow bounceIn" style="color:#f05f40">4</i>
                        <h3>Kumho Construction</h3>
                        <p class="text-muted">South Korea</p>
                    </div>
                </div>
                <div class="col-lg-2 col-md-6 text-center">
                    <div class="service-box">
                        <i class="fa fa-4x wow bounceIn text-primary" style="color:#f05f40">5</i>
                        <h3>Hoban Construction</h3>
                        <p class="text-muted">South Korea</p>
                    </div>
                </div>
            </div>
        </div>

		<aside class="bg-dark">
			<div class="container text-center">
				<div class="call-to-action">
					<h2>Be part of the growing BIM project database.</h2>
					<a href="BIMprojectForm.html" class="btn btn-default btn-xl wow tada">Add your projects</a>
				</div>
			</div>
		</aside>
	</section>
		
		
    <section id="finder">
        <div class="container-fluid text-center">
			<h2>Project Finder</h2>
			<hr>
			<h3>Recently Added Projects</h3>
			<hr class="light">
			<div class="container">
				<div class="row">
					<div align="center">			
						<a href="#"><img src="img/projects/p1.png" class="img-responsive" alt="Cinque Terre" width="500px"></a><br>
					</div>
					<div class="col-lg-8 col-lg-offset-2 text-center">
						<h4>The Bridge Academy</h4>
						<h5>The Bridge Academy is a coeducational secondary school and sixth form with academy status, located in the Haggerston area of the London Borough of Hackney in England.<a href="BIMproject.html">&nbspmore> </a>
						</h5>
						<br>
					</div>
				</div>
			</div>
			<div class="container">
				<div class="row">
				<div align="center">
					<a href="#"><img src="img/projects/p3.png" class="img-responsive" alt="Cinque Terre" width="500px"></a>
				</div>
				<div class="col-lg-8 col-lg-offset-2 text-center">
					<h4>UCSF Hospital at Mission Bay
					</h4>
					<h5>Integrated Project Delivery Case Study.&nbsp<a href="#">more></a>
					</h5>
				</div>
				</div>
			</div>
			<hr>
			<p>Register to search full project database.<a href="search.html" class="btn btn-primary btn-xl">Search</a></p>
			<br><br>
		</div>
		
		<aside class="bg-dark">
			<div class="container text-center">
				<div class="call-to-action">
					<p>Be part of the growing BIM project database. <a href="BIMprojectForm.html" class="btn btn-primary btn-xl wow tada">Share your projects</a></p>
				</div>
			</div>
		</aside>
    </section>
	
	<section class="bg-primary" id="login">
		<div class="container">
			<div class="row">
				<div class="col-md-3"></div>
				<div class="col-md-6 text-center">
					<h2 class="section-heading">Log in</h2>
					<br>
					@if (Session::has('message'))
		    			<div class="alert alert-info">{{ Session::get('message') }}</div>
					@endif
					{{ Form::open(['route'=>'sessions.store'])  }}
						<div class="form-group">
							{{ Form::email('email',Input::old('email'),array('class'=>'form-control', 'placeholder'=>'E-mail')) }}
						</div>
						<div class="form-group">
                     						<input class="form-control" placeholder="Password" name="password" type="password" value="">
						</div>
					{{ Form::submit('Sign In',array('class'=>'btn btn-default btn-block')) }}
					<a href="{{ URL::route('users.create') }}" class="btn btn-default btn-block">Not a member yet? Register now</a>
					{{ Form::close() }}
				</div>
		            </div>
		</div>
    </section>
	
	<section id="partners">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 col-lg-offset-2 text-center">
					<h2 class="section-heading">Global BIM Research Consortium</h2>
					<hr class="light">
					<p>Ready to join and contribute to the global BIM dashboard website? <br> That's great! Send us an email to Professor Ghang Lee at <a href="mailto:glee@yonsei.ac.kr">glee@yonsei.ac.kr</a> <br>and we will get back to you as soon as possible!</p>
					
					<!--<div class="col-lg-4 text-center">
					<i class="fa fa-envelope-o fa-3x wow bounceIn" data-wow-delay=".1s"></i><a href="mailto:glee@yonsei.ac.kr">Ghang Lee</a>
					</div>-->		
					<p><a href="http://big.yonsei.ac.kr"><img src="img/BIG_logo.png"></a></p>
				</div>
			</div>
			<br>
			<br>
			<div class="row">
				<div class="col-lg-8 col-lg-offset-2 text-center">
					<h2 class="section-heading">Sponsors</h2>
					<hr class="light">
					<p>This website is supported by a grant (15-AUDP-C067817-03) from the  Architecture & Urban Development Research Program funded by the Ministry of Land, Infrastructure and Transport of the Korean government.</p>
					<p><a href="http://english.molit.go.kr/intro.do"><img src="img/MoLIT_en_logo.png"></a></p>
				</div>
			</div>
		</div>
	</section>
@stop