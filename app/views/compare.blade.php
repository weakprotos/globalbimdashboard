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
</style>

<style id="대시보드에 들어갈 엑셀 (1)_27077_Styles">
<!--table
	{mso-displayed-decimal-separator:"\.";
	mso-displayed-thousand-separator:"\,";}
.font527077
	{color:windowtext;
	font-size:8.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:"맑은 고딕", monospace;
	mso-font-charset:129;}
.font627077
	{color:black;
	font-size:9.0pt;
	font-weight:700;
	font-style:normal;
	text-decoration:none;
	font-family:Tahoma, sans-serif;
	mso-font-charset:0;}
.font727077
	{color:black;
	font-size:9.0pt;
	font-weight:700;
	font-style:normal;
	text-decoration:none;
	font-family:돋움, monospace;
	mso-font-charset:129;}
.xl1527077
	{padding:0px;
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
.xl6427077
	{padding:0px;
	mso-ignore:padding;
	color:#0070C0;
	font-size:10.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:"맑은 고딕", monospace;
	mso-font-charset:129;
	mso-number-format:General;
	text-align:left;
	vertical-align:middle;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl6527077
	{padding:0px;
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
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl6627077
	{padding:0px;
	mso-ignore:padding;
	color:windowtext;
	font-size:10.0pt;
	font-weight:700;
	font-style:normal;
	text-decoration:none;
	font-family:"맑은 고딕", monospace;
	mso-font-charset:129;
	mso-number-format:General;
	text-align:left;
	vertical-align:middle;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl6727077
	{padding:0px;
	mso-ignore:padding;
	color:windowtext;
	font-size:11.0pt;
	font-weight:700;
	font-style:normal;
	text-decoration:none;
	font-family:"맑은 고딕", monospace;
	mso-font-charset:129;
	mso-number-format:General;
	text-align:left;
	vertical-align:middle;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl6827077
	{padding:0px;
	mso-ignore:padding;
	color:windowtext;
	font-size:10.0pt;
	font-weight:700;
	font-style:normal;
	text-decoration:none;
	font-family:"맑은 고딕", monospace;
	mso-font-charset:129;
	mso-number-format:General;
	text-align:left;
	vertical-align:middle;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:normal;}
.xl6927077
	{padding:0px;
	mso-ignore:padding;
	color:windowtext;
	font-size:10.0pt;
	font-weight:700;
	font-style:normal;
	text-decoration:none;
	font-family:"맑은 고딕", monospace;
	mso-font-charset:129;
	mso-number-format:General;
	text-align:left;
	vertical-align:middle;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:normal;}
.xl7027077
	{padding:0px;
	mso-ignore:padding;
	color:windowtext;
	font-size:10.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:"맑은 고딕", monospace;
	mso-font-charset:129;
	mso-number-format:"Short Date";
	text-align:left;
	vertical-align:middle;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:normal;}
.xl7127077
	{padding:0px;
	mso-ignore:padding;
	color:windowtext;
	font-size:10.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:"맑은 고딕", monospace;
	mso-font-charset:129;
	mso-number-format:General;
	text-align:left;
	vertical-align:middle;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl7227077
	{padding:0px;
	mso-ignore:padding;
	color:windowtext;
	font-size:11.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:"맑은 고딕", monospace;
	mso-font-charset:129;
	mso-number-format:General;
	text-align:left;
	vertical-align:middle;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl7327077
	{padding:0px;
	mso-ignore:padding;
	color:windowtext;
	font-size:10.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:"맑은 고딕", monospace;
	mso-font-charset:129;
	mso-number-format:General;
	text-align:left;
	vertical-align:middle;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:normal;}
.xl7427077
	{padding:0px;
	mso-ignore:padding;
	color:windowtext;
	font-size:10.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:"맑은 고딕", monospace;
	mso-font-charset:129;
	mso-number-format:General;
	text-align:left;
	vertical-align:middle;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:normal;}
.xl7527077
	{padding:0px;
	mso-ignore:padding;
	color:black;
	font-size:11.0pt;
	font-weight:700;
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
.xl7627077
	{padding:0px;
	mso-ignore:padding;
	color:windowtext;
	font-size:10.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:"맑은 고딕", monospace;
	mso-font-charset:129;
	mso-number-format:General;
	text-align:center;
	vertical-align:middle;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:normal;}
.xl7727077
	{padding:0px;
	mso-ignore:padding;
	color:black;
	font-size:10.0pt;
	font-weight:700;
	font-style:normal;
	text-decoration:none;
	font-family:"맑은 고딕", monospace;
	mso-font-charset:129;
	mso-number-format:General;
	text-align:left;
	vertical-align:middle;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:normal;}
.xl7827077
	{padding:0px;
	mso-ignore:padding;
	color:#D0CECE;
	font-size:10.0pt;
	font-weight:700;
	font-style:normal;
	text-decoration:none;
	font-family:"맑은 고딕", monospace;
	mso-font-charset:129;
	mso-number-format:General;
	text-align:left;
	vertical-align:middle;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:normal;}
.xl7927077
	{padding:0px;
	mso-ignore:padding;
	color:#D0CECE;
	font-size:10.0pt;
	font-weight:700;
	font-style:normal;
	text-decoration:none;
	font-family:"맑은 고딕", monospace;
	mso-font-charset:129;
	mso-number-format:General;
	text-align:left;
	vertical-align:middle;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:normal;}
.xl8027077
	{padding:0px;
	mso-ignore:padding;
	color:black;
	font-size:11.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:"맑은 고딕", monospace;
	mso-font-charset:129;
	mso-number-format:General;
	text-align:center;
	vertical-align:middle;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
ruby
	{ruby-align:left;}
rt
	{color:windowtext;
	font-size:9.0pt;
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
	<h1>Compare the projects</h1>
				
				
				
                            <!-- /input-group -->
				
				
				</div>
                <!-- /.col-lg-12 -->
            </div>
        
  <div class="row">
        <div class="col-lg-12">

<table border=0 cellpadding=0 cellspacing=0 width=1429 style='border-collapse:
 collapse;table-layout:fixed;width:1073pt'>
 <col width=325 style='mso-width-source:userset;mso-width-alt:10400;width:244pt'>
 <col class=xl6527077 width=325 style='mso-width-source:userset;mso-width-alt:
 10400;width:244pt'>
 <col width=44 style='mso-width-source:userset;mso-width-alt:1408;width:33pt'>
 <col width=45 style='mso-width-source:userset;mso-width-alt:1440;width:34pt'>
 <col width=40 style='mso-width-source:userset;mso-width-alt:1280;width:30pt'>
 <col width=325 span=2 style='mso-width-source:userset;mso-width-alt:10400;
 width:244pt'>
 <tr height=22 style='height:16.5pt'>
  <td colspan=2 height=22 class=xl8027077 width=650 style='height:16.5pt;
  width:488pt'><img src="../images/p6.png"  width="400px" class="img-responsive" alt="Cinque Terre"></td>
  <td class=xl1527077 width=44 style='width:33pt'></td>
  <td class=xl1527077 width=45 style='width:34pt'></td>
  <td class=xl1527077 width=40 style='width:30pt'></td>
  <td colspan=2 class=xl8027077 width=650 style='width:488pt'><img src="../images/p7.png" width="400px" class="img-responsive" alt="Cinque Terre"></td>
 </tr>
 <tr height=22 style='height:16.5pt'>
  <td height=22 class=xl7527077 style='height:16.5pt'>General</td>
  <td class=xl6527077></td>
  <td class=xl1527077></td>
  <td class=xl1527077></td>
  <td class=xl1527077></td>
  <td class=xl7527077>General</td>
  <td class=xl6527077></td>
 </tr>
 <tr height=23 style='height:17.45pt'>
  <td height=23 class=xl6627077 style='height:17.45pt'>Project Name</td>
  <td class=xl7127077>St Helens and Knowsley Hospitals</td>
  <td class=xl1527077></td>
  <td class=xl1527077></td>
  <td class=xl1527077></td>
  <td class=xl6627077>Project Name</td>
  <td class=xl7127077>Wellcome Trust Sanger Institute</td>
 </tr>
 <tr height=22 style='height:16.5pt'>
  <td height=22 class=xl6627077 style='height:16.5pt'>공공/민간(Public/Private)</td>
  <td class=xl7127077>Public</td>
  <td class=xl1527077></td>
  <td class=xl1527077></td>
  <td class=xl1527077></td>
  <td class=xl6627077>공공/민간(Public/Private)</td>
  <td class=xl7127077>Private</td>
 </tr>
 <tr height=22 style='height:16.5pt'>
  <td height=22 class=xl6627077 style='height:16.5pt'>국가(Nation)</td>
  <td class=xl7127077>U.K.</td>
  <td class=xl1527077></td>
  <td class=xl1527077></td>
  <td class=xl1527077></td>
  <td class=xl6627077>국가(Nation)</td>
  <td class=xl7127077>U.K.</td>
 </tr>
 <tr height=22 style='height:16.5pt'>
  <td height=22 class=xl6627077 style='height:16.5pt'>도시/주(City/State)</td>
  <td class=xl7127077>Warrinton</td>
  <td class=xl1527077></td>
  <td class=xl1527077></td>
  <td class=xl1527077></td>
  <td class=xl6627077>도시/주(City/State)</td>
  <td class=xl7127077>Hinxton near Cambridge</td>
 </tr>
 <tr height=22 style='height:16.5pt'>
  <td height=22 class=xl6627077 style='height:16.5pt'>건축행위유형(Construction Type)</td>
  <td class=xl7127077>New Building Construction</td>
  <td class=xl1527077></td>
  <td class=xl1527077></td>
  <td class=xl1527077></td>
  <td class=xl6627077>건축행위유형(Construction Type)</td>
  <td class=xl7127077>Extention</td>
 </tr>
 <tr height=23 style='height:17.45pt'>
  <td height=23 class=xl6627077 style='height:17.45pt'></td>
  <td class=xl7127077></td>
  <td class=xl1527077></td>
  <td class=xl1527077></td>
  <td class=xl1527077></td>
  <td class=xl6627077></td>
  <td class=xl7127077></td>
 </tr>
 <tr height=23 style='height:17.45pt'>
  <td height=23 class=xl6727077 style='height:17.45pt'>Description</td>
  <td class=xl7127077></td>
  <td class=xl6427077></td>
  <td class=xl1527077></td>
  <td class=xl1527077></td>
  <td class=xl6727077>Description</td>
  <td class=xl7127077></td>
 </tr>
 <tr height=36 style='height:27.0pt'>
  <td height=36 class=xl6727077 style='height:27.0pt'>주용도(Primary Usage/Main
  Usage)</td>
  <td class=xl7227077>Medical Facility</td>
  <td class=xl1527077></td>
  <td class=xl1527077></td>
  <td class=xl1527077></td>
  <td class=xl6727077>주용도(Primary Usage/Main Usage)</td>
  <td class=xl7627077 width=325 style='width:244pt'>Medical Facility</td>
 </tr>
 <tr height=22 style='height:16.5pt'>
  <td height=22 class=xl6827077 width=325 style='height:16.5pt;width:244pt'>연면적(㎡)(Total
  Ground Area)</td>
  <td class=xl7227077>75000</td>
  <td class=xl1527077></td>
  <td class=xl1527077></td>
  <td class=xl1527077></td>
  <td class=xl7727077 width=325 style='width:244pt'>세대/호/가구/유닛(객실, 병실 등) 개수</td>
  <td class=xl7227077>101 beds</td>
 </tr>
 <tr height=22 style='height:16.5pt'>
  <td height=22 class=xl6827077 width=325 style='height:16.5pt;width:244pt'>전체실제시작일(yyyy.mm.dd)</td>
  <td class=xl7027077 width=325 style='width:244pt'>2006</td>
  <td class=xl1527077></td>
  <td class=xl1527077></td>
  <td class=xl1527077></td>
  <td class=xl7827077 width=325 style='width:244pt'>전체실제시작일(yyyy.mm.dd)</td>
  <td class=xl7027077 width=325 style='width:244pt'></td>
 </tr>
 <tr height=22 style='height:16.5pt'>
  <td height=22 class=xl6827077 width=325 style='height:16.5pt;width:244pt'>전체실제종료일(yyyy.mm.dd)</td>
  <td class=xl7027077 width=325 style='width:244pt'>2009</td>
  <td class=xl1527077></td>
  <td class=xl1527077></td>
  <td class=xl1527077></td>
  <td class=xl7827077 width=325 style='width:244pt'>전체실제종료일(yyyy.mm.dd)</td>
  <td class=xl7027077 width=325 style='width:244pt'></td>
 </tr>
 <tr height=23 style='height:17.45pt'>
  <td height=23 class=xl6927077 width=325 style='height:17.45pt;width:244pt'>Contract
  Value($)</td>
  <td class=xl7427077 width=325 style='width:244pt'>510345519</td>
  <td class=xl6427077></td>
  <td class=xl6427077></td>
  <td class=xl1527077></td>
  <td class=xl7927077 width=325 style='width:244pt'>Contract Value($)</td>
  <td class=xl7427077 width=325 style='width:244pt'></td>
 </tr>
 <tr height=23 style='height:17.45pt'>
  <td height=23 class=xl6927077 width=325 style='height:17.45pt;width:244pt'></td>
  <td class=xl7427077 width=325 style='width:244pt'></td>
  <td class=xl6427077></td>
  <td class=xl6427077></td>
  <td class=xl1527077></td>
  <td class=xl6927077 width=325 style='width:244pt'></td>
  <td class=xl7427077 width=325 style='width:244pt'></td>
 </tr>
 <tr height=23 style='height:17.45pt'>
  <td height=23 class=xl6727077 style='height:17.45pt'>Feature</td>
  <td class=xl7227077></td>
  <td class=xl1527077></td>
  <td class=xl1527077></td>
  <td class=xl1527077></td>
  <td class=xl6727077>Feature</td>
  <td class=xl7227077></td>
 </tr>
 <tr height=22 style='height:16.5pt'>
  <td height=22 class=xl6927077 width=325 style='height:16.5pt;width:244pt'>기하학적
  도움(Geometrical support)</td>
  <td class=xl7327077 width=325 style='width:244pt'>Y</td>
  <td class=xl1527077></td>
  <td class=xl1527077></td>
  <td class=xl1527077></td>
  <td class=xl6927077 width=325 style='width:244pt'>기하학적 도움(Geometrical
  support)</td>
  <td class=xl7327077 width=325 style='width:244pt'>Y</td>
 </tr>
 <tr height=22 style='height:16.5pt'>
  <td height=22 class=xl6927077 width=325 style='height:16.5pt;width:244pt'>건물시스템(설비
  등) 도움(System support)</td>
  <td class=xl7327077 width=325 style='width:244pt'>Y</td>
  <td class=xl1527077></td>
  <td class=xl1527077></td>
  <td class=xl1527077></td>
  <td class=xl6927077 width=325 style='width:244pt'>건물시스템(설비 등) 도움(System
  support)</td>
  <td class=xl7327077 width=325 style='width:244pt'>N</td>
 </tr>
 <tr height=22 style='height:16.5pt'>
  <td height=22 class=xl6927077 width=325 style='height:16.5pt;width:244pt'>공법/시공
  도움(Construction support)</td>
  <td class=xl7327077 width=325 style='width:244pt'>Y</td>
  <td class=xl1527077></td>
  <td class=xl1527077></td>
  <td class=xl1527077></td>
  <td class=xl6927077 width=325 style='width:244pt'>공법/시공 도움(Construction
  support)</td>
  <td class=xl7327077 width=325 style='width:244pt'>N</td>
 </tr>
 <tr height=23 style='height:17.45pt'>
  <td height=23 class=xl6927077 width=325 style='height:17.45pt;width:244pt'></td>
  <td class=xl6527077></td>
  <td class=xl1527077></td>
  <td class=xl1527077></td>
  <td class=xl1527077></td>
  <td class=xl6927077 width=325 style='width:244pt'></td>
  <td class=xl6527077></td>
 </tr>
 <tr height=23 style='height:17.45pt'>
  <td height=23 class=xl1527077 colspan=3 style='height:17.45pt'><a href="#">http://constructingexcellence.org.uk/wp-content/uploads/2014/10/CASESTUDY_ST-HELENS_web.pdf</a></td>
  <td class=xl1527077></td>
  <td class=xl1527077></td>
  <td class=xl1527077 colspan=2><a href="#">http://constructingexcellence.org.uk/wp-content/uploads/2014/10/CASESTUDY_ST-HELENS_we.pdf</a></td>
 </tr>
 <![if supportMisalignedColumns]>
 <tr height=0 style='display:none'>
  <td width=325 style='width:244pt'></td>
  <td width=325 style='width:244pt'></td>
  <td width=44 style='width:33pt'></td>
  <td width=45 style='width:34pt'></td>
  <td width=40 style='width:30pt'></td>
  <td width=325 style='width:244pt'></td>
  <td width=325 style='width:244pt'></td>
 </tr>
 <![endif]>
</table>
<br />
<br />
<br />
<br />
<br />
<br />
<br />
<br />
<br />

            
      </div><div>
     
</div>


@stop

