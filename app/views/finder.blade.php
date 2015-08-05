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
<style id="대시보드에 들어갈 엑셀_28237_Styles">
<!--table
	{mso-displayed-decimal-separator:"\.";
	mso-displayed-thousand-separator:"\,";}
.font528237
	{color:windowtext;
	font-size:8.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:"맑은 고딕", monospace;
	mso-font-charset:129;}
.xl1528237
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:black;
	font-size:11.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:"맑은 고딕", monospace;
	mso-font-charset:129;
	mso-number-format:General;
	text-align:general;
	vertical-align:middle;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl6428237
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:#0070C0;
	font-size:10.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:"맑은 고딕", monospace;
	mso-font-charset:129;
	mso-number-format:General;
	text-align:center;
	vertical-align:middle;
	border-top:none;
	border-right:.5pt solid windowtext;
	border-bottom:.5pt solid windowtext;
	border-left:.5pt solid windowtext;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:normal;}
.xl6528237
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:black;
	font-size:10.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:"맑은 고딕", monospace;
	mso-font-charset:129;
	mso-number-format:General;
	text-align:center;
	vertical-align:middle;
	border-top:none;
	border-right:.5pt solid windowtext;
	border-bottom:.5pt solid windowtext;
	border-left:.5pt solid windowtext;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:normal;}
.xl6628237
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:#0070C0;
	font-size:10.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:"맑은 고딕", monospace;
	mso-font-charset:129;
	mso-number-format:General;
	text-align:center;
	vertical-align:middle;
	border:.5pt solid windowtext;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:normal;}
.xl6728237
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:black;
	font-size:10.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:"맑은 고딕", monospace;
	mso-font-charset:129;
	mso-number-format:General;
	text-align:center;
	vertical-align:middle;
	border:.5pt solid windowtext;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:normal;}
.xl6828237
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:#0070C0;
	font-size:10.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:굴림, monospace;
	mso-font-charset:129;
	mso-number-format:General;
	text-align:center;
	vertical-align:middle;
	border:.5pt solid windowtext;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:normal;}
.xl6928237
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:black;
	font-size:11.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:"맑은 고딕", monospace;
	mso-font-charset:129;
	mso-number-format:General;
	text-align:left;
	vertical-align:middle;
	background:#E7E6E6;
	mso-pattern:black none;
	white-space:normal;}
.xl7028237
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:black;
	font-size:11.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:"맑은 고딕", monospace;
	mso-font-charset:129;
	mso-number-format:General;
	text-align:general;
	vertical-align:middle;
	background:#FCE4D6;
	mso-pattern:black none;
	white-space:normal;}
.xl7128237
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:black;
	font-size:11.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:"맑은 고딕", monospace;
	mso-font-charset:129;
	mso-number-format:General;
	text-align:general;
	vertical-align:middle;
	background:#E2EFDA;
	mso-pattern:black none;
	white-space:normal;}
.xl7228237
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:black;
	font-size:10.0pt;
	font-weight:700;
	font-style:normal;
	text-decoration:none;
	font-family:"맑은 고딕", monospace;
	mso-font-charset:129;
	mso-number-format:General;
	text-align:center;
	vertical-align:middle;
	border-top:.5pt solid windowtext;
	border-right:.5pt solid windowtext;
	border-bottom:1.0pt solid windowtext;
	border-left:.5pt solid windowtext;
	background:#E7E6E6;
	mso-pattern:black none;
	white-space:normal;}
.xl7328237
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:black;
	font-size:10.0pt;
	font-weight:700;
	font-style:normal;
	text-decoration:none;
	font-family:"맑은 고딕", monospace;
	mso-font-charset:129;
	mso-number-format:General;
	text-align:center;
	vertical-align:middle;
	border-top:.5pt solid windowtext;
	border-right:.5pt solid windowtext;
	border-bottom:1.0pt solid windowtext;
	border-left:.5pt solid windowtext;
	background:#FCE4D6;
	mso-pattern:black none;
	white-space:normal;}
.xl7428237
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:black;
	font-size:10.0pt;
	font-weight:700;
	font-style:normal;
	text-decoration:none;
	font-family:"맑은 고딕", monospace;
	mso-font-charset:129;
	mso-number-format:General;
	text-align:center;
	vertical-align:middle;
	border-top:.5pt solid windowtext;
	border-right:.5pt solid windowtext;
	border-bottom:1.0pt solid windowtext;
	border-left:.5pt solid windowtext;
	background:#E2EFDA;
	mso-pattern:black none;
	white-space:normal;}
