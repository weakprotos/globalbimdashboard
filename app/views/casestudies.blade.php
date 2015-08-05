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

<style>
#haha {
    float: leftt;
    width: 1100px;
padding-left:800px;

}
.top-buffer { margin-top:20px; }
</style>



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
                    <h1 class="page-header">BIM Project Finder</h1>
                </div>
     </div>

            <div class="row">
                <div class="col-lg-12">
	<h1>BIM Case Studies</h1>
				
				<div class="input-group">
<div id="haha">
					{{Form::text('search',Input::old('search'))}}<a href="{{URL::to('finder')}}"><button type="button">Search</button></a>
</div>
				</div>
				
                            <!-- /input-group -->
				
				
				</div>
                <!-- /.col-lg-12 -->
            </div>
        
  <div class="row top-buffer">
        <div class="col-lg-2">
            <a href="#"><img src="../images/p1.png" class="img-responsive" alt="Cinque Terre"></a>
      </div>
<div class="col-lg-5">
<h2>The Bridge Academy</h2>
<p>The Bridge Academy is a coeducational secondary school and sixth form with academy status, located in the Haggerston area of the London Borough of Hackney in England.<a href="#">more> </a>
</p>
</div>

</div>
  <div class="row top-buffer">
        <div class="col-lg-2">
            <a href="#"><img src="../images/p2.png" class="img-responsive" alt="Cinque Terre"></a>
      </div>
<div class="col-lg-5">
<h2>Palace Exchange Shopping Centrez
</h2>
<p>Outdoor shopping mall with a supermarket and cafe, high-street fashions, shoe and phone shops. <a href="#">more></a>
</p>
</div></div>
  <div class="row top-buffer">
        <div class="col-lg-2">
            <a href="#"><img src="../images/p3.png" class="img-responsive" alt="Cinque Terre"></a>
      </div>
<div class="col-lg-5">
<h2>UCSF Hospital at Mission Bay
</h2>
<p>Integrated Project Delivery Case Study. <a href="#">more></a>
</p>
</div></div>
  <div class="row top-buffer">
        <div class="col-lg-2">
            <a href="#"><img src="../images/p4.png" class="img-responsive" alt="Cinque Terre"></a>
      </div>
<div class="col-lg-5">
<h2>Kaiser Permanente Anaheim's Replacement Hospital 
</h2>
<p>"Time to draw the CMU bracing=1 hour Time to incorporate it into the Synchro Model=5 minutes Time to find the conflicts=30 seconds Time and headaches saved out in the field=Priceless!“ <a href="#">more></a> 
</p>
</div></div>
  <div class="row top-buffer">
        <div class="col-lg-2">
            <a href="#"><img src="../images/p5.png" class="img-responsive" alt="Cinque Terre"></a>
      </div>
<div class="col-lg-5">
<h2>Vennesla Library and Cultural Center
</h2>
<p>The design work was carried out between 2009 and 2011, using ArchiCAD versions 13 and 14. Solheim notes that the designers were able to leverage most of the features of ArchiCAD in their work. “Everything was modelled in a 3D environment on a large scale, and we also created a BIM model that we provided to the design team. <a href="#">more></a>
</p>
</div></div>
  <div class="row top-buffer">
        <div class="col-lg-2">
            <a href="#"><img src="../images/p6.png" class="img-responsive" alt="Cinque Terre"></a>
      </div>
<div class="col-lg-5">
<h2>St. Helens and Knowsley Hospitals
</h2>
<p>The use of a true interoperable and integrated application of BIM forms part of the VCUK development strategy. However, at this stage a full integrated 3D model was still state of the art for some of their projects. The benefit of the.. <a href="#">more></a>
</p>
</div></div>
     
</div>


@stop