ruby
	{ruby-align:left;}
rt
	{color:windowtext;
	font-size:8.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:"맑은 고딕", monospace;
	mso-font-charset:129;
	mso-char-type:none;}
-->
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
				{{Form::open(array('route'=>'reports.search'))}}
				<div class="input-group">
					{{Form::text('search',Input::old('search'))}}{{ Form::submit('Search')}}
				</div>
				
                            <!-- /input-group -->
				{{Form::close()}}
				
				</div>
                <!-- /.col-lg-12 -->
            </div>
     <div class="row">
        <div class="col-lg-12">
            <div class="form-group">
					Country : {{ Form::select('country', $codes ,array('class'=>'form-control')) }}
                    {{Form::text('search',Input::old('search'))}}<button type="submit" form="form1" value="Submit">Search within results</button>
<br />
<a href="#">MEP</a>, 
<a href="#">4D BIM</a>, 
<a href="#">5D</a>, 
<a href="#">SOFTWARE</a>, 
<a href="#">HOSPITAL</a>, 
<a href="#">EDUCATION</a>, 
<a href="#">CONSTRUCTION MODEL</a>, 
<a href="#">COLLABORATION</a>, 
<a href="#">REDUCING COST</a>, 
<a href="#">PEOPLE</a>, 
<a href="#">GREEN</a>,  …
<a href="#">more</a>

                <br />
  <br />
  <br />
                <br />
                 <br />
                <a href="{{URL::to('compare')}}"><button type="submit" form="form1" value="Submit">Compare checked projects</button></a>
<br />
  <br />


				</div>
         </div>
     </div>
        
  <div class="row">
        <div class="col-lg-12">


<table border=0 cellpadding=0 cellspacing=0 width=1134 style='border-collapse:
 collapse;table-layout:fixed;width:855pt'>
 <col width=126 span=9 style='width:95pt'>
 <tr height=22 style='height:16.5pt'>
  <td colspan=7 height=22 class=xl6928237 width=882 style='height:16.5pt;
  width:665pt'>General</td>
  <td class=xl7028237 width=126 style='width:95pt'>Description</td>
  <td class=xl7128237 width=126 style='width:95pt'>Feature</td>
 </tr>
 <tr height=73 style='height:54.75pt'>
  <td height=73 class=xl7228237 width=126 style='height:54.75pt;width:95pt'>√</td>
  <td class=xl7228237 width=126 style='border-left:none;width:95pt'>Project
  Name</td>
  <td class=xl7228237 width=126 style='border-left:none;width:95pt'>BIM 적용여부
  (Y/N)</td>
  <td class=xl7228237 width=126 style='border-left:none;width:95pt'>공공/민간(Public/Private)</td>
  <td class=xl7228237 width=126 style='border-left:none;width:95pt'>국가(Nation)</td>
  <td class=xl7228237 width=126 style='border-left:none;width:95pt'>도시/주(City/State)</td>
  <td class=xl7228237 width=126 style='border-left:none;width:95pt'>건축행위유형(Construction
  Type/Project Nature)</td>
  <td class=xl7328237 width=126 style='border-left:none;width:95pt'>주용도(Primary
  Usage/Main Usage)</td>
  <td class=xl7428237 width=126 style='border-left:none;width:95pt'>기하학적
  도움여부(Geometrical support)(Y/N)</td>
 </tr>
 <tr height=36 style='height:27.0pt'>
  <td height=36 class=xl6428237 width=126 style='height:27.0pt;width:95pt'>　<input type="checkbox" name="vehicle" value="Bike"></td>

  <td class=xl6428237 width=126 style='border-left:none;width:95pt'>The Bridge
  Academy, Hackney</td>
  <td class=xl6428237 width=126 style='border-left:none;width:95pt'>Y</td>
  <td class=xl6428237 width=126 style='border-left:none;width:95pt'>Private</td>
  <td class=xl6428237 width=126 style='border-left:none;width:95pt'>U.K.</td>
  <td class=xl6428237 width=126 style='border-left:none;width:95pt'>London</td>
  <td class=xl6428237 width=126 style='border-left:none;width:95pt'>Construction</td>
  <td class=xl6428237 width=126 style='border-left:none;width:95pt'>Complex
  Facility</td>
  <td class=xl6528237 width=126 style='border-left:none;width:95pt'>Y</td>
 </tr>
 <tr height=22 style='height:16.5pt'>
  <td height=22 class=xl6628237 width=126 style='height:16.5pt;border-top:none;
  width:95pt'>　<input type="checkbox" name="vehicle" value="Bike"></td>
  <td class=xl6628237 width=126 style='border-top:none;border-left:none;
  width:95pt'>Oriel High School</td>
  <td class=xl6628237 width=126 style='border-top:none;border-left:none;
  width:95pt'>Y</td>
  <td class=xl6628237 width=126 style='border-top:none;border-left:none;
  width:95pt'>Public</td>
  <td class=xl6628237 width=126 style='border-top:none;border-left:none;
  width:95pt'>U.K.</td>
  <td class=xl6628237 width=126 style='border-top:none;border-left:none;
  width:95pt'>West Sussex</td>
  <td class=xl6628237 width=126 style='border-top:none;border-left:none;
  width:95pt'>Construction</td>
  <td class=xl6628237 width=126 style='border-top:none;border-left:none;
  width:95pt'>Complex Facility</td>
  <td class=xl6728237 width=126 style='border-top:none;border-left:none;
  width:95pt'>N</td>
 </tr>
 <tr height=22 style='height:16.5pt'>
  <td height=22 class=xl6628237 width=126 style='height:16.5pt;border-top:none;
  width:95pt'>　<input type="checkbox" name="vehicle" value="Bike"></td>
  <td class=xl6628237 width=126 style='border-top:none;border-left:none;
  width:95pt'>PalaceXchange</td>
  <td class=xl6628237 width=126 style='border-top:none;border-left:none;
  width:95pt'>Y</td>
  <td class=xl6628237 width=126 style='border-top:none;border-left:none;
  width:95pt'>Private</td>
  <td class=xl6628237 width=126 style='border-top:none;border-left:none;
  width:95pt'>U.K.</td>
  <td class=xl6628237 width=126 style='border-top:none;border-left:none;
  width:95pt'>Middlesex</td>
  <td class=xl6628237 width=126 style='border-top:none;border-left:none;
  width:95pt'>　</td>
  <td class=xl6628237 width=126 style='border-top:none;border-left:none;
  width:95pt'>Complex Facility</td>
  <td class=xl6728237 width=126 style='border-top:none;border-left:none;
  width:95pt'>Y</td>
 </tr>
 <tr height=36 style='height:27.0pt'>
  <td height=36 class=xl6628237 width=126 style='height:27.0pt;border-top:none;
  width:95pt'>　<input type="checkbox" name="vehicle" value="Bike"></td>
  <td class=xl6628237 width=126 style='border-top:none;border-left:none;
  width:95pt'>Wellcome Trust Sanger Institute</td>
  <td class=xl6628237 width=126 style='border-top:none;border-left:none;
  width:95pt'>Y</td>
  <td class=xl6628237 width=126 style='border-top:none;border-left:none;
  width:95pt'>Private</td>
  <td class=xl6628237 width=126 style='border-top:none;border-left:none;
  width:95pt'>U.K.</td>
  <td class=xl6628237 width=126 style='border-top:none;border-left:none;
  width:95pt'>Hinxton near Cambridge</td>
  <td class=xl6628237 width=126 style='border-top:none;border-left:none;
  width:95pt'>Extention</td>
  <td class=xl6628237 width=126 style='border-top:none;border-left:none;
  width:95pt'>Medical Facility</td>
  <td class=xl6728237 width=126 style='border-top:none;border-left:none;
  width:95pt'>Y</td>
 </tr>
 <tr height=36 style='height:27.0pt'>
  <td height=36 class=xl6628237 width=126 style='height:27.0pt;border-top:none;
  width:95pt'>　<input type="checkbox" name="vehicle" value="Bike"></td>
  <td class=xl6628237 width=126 style='border-top:none;border-left:none;
  width:95pt'>St Helens and Knowsley Hospitals</td>
  <td class=xl6628237 width=126 style='border-top:none;border-left:none;
  width:95pt'>Y</td>
  <td class=xl6628237 width=126 style='border-top:none;border-left:none;
  width:95pt'>Public</td>
  <td class=xl6628237 width=126 style='border-top:none;border-left:none;
  width:95pt'>U.K.</td>
  <td class=xl6628237 width=126 style='border-top:none;border-left:none;
  width:95pt'>Warrinton</td>
  <td class=xl6628237 width=126 style='border-top:none;border-left:none;
  width:95pt'>Construction</td>
  <td class=xl6628237 width=126 style='border-top:none;border-left:none;
  width:95pt'>Medical Facility</td>
  <td class=xl6728237 width=126 style='border-top:none;border-left:none;
  width:95pt'>Y</td>
 </tr>
 <tr height=108 style='height:81.0pt'>
  <td height=108 class=xl6628237 width=126 style='height:81.0pt;border-top:
  none;width:95pt'>　<input type="checkbox" name="vehicle" value="Bike"></td>
  <td class=xl6628237 width=126 style='border-top:none;border-left:none;
  width:95pt'>Advanced Metrology Laboratory</td>
  <td class=xl6628237 width=126 style='border-top:none;border-left:none;
  width:95pt'>Y</td>
  <td class=xl6628237 width=126 style='border-top:none;border-left:none;
  width:95pt'>Public</td>
  <td class=xl6628237 width=126 style='border-top:none;border-left:none;
  width:95pt'>U.K.</td>
  <td class=xl6628237 width=126 style='border-top:none;border-left:none;
  width:95pt'>　</td>
  <td class=xl6628237 width=126 style='border-top:none;border-left:none;
  width:95pt'>Construction</td>
  <td class=xl6628237 width=126 style='border-top:none;border-left:none;
  width:95pt'>Education Facility/Further education facilities/Scientific,
  computing facilities (laboratories)</td>
  <td class=xl6728237 width=126 style='border-top:none;border-left:none;
  width:95pt'>Y</td>
 </tr>
 <tr height=36 style='height:27.0pt'>
  <td height=36 class=xl6628237 width=126 style='height:27.0pt;border-top:none;
  width:95pt'>　<input type="checkbox" name="vehicle" value="Bike"></td>
  <td class=xl6628237 width=126 style='border-top:none;border-left:none;
  width:95pt'>Varma Salmisaari Project</td>
  <td class=xl6628237 width=126 style='border-top:none;border-left:none;
  width:95pt'>Y</td>
  <td class=xl6628237 width=126 style='border-top:none;border-left:none;
  width:95pt'>Private</td>
  <td class=xl6628237 width=126 style='border-top:none;border-left:none;
  width:95pt'>Finland</td>
  <td class=xl6628237 width=126 style='border-top:none;border-left:none;
  width:95pt'>Palmberg</td>
  <td class=xl6628237 width=126 style='border-top:none;border-left:none;
  width:95pt'>Construction</td>
  <td class=xl6628237 width=126 style='border-top:none;border-left:none;
  width:95pt'>Complex Facility</td>
  <td class=xl6728237 width=126 style='border-top:none;border-left:none;
  width:95pt'>N</td>
 </tr>
 <tr height=108 style='height:81.0pt'>
  <td height=108 class=xl6628237 width=126 style='height:81.0pt;border-top:
  none;width:95pt'>　</td>
  <td class=xl6628237 width=126 style='border-top:none;border-left:none;
  width:95pt'>Vennesla Library and Cultural Center</td>
  <td class=xl6628237 width=126 style='border-top:none;border-left:none;
  width:95pt'>Y</td>
  <td class=xl6628237 width=126 style='border-top:none;border-left:none;
  width:95pt'>Private</td>
  <td class=xl6628237 width=126 style='border-top:none;border-left:none;
  width:95pt'>Norway</td>
  <td class=xl6628237 width=126 style='border-top:none;border-left:none;
  width:95pt'>Vennesia</td>
  <td class=xl6628237 width=126 style='border-top:none;border-left:none;
  width:95pt'>Construction</td>
  <td class=xl6628237 width=126 style='border-top:none;border-left:none;
  width:95pt'>Education Facility/Further education facilities/Scientific,
  computing facilities (laboratories)</td>
  <td class=xl6728237 width=126 style='border-top:none;border-left:none;
  width:95pt'>Y</td>
 </tr>
 <tr height=108 style='height:81.0pt'>
  <td height=108 class=xl6628237 width=126 style='height:81.0pt;border-top:
  none;width:95pt'>　<input type="checkbox" name="vehicle" value="Bike"></td>
  <td class=xl6628237 width=126 style='border-top:none;border-left:none;
  width:95pt'>The Ohio State University</td>
  <td class=xl6628237 width=126 style='border-top:none;border-left:none;
  width:95pt'>Y</td>
  <td class=xl6628237 width=126 style='border-top:none;border-left:none;
  width:95pt'>Private</td>
  <td class=xl6628237 width=126 style='border-top:none;border-left:none;
  width:95pt'>United States</td>
  <td class=xl6628237 width=126 style='border-top:none;border-left:none;
  width:95pt'>Ohio</td>
  <td class=xl6628237 width=126 style='border-top:none;border-left:none;
  width:95pt'>Construction</td>
  <td class=xl6628237 width=126 style='border-top:none;border-left:none;
  width:95pt'>Education Facility/Further education facilities/Scientific,
  computing facilities (laboratories)</td>
  <td class=xl6728237 width=126 style='border-top:none;border-left:none;
  width:95pt'>N</td>
 </tr>
 <tr height=36 style='height:27.0pt'>
  <td height=36 class=xl6628237 width=126 style='height:27.0pt;border-top:none;
  width:95pt'>　<input type="checkbox" name="vehicle" value="Bike"></td>
  <td class=xl6628237 width=126 style='border-top:none;border-left:none;
  width:95pt'>Carolinas Medical Center</td>
  <td class=xl6628237 width=126 style='border-top:none;border-left:none;
  width:95pt'>Y</td>
  <td class=xl6628237 width=126 style='border-top:none;border-left:none;
  width:95pt'>Private</td>
  <td class=xl6628237 width=126 style='border-top:none;border-left:none;
  width:95pt'>United States</td>
  <td class=xl6828237 width=126 style='border-top:none;border-left:none;
  width:95pt'>North Carolina</td>
  <td class=xl6628237 width=126 style='border-top:none;border-left:none;
  width:95pt'>Construction</td>
  <td class=xl6628237 width=126 style='border-top:none;border-left:none;
  width:95pt'>Medical Facility</td>
  <td class=xl6728237 width=126 style='border-top:none;border-left:none;
  width:95pt'>Y</td>
 </tr>
 <tr height=36 style='height:27.0pt'>
  <td height=36 class=xl6628237 width=126 style='height:27.0pt;border-top:none;
  width:95pt'>　<input type="checkbox" name="vehicle" value="Bike"></td>
  <td class=xl6628237 width=126 style='border-top:none;border-left:none;
  width:95pt'>St Helens and Knowsley Hospitals</td>
  <td class=xl6628237 width=126 style='border-top:none;border-left:none;
  width:95pt'>Y</td>
  <td class=xl6628237 width=126 style='border-top:none;border-left:none;
  width:95pt'>Public</td>
  <td class=xl6628237 width=126 style='border-top:none;border-left:none;
  width:95pt'>U.K.</td>
  <td class=xl6628237 width=126 style='border-top:none;border-left:none;
  width:95pt'>North West</td>
  <td class=xl6628237 width=126 style='border-top:none;border-left:none;
  width:95pt'>Construction</td>
  <td class=xl6628237 width=126 style='border-top:none;border-left:none;
  width:95pt'>Medical Facility</td>
  <td class=xl6728237 width=126 style='border-top:none;border-left:none;
  width:95pt'>Y</td>
 </tr>
 <![if supportMisalignedColumns]>
 <tr height=0 style='display:none'>
  <td width=126 style='width:95pt'></td>
  <td width=126 style='width:95pt'></td>
  <td width=126 style='width:95pt'></td>
  <td width=126 style='width:95pt'></td>
  <td width=126 style='width:95pt'></td>
  <td width=126 style='width:95pt'></td>
  <td width=126 style='width:95pt'></td>
  <td width=126 style='width:95pt'></td>
  <td width=126 style='width:95pt'></td>
 </tr>
 <![endif]>
</table>

      </div><div>
     
</div>


@stop

