@extends('layouts.slimbim')

@section('script-front')
	<!-- Bootstrap Core CSS -->
	<link href="../bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

	<!-- Custom Fonts -->
	<link href="../bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
	
	<!-- Custom CSS -->
	<link href="bower_components/bootstrap/dist/css/creative.css" rel="stylesheet">
	
	<style>
	.q8_a{
	 display: none;
	 }
	 .q8_b{
	 display: none;
	 }
	</style>


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

	
	<script type="text/javascript">

    $(document).ready(function(){
        $('input[type="radio"]').click(function(){
            if($(this).attr("value")=="yes"){
                $(".q8_a").hide();
                $(".q8_b").show();
            }
            if($(this).attr("value")=="no"){
                $(".q8_b").hide();
                $(".q8_a").show();
            }
        });
    });
</script>

@stop


@section('slimbimchart')
<br>
<br>
@if($data['language']==='arabic')
<div id="page-wrapper">
	<div class="row">
		<div class="col-lg-12">
			<h1 class="page-header" align="right">{{ $data['h1'] }}</h1>
			@if (Session::has('message'))
		    		<div class="alert alert-info">{{ Session::get('message') }}</div>
			@endif
		
		</div>
	</div>
	<div class="row">
		<div class="col-lg-12">
			{{HTML::ul($errors->all()) }} 
			{{Form::open(array('url'=>'answers/store')) }}
			{{ Form::hidden('q1', Auth::user()->country) }}
			{{ Form::hidden('q0', Auth::user()->company) }}
			{{ Form::hidden('language', $data['language']) }}
			@if(Auth::user()->company != 18)
			<div class="panel panel-default">
                        	<div class="panel-heading">
					<div class="form-group" align="right">
						{{ Form::label('q2',$data['q1']) }}
					</div>
					<div class="panel-body" align="right">
						<div class="input-group">
							{{ Form::number('q2',Input::old('q2'),array('class'=>'form-control'))}}
						</div>
					</div>
				</div>
			</div>
@endif




<div class="panel panel-default">
	<div class="panel-heading">
		<div class="form-group" align="right">
			{{ Form::label('q3',$data['q2']) }}
		</div>
		<div class="panel-body" align="right">
			<div class="input-group">
				{{ Form::select('q3',array(''=>$data['select'],'0'=>'0%','5'=>'5%','10'=>'10%','15'=>'15%','20'=>'20%','25'=>'25%','30'=>'30%','35'=>'35%','40'=>'40%','45'=>'45%','50'=>'50%','55'=>'55%','60'=>'60%','65'=>'65%','70'=>'70%','75'=>'75%','80'=>'80%','85'=>'85%','90'=>'90%','95'=>'95%','100'=>'100%'),Input::old('q3'),array('class'=>'form-control')) }}
			</div>
		</div>
	</div>
</div>



<div class="panel panel-default">
	<div class="panel-heading">
		<div class="form-group" align="right">
			{{ Form::label('q4',$data['q3']) }}
		</div>
		<div class="panel-body" align="right">
			<div class="input-group">
				{{ $data['q3a'] }} {{ Form::radio('q4', '1') }}<br />
				{{ $data['q3b']}} {{ Form::radio('q4', '2') }}<br />
				{{ $data['q3c']}} {{ Form::radio('q4', '3') }}<br />
				{{ $data['q3d']}} {{ Form::radio('q4', '4') }}<br />
				{{ $data['q3e']}} {{ Form::radio('q4', '5') }}
			</div>
		</div>
	</div>
</div>



 <div class="panel panel-default">
                        <div class="panel-heading">

<div class="form-group" align="right">
	{{ Form::label('q5',$data['q4']) }}
</div>
<div class="panel-body" align="right">
	<div class="input-group">
		 {{ $data['q4a']}} {{ Form::radio('q5', '1') }}<br />

		 {{$data['q4b']}} {{ Form::radio('q5', '2') }}<br />

		 {{ $data['q4c']}} {{ Form::radio('q5', '3') }}<br />

		 {{$data['q4d']}} {{ Form::radio('q5', '4') }}<br />

		 {{$data['q4e']}} {{ Form::radio('q5', '5') }}

	</div>
</div>
</div>
</div>





 <div class="panel panel-default">
                        <div class="panel-heading">

<div class="form-group" align="right">
	{{ Form::label('Q9',$data['q5']) }}
</div>


<div class="panel-body" align="right">
<div class="table-responsive" >
           <table class="table"align="right">
<thead>
       <tr>
	   
                   <th class="align-right">{{$data['q5th5']}}</th>
                   <th class="align-right">{{$data['q5th4']}}</th>
                   <th class="align-right">{{$data['q5th3']}}</th>
                   <th class="align-right">{{$data['q5th2']}}</th>
                   <th class="align-right">{{$data['q5th1']}}</th>
       </tr>
</thead>
<tbody>
<tr>
	
	
	
	
	
		<td>

		<div class="form-group" align="right">
			
			<div class="input-group">
				{{ Form::text('q6_q14',Input::old('q6_q14'),array('class'=>'form-control')) }}
			</div>

		</div>


	</td>
	<td>

		<div class="form-group" align="right">
			
			<div class="input-group">
				{{ Form::select('q6_q13',array(''=>$data['o2x'], '1'=>$data['o2a'],'2'=>$data['o2b'],'3'=>$data['o2c'],'4'=>$data['o2d'],'5'=>$data['o2e']),Input::old('q6_q13'),array('class'=>'form-control')) }}
			</div>

		</div>


	</td>
	<td>
		<div class="form-group" align="right">
			
			<div class="input-group">
				{{ Form::select('q6_q12',array(''=>$data['o1x'], '1'=>$data['o1a'],'2'=>$data['o1b'],'3'=>$data['o1c'],'4'=>$data['o1d'],'5'=>$data['o1e']),Input::old('q6_q12'),array('class'=>'form-control')) }}
			</div>

		</div>



	</td>
	
	<td>
		<div class="form-group" align="right">
			
			<div class="input-group">
				{{ Form::select('q6_q11',array(''=>$data['select'],'0'=>'0%','5'=>'5%','10'=>'10%','15'=>'15%','20'=>'20%','25'=>'25%','30'=>'30%','35'=>'35%','40'=>'40%','45'=>'45%','50'=>'50%','55'=>'55%','60'=>'60%','65'=>'65%','70'=>'70%','75'=>'75%','80'=>'80%','85'=>'85%','90'=>'90%','95'=>'95%','100'=>'100%'),Input::old('q6_q11'),array('class'=>'form-control')) }}
			</div>

		</div>

	</td>
	
	<td>{{$data['q5r1']}}</td>
	
</tr>

<tr>
	
	
	
	
	
	
		
		<td>

		<div class="form-group" align="right">
			
			<div class="input-group">
				{{ Form::text('q6_q24',Input::old('q6_q24'),array('class'=>'form-control')) }}
			</div>

		</div>


	</td>
	
	
	<td>

		<div class="form-group" align="right">
			
			<div class="input-group">
				{{ Form::select('q6_q23',array(''=>$data['o2x'], '1'=>$data['o2a'],'2'=>$data['o2b'],'3'=>$data['o2c'],'4'=>$data['o2d'],'5'=>$data['o2e']),Input::old('q6_q23'),array('class'=>'form-control')) }}
			</div>

		</div>
	
	</td>
	
	<td>

		<div class="form-group" align="right">
			
			<div class="input-group">
				{{ Form::select('q6_q22',array(''=>$data['o1x'], '1'=>$data['o1a'],'2'=>$data['o1b'],'3'=>$data['o1c'],'4'=>$data['o1d'],'5'=>$data['o1e']),Input::old('q6_q22'),array('class'=>'form-control')) }}
			</div>

		</div>
	</td>
	
	
	<td>

		<div class="form-group" align="right">
			
			<div class="input-group">
				{{ Form::select('q6_q21',array(''=>$data['select'],'0'=>'0%','5'=>'5%','10'=>'10%','15'=>'15%','20'=>'20%','25'=>'25%','30'=>'30%','35'=>'35%','40'=>'40%','45'=>'45%','50'=>'50%','55'=>'55%','60'=>'60%','65'=>'65%','70'=>'70%','75'=>'75%','80'=>'80%','85'=>'85%','90'=>'90%','95'=>'95%','100'=>'100%'),Input::old('q6_q21'),array('class'=>'form-control')) }}
			</div>

		</div>

	</td>
	
	
	<td>{{$data['q5r2']}}</td>
</tr>


<tr>
	
	
	
	
	
	
		
		<td>

		<div class="form-group" align="right">
			
			<div class="input-group">
				{{ Form::text('q6_q34',Input::old('q6_q34'),array('class'=>'form-control')) }}
			</div>

		</div>


	</td>
	
	<td>

		<div class="form-group" align="right">
			
			<div class="input-group">
				{{ Form::select('q6_q33',array(''=>$data['o2x'], '1'=>$data['o2a'],'2'=>$data['o2b'],'3'=>$data['o2c'],'4'=>$data['o2d'],'5'=>$data['o2e']),Input::old('q6_q33'),array('class'=>'form-control')) }}
			</div>

		</div>
	
	</td>
	
	<td>

		<div class="form-group" align="right">
			
			<div class="input-group">
				{{ Form::select('q6_q32',array(''=>$data['o1x'], '1'=>$data['o1a'],'2'=>$data['o1b'],'3'=>$data['o1c'],'4'=>$data['o1d'],'5'=>$data['o1e']),Input::old('q6_q32'),array('class'=>'form-control')) }}
			</div>

		</div>
	</td>
	
	<td>

		<div class="form-group" align="right">
			
			<div class="input-group">
				{{ Form::select('q6_q31',array(''=>$data['select'],'0'=>'0%','5'=>'5%','10'=>'10%','15'=>'15%','20'=>'20%','25'=>'25%','30'=>'30%','35'=>'35%','40'=>'40%','45'=>'45%','50'=>'50%','55'=>'55%','60'=>'60%','65'=>'65%','70'=>'70%','75'=>'75%','80'=>'80%','85'=>'85%','90'=>'90%','95'=>'95%','100'=>'100%'),Input::old('q6_q31'),array('class'=>'form-control')) }}
			</div>

		</div>

	</td>
	
	
	<td>{{$data['q5r3']}}</td>
</tr>

<tr>
	
	
	
	
	
	
		
		<td>

		<div class="form-group" align="right">
			
			<div class="input-group">
				{{ Form::text('q6_q44',Input::old('q6_q44'),array('class'=>'form-control')) }}
			</div>

		</div>


	</td>
	
	<td>

		<div class="form-group" align="right">
			
			<div class="input-group">
				{{ Form::select('q6_q43',array(''=>$data['o2x'], '1'=>$data['o2a'],'2'=>$data['o2b'],'3'=>$data['o2c'],'4'=>$data['o2d'],'5'=>$data['o2e']),Input::old('q6_q43'),array('class'=>'form-control')) }}
			</div>

		</div>
	
	</td>

	<td>

		<div class="form-group" align="right">
			
			<div class="input-group">
				{{ Form::select('q6_q42',array(''=>$data['o1x'], '1'=>$data['o1a'],'2'=>$data['o1b'],'3'=>$data['o1c'],'4'=>$data['o1d'],'5'=>$data['o1e']),Input::old('q6_q42'),array('class'=>'form-control')) }}
			</div>

		</div>
	</td>

	
	<td>

		<div class="form-group" align="right">
			
			<div class="input-group">
				{{ Form::select('q6_q41',array(''=>$data['select'],'0'=>'0%','5'=>'5%','10'=>'10%','15'=>'15%','20'=>'20%','25'=>'25%','30'=>'30%','35'=>'35%','40'=>'40%','45'=>'45%','50'=>'50%','55'=>'55%','60'=>'60%','65'=>'65%','70'=>'70%','75'=>'75%','80'=>'80%','85'=>'85%','90'=>'90%','95'=>'95%','100'=>'100%'),Input::old('q6_q41'),array('class'=>'form-control')) }}
			</div>

		</div>

	</td>
	
	
	<td>{{$data['q5r4']}}</td>
	
</tr>



<tr>
	
	
	
	
	
			<td>

		<div class="form-group" align="right">
			
			<div class="input-group">
				{{ Form::text('q6_q54',Input::old('q6_q54'),array('class'=>'form-control')) }}
			</div>

		</div>


	</td>
	
	<td>

		<div class="form-group" align="right">
			
			<div class="input-group">
				{{ Form::select('q6_q53',array(''=>$data['o2x'], '1'=>$data['o2a'],'2'=>$data['o2b'],'3'=>$data['o2c'],'4'=>$data['o2d'],'5'=>$data['o2e']),Input::old('q6_q53'),array('class'=>'form-control')) }}
			</div>

		</div>

	</td>
	
	<td>

		<div class="form-group" align="right">
			
			<div class="input-group">
				{{ Form::select('q6_q52',array(''=>$data['o1x'], '1'=>$data['o1a'],'2'=>$data['o1b'],'3'=>$data['o1c'],'4'=>$data['o1d'],'5'=>$data['o1e']),Input::old('q6_q52'),array('class'=>'form-control')) }}
			</div>

		</div>

	</td>
	
	<td>
		<div class="form-group" align="right">
			
			<div class="input-group">
				{{ Form::select('q6_q51',array(''=>$data['select'],'0'=>'0%','5'=>'5%','10'=>'10%','15'=>'15%','20'=>'20%','25'=>'25%','30'=>'30%','35'=>'35%','40'=>'40%','45'=>'45%','50'=>'50%','55'=>'55%','60'=>'60%','65'=>'65%','70'=>'70%','75'=>'75%','80'=>'80%','85'=>'85%','90'=>'90%','95'=>'95%','100'=>'100%'),Input::old('q6_q51'),array('class'=>'form-control')) }}
			</div>

		</div>


	</td>
	
	<td>{{$data['q5r5']}}</td>
	
</tr>

<tr>
	
	
	
	
	
		<td>

		<div class="form-group" align="right">
			
			<div class="input-group">
				{{ Form::text('q6_q64',Input::old('q6_q64'),array('class'=>'form-control')) }}
			</div>

		</div>


	</td>
	
	<td>

		<div class="form-group" align="right">
			
			<div class="input-group">
				{{ Form::select('q6_q63',array(''=>$data['o2x'], '1'=>$data['o2a'],'2'=>$data['o2b'],'3'=>$data['o2c'],'4'=>$data['o2d'],'5'=>$data['o2e']),Input::old('q6_q63'),array('class'=>'form-control')) }}
			</div>

		</div>

	</td>
	
	<td>

		<div class="form-group" align="right">
			
			<div class="input-group">
				{{ Form::select('q6_q62',array(''=>$data['o1x'], '1'=>$data['o1a'],'2'=>$data['o1b'],'3'=>$data['o1c'],'4'=>$data['o1d'],'5'=>$data['o1e']),Input::old('q6_q62'),array('class'=>'form-control')) }}
			</div>

		</div>

	</td>
	
	
	<td>
		<div class="form-group" align="right">
			
			<div class="input-group">
				{{ Form::select('q6_q61',array(''=>$data['select'],'0'=>'0%','5'=>'5%','10'=>'10%','15'=>'15%','20'=>'20%','25'=>'25%','30'=>'30%','35'=>'35%','40'=>'40%','45'=>'45%','50'=>'50%','55'=>'55%','60'=>'60%','65'=>'65%','70'=>'70%','75'=>'75%','80'=>'80%','85'=>'85%','90'=>'90%','95'=>'95%','100'=>'100%'),Input::old('q6_q61'),array('class'=>'form-control')) }}
			</div>

		</div>


	</td>
	
	<td>{{$data['q5r6']}}</td>
	
	
</tr>

</tbody>
</table>
</div>
</div>
</div>
</div>




<div class="panel panel-default">
                        <div class="panel-heading">

<div class="form-group" align="right">
	{{ Form::label('Q9',$data['q6']) }}
</div>


<div class="panel-body" align="right">
<div class="table-responsive">
           <table class="table">
<thead>
       <tr>
                   <th>{{$data['q6th3']}}</th>
                   <th>{{$data['q6th2']}}</th>
                   <th>{{$data['q6th1']}}</th>
       </tr>
</thead>

<tbody>
<tr>
	

	
	<td>

		<div class="form-group" align="right">
			
			<div class="input-group">
				{{ Form::text('q7_q12',Input::old('q7_q12'),array('class'=>'form-control')) }}
			</div>

		</div>


	</td>
	<td>
		<div class="form-group" align="right">
			
			<div class="input-group">
				{{ Form::select('q7_q11',array('1'=>'1','2'=>'2','3'=>'3','4'=>'4','5'=>'5'),Input::old('q7_q11'),array('class'=>'form-control')) }}
			</div>

		</div>

	</td>
	
	<td>{{$data['q6r1']}}</td>
</tr>

<tr>
	

	
	<td>

		<div class="form-group" align="right">
			
			<div class="input-group">
				{{ Form::text('q7_q22',Input::old('q7_q22'),array('class'=>'form-control')) }}
			</div>

		</div>


	</td>
	<td>
		<div class="form-group" align="right">
			
			<div class="input-group">
				{{ Form::select('q7_q21',array('1'=>'1','2'=>'2','3'=>'3','4'=>'4','5'=>'5'),Input::old('q7_q21'),array('class'=>'form-control')) }}
			</div>

		</div>

	</td>
	<td>{{$data['q6r2']}}</td>
	
</tr><tr>
	

	
	<td>

		<div class="form-group" align="right">
			
			<div class="input-group">
				{{ Form::text('q7_q32',Input::old('q7_q32'),array('class'=>'form-control')) }}
			</div>

		</div>


	</td>
	<td>
		<div class="form-group" align="right">
			
			<div class="input-group">
				{{ Form::select('q7_q31',array('1'=>'1','2'=>'2','3'=>'3','4'=>'4','5'=>'5'),Input::old('q7_q31'),array('class'=>'form-control')) }}
			</div>

		</div>

	</td>
	
	<td>{{$data['q6r3']}}</td>
</tr><tr>
	

	
	<td>

		<div class="form-group" align="right">
			
			<div class="input-group">
				{{ Form::text('q7_q42',Input::old('q7_q42'),array('class'=>'form-control')) }}
			</div>

		</div>


	</td>
	
	<td>
		<div class="form-group" align="right">
			
			<div class="input-group">
				{{ Form::select('q7_q41',array('1'=>'1','2'=>'2','3'=>'3','4'=>'4','5'=>'5'),Input::old('q7_q41'),array('class'=>'form-control')) }}
			</div>

		</div>

	</td>
	
	<td>{{$data['q6r4']}}</td>
	
</tr><tr>
	

	
	<td>

		<div class="form-group" align="right">
			
			<div class="input-group">
				{{ Form::text('q7_q52',Input::old('q7_q52'),array('class'=>'form-control')) }}
			</div>

		</div>


	</td>
	
	<td>
		<div class="form-group" align="right">
			
			<div class="input-group">
				{{ Form::select('q7_q51',array('1'=>'1','2'=>'2','3'=>'3','4'=>'4','5'=>'5'),Input::old('q7_q51'),array('class'=>'form-control')) }}
			</div>

		</div>

	</td>
	
	<td>{{$data['q6r5']}}</td>
	
</tr><tr>
	

	
	<td>

		<div class="form-group" align="right">
			
			<div class="input-group">
				{{ Form::text('q7_q62',Input::old('q7_q62'),array('class'=>'form-control')) }}
			</div>

		</div>


	</td>
	
	<td>
		<div class="form-group" align="right">
			
			<div class="input-group">
				{{ Form::select('q7_q61',array('1'=>'1','2'=>'2','3'=>'3','4'=>'4','5'=>'5'),Input::old('q7_q61'),array('class'=>'form-control')) }}
			</div>

		</div>

	</td>
	
	<td>{{$data['q6r6']}}</td>
	
</tr><tr>
	

	
	<td>

		<div class="form-group" align="right">
			
			<div class="input-group">
				{{ Form::text('q7_q72',Input::old('q7_q72'),array('class'=>'form-control')) }}
			</div>

		</div>


	</td>
	
	<td>
		<div class="form-group" align="right">
			
			<div class="input-group">
				{{ Form::select('q7_q71',array('1'=>'1','2'=>'2','3'=>'3','4'=>'4','5'=>'5'),Input::old('q7_q71'),array('class'=>'form-control')) }}
			</div>

		</div>

	</td>
	
	<td>{{$data['q6r7']}}</td>
	
</tr><tr>
	

	
	<td>

		<div class="form-group" align="right">
			
			<div class="input-group">
				{{ Form::text('q7_q82',Input::old('q7_q82'),array('class'=>'form-control')) }}
			</div>

		</div>


	</td>
	
	<td>
		<div class="form-group" align="right">
			
			<div class="input-group">
				{{ Form::select('q7_q81',array('1'=>'1','2'=>'2','3'=>'3','4'=>'4','5'=>'5'),Input::old('q7_q81'),array('class'=>'form-control')) }}
			</div>

		</div>

	</td>
	
	<td>{{$data['q6r8']}}</td>
	
</tr><tr>
	

	
	<td>

		<div class="form-group" align="right">
			
			<div class="input-group">
				{{ Form::text('q7_q92',Input::old('q7_q92'),array('class'=>'form-control')) }}
			</div>

		</div>


	</td>
	
	<td>
		<div class="form-group" align="right">
			
			<div class="input-group">
				{{ Form::select('q7_q91',array('1'=>'1','2'=>'2','3'=>'3','4'=>'4','5'=>'5'),Input::old('q7_q91'),array('class'=>'form-control')) }}
			</div>

		</div>

	</td>
	
	<td>{{$data['q6r9']}}</td>
	
</tr><tr>
	

	
	<td>

		<div class="form-group" align="right">
			
			<div class="input-group">
				{{ Form::text('q7_q102',Input::old('q7_q102'),array('class'=>'form-control')) }}
			</div>

		</div>


	</td>
	
	<td>
		<div class="form-group" align="right">
			
			<div class="input-group">
				{{ Form::select('q7_q101',array('1'=>'1','2'=>'2','3'=>'3','4'=>'4','5'=>'5'),Input::old('q7_q101'),array('class'=>'form-control')) }}
			</div>

		</div>

	</td>
	
	<td>{{$data['q6r10']}}</td>
	
</tr><tr>
	

	
	<td>

		<div class="form-group" align="right">
			
			<div class="input-group">
				{{ Form::text('q7_q112',Input::old('q7_q112'),array('class'=>'form-control')) }}
			</div>

		</div>


	</td>
	
	<td>
		<div class="form-group" align="right">
			
			<div class="input-group">
				{{ Form::select('q7_q111',array('1'=>'1','2'=>'2','3'=>'3','4'=>'4','5'=>'5'),Input::old('q7_q111'),array('class'=>'form-control')) }}
			</div>

		</div>

	</td>
	
	<td>{{$data['q6r11']}}</td>
	
</tr><tr>
	

	
	<td>

		<div class="form-group" align="right">
			
			<div class="input-group">
				{{ Form::text('q7_q122',Input::old('q7_q122'),array('class'=>'form-control')) }}
			</div>

		</div>


	</td>
	<td>
		<div class="form-group" align="right">
			
			<div class="input-group">
				{{ Form::select('q7_q121',array('1'=>'1','2'=>'2','3'=>'3','4'=>'4','5'=>'5'),Input::old('q7_q121'),array('class'=>'form-control')) }}
			</div>

		</div>

	</td>
	<td>{{$data['q6r12']}}</td>
	
</tr><tr>
	

	
	<td>

		<div class="form-group" align="right">
			
			<div class="input-group">
				{{ Form::text('q7_q132',Input::old('q7_q132'),array('class'=>'form-control')) }}
			</div>

		</div>


	</td>
	
	<td>
		<div class="form-group" align="right">
			
			<div class="input-group">
				{{ Form::select('q7_q131',array('1'=>'1','2'=>'2','3'=>'3','4'=>'4','5'=>'5'),Input::old('q7_q131'),array('class'=>'form-control')) }}
			</div>

		</div>

	</td>
	
	<td>{{$data['q6r13']}}</td>
	
</tr><tr>
	

	
	<td>

		<div class="form-group" align="right">
			
			<div class="input-group">
				{{ Form::text('q7_q142',Input::old('q7_q142'),array('class'=>'form-control')) }}
			</div>

		</div>


	</td>
	
	<td>
		<div class="form-group" align="right">
			
			<div class="input-group">
				{{ Form::select('q7_q141',array('1'=>'1','2'=>'2','3'=>'3','4'=>'4','5'=>'5'),Input::old('q7_q141'),array('class'=>'form-control')) }}
			</div>

		</div>

	</td>
	
	<td>{{$data['q6r14']}}</td>
</tr><tr>
	

	
	<td>

		<div class="form-group" align="right">
			
			<div class="input-group">
				{{ Form::text('q7_q152',Input::old('q7_q152'),array('class'=>'form-control')) }}
			</div>

		</div>


	</td>
	
	<td>
		<div class="form-group" align="right">
			
			<div class="input-group">
				{{ Form::select('q7_q151',array('1'=>'1','2'=>'2','3'=>'3','4'=>'4','5'=>'5'),Input::old('q7_q151'),array('class'=>'form-control')) }}
			</div>

		</div>

	</td>
	
	<td>{{$data['q6r15']}}</td>
	
</tr><tr>
	

	
	<td>

		<div class="form-group" align="right">
			
			<div class="input-group">
				{{ Form::text('q7_q162',Input::old('q7_q162'),array('class'=>'form-control')) }}
			</div>

		</div>


	</td>
	
	<td>
		<div class="form-group" align="right">
			
			<div class="input-group">
				{{ Form::select('q7_q161',array('1'=>'1','2'=>'2','3'=>'3','4'=>'4','5'=>'5'),Input::old('q7_q161'),array('class'=>'form-control')) }}
			</div>

		</div>

	</td>
	
	<td>{{$data['q6r16']}}</td>
	
</tr>
</tbody>
</table>
</div>
</div>
</div>
</div>

@if(Auth::user()->company != 18)


 <div class="panel panel-default">
                        <div class="panel-heading">

<div class="form-group" align="right">
	{{ Form::label('q8',$data['q7']) }}
</div>
<div class="panel-body" align="right">
	<div class="input-group">
		 <div class="q8_b">{{$data['q7b']}} {{ Form::number('q8_years',Input::old('years'))}} {{ $data['q7a']}}</div> {{$data['yes']}} {{ Form::radio('q8', 'yes') }}<br />

		 {{$data['no']}} {{ Form::radio('q8', 'no') }}<br />
		

    



	</div>
</div>
</div>
</div>

@endif

<div class="q8_a">




 <div class="panel panel-default">
	<div class="panel-heading">
		{{ $data['parta'] }}
	</div>
	<div class="panel-body" align="right">

	
	
	
	
	
	
	
	
	<div class="panel panel-default">
                        <div class="panel-heading">

<div class="form-group" align="right">
	{{ Form::label('Q9',$data['qa1']) }}
</div>


<div class="panel-body" align="right">
<div class="table-responsive">
           <table class="table">
<thead>
       <tr>
                   <th>{{$data['qa1th3']}}</th>
                   <th>{{$data['qa1th2']}}</th>
                   <th>{{$data['qa1th1']}}</th>
       </tr>
</thead>

<tbody>
<tr>
	

	
	<td>

		<div class="form-group" align="right">
			
			<div class="input-group">
				{{ Form::text('qa1_q12',Input::old('qa1_q12'),array('class'=>'form-control')) }}
			</div>

		</div>


	</td>
	
	<td>
		<div class="form-group" align="right">
			
			<div class="input-group">
				{{ Form::select('qa1_q11',array('1'=>'1','2'=>'2','3'=>'3','4'=>'4','5'=>'5'),Input::old('qa1_q11'),array('class'=>'form-control')) }}
			</div>

		</div>

	</td>
	
	<td>{{$data['qa1r1']}}</td>
	
</tr>

<tr>
	

	
	<td>

		<div class="form-group" align="right">
			
			<div class="input-group">
				{{ Form::text('qa1_q22',Input::old('qa1_q22'),array('class'=>'form-control')) }}
			</div>

		</div>


	</td>
	
	<td>
		<div class="form-group" align="right">
			
			<div class="input-group">
				{{ Form::select('qa1_q21',array('1'=>'1','2'=>'2','3'=>'3','4'=>'4','5'=>'5'),Input::old('qa1_q21'),array('class'=>'form-control')) }}
			</div>

		</div>

	</td>
	
	<td>{{$data['qa1r2']}}</td>
	
</tr><tr>
	

	
	<td>

		<div class="form-group" align="right">
			
			<div class="input-group">
				{{ Form::text('qa1_q32',Input::old('qa1_q32'),array('class'=>'form-control')) }}
			</div>

		</div>


	</td>
	
	<td>
		<div class="form-group" align="right">
			
			<div class="input-group">
				{{ Form::select('qa1_q31',array('1'=>'1','2'=>'2','3'=>'3','4'=>'4','5'=>'5'),Input::old('qa1_q31'),array('class'=>'form-control')) }}
			</div>

		</div>

	</td>
	
	<td>{{$data['qa1r3']}}</td>
	
</tr><tr>
	

	
	<td>

		<div class="form-group" align="right">
			
			<div class="input-group">
				{{ Form::text('qa1_q42',Input::old('qa1_q42'),array('class'=>'form-control')) }}
			</div>

		</div>


	</td>
	
	<td>
		<div class="form-group" align="right">
			
			<div class="input-group">
				{{ Form::select('qa1_q41',array('1'=>'1','2'=>'2','3'=>'3','4'=>'4','5'=>'5'),Input::old('qa1_q41'),array('class'=>'form-control')) }}
			</div>

		</div>

	</td>
	
	<td>{{$data['qa1r4']}}</td>
	
</tr><tr>
	

	
	<td>

		<div class="form-group" align="right">
			
			<div class="input-group">
				{{ Form::text('qa1_q52',Input::old('qa1_q52'),array('class'=>'form-control')) }}
			</div>

		</div>


	</td>
	<td>
		<div class="form-group" align="right">
			
			<div class="input-group">
				{{ Form::select('qa1_q51',array('1'=>'1','2'=>'2','3'=>'3','4'=>'4','5'=>'5'),Input::old('qa1_q51'),array('class'=>'form-control')) }}
			</div>

		</div>

	</td>
	
	<td>{{$data['qa1r5']}}</td>
	
</tr><tr>
	


	<td>

		<div class="form-group" align="right">
			
			<div class="input-group">
				{{ Form::text('qa1_q62',Input::old('qa1_q62'),array('class'=>'form-control')) }}
			</div>

		</div>


	</td>
	
		<td>
		<div class="form-group" align="right">
			
			<div class="input-group">
				{{ Form::select('qa1_q61',array('1'=>'1','2'=>'2','3'=>'3','4'=>'4','5'=>'5'),Input::old('qa1_q61'),array('class'=>'form-control')) }}
			</div>

		</div>

	</td>
	
	<td>{{$data['qa1r6']}}</td>
	
</tr><tr>
	


	<td>

		<div class="form-group" align="right">
			
			<div class="input-group">
				{{ Form::text('qa1_q72',Input::old('qa1_q72'),array('class'=>'form-control')) }}
			</div>

		</div>


	</td>
		<td>
		<div class="form-group" align="right">
			
			<div class="input-group">
				{{ Form::select('qa1_q71',array('1'=>'1','2'=>'2','3'=>'3','4'=>'4','5'=>'5'),Input::old('qa1_q71'),array('class'=>'form-control')) }}
			</div>

		</div>

	</td>
	
	<td>{{$data['qa1r7']}}</td>
	
</tr><tr>
	

	
	<td>

		<div class="form-group" align="right">
			
			<div class="input-group">
				{{ Form::text('qa1_q82',Input::old('qa1_q82'),array('class'=>'form-control')) }}
			</div>

		</div>


	</td>
	
	<td>
		<div class="form-group" align="right">
			
			<div class="input-group">
				{{ Form::select('qa1_q81',array('1'=>'1','2'=>'2','3'=>'3','4'=>'4','5'=>'5'),Input::old('qa1_q81'),array('class'=>'form-control')) }}
			</div>

		</div>

	</td>
	
	<td>{{$data['qa1r8']}}</td>
	
</tr><tr>
	

	
	<td>

		<div class="form-group" align="right">
			
			<div class="input-group">
				{{ Form::text('qa1_q92',Input::old('qa1_q92'),array('class'=>'form-control')) }}
			</div>

		</div>


	</td>
	
	<td>
		<div class="form-group" align="right">
			
			<div class="input-group">
				{{ Form::select('qa1_q91',array('1'=>'1','2'=>'2','3'=>'3','4'=>'4','5'=>'5'),Input::old('qa1_q91'),array('class'=>'form-control')) }}
			</div>

		</div>

	</td>
	
	<td>{{$data['qa1r9']}}</td>
	
</tr><tr>
	

	
	<td>

		<div class="form-group" align="right">
			
			<div class="input-group">
				{{ Form::text('qa1_q102',Input::old('qa1_q102'),array('class'=>'form-control')) }}
			</div>

		</div>


	</td>
	
	<td>
		<div class="form-group" align="right">
			
			<div class="input-group">
				{{ Form::select('qa1_q101',array('1'=>'1','2'=>'2','3'=>'3','4'=>'4','5'=>'5'),Input::old('qa1_q101'),array('class'=>'form-control')) }}
			</div>

		</div>

	</td>
	
	<td>{{$data['qa1r10']}}</td>
	
</tr><tr>
	


	<td>

		<div class="form-group" align="right">
			
			<div class="input-group">
				{{ Form::text('qa1_q112',Input::old('qa1_q112'),array('class'=>'form-control')) }}
			</div>

		</div>


	</td>
	
		<td>
		<div class="form-group" align="right">
			
			<div class="input-group">
				{{ Form::select('qa1_q111',array('1'=>'1','2'=>'2','3'=>'3','4'=>'4','5'=>'5'),Input::old('qa1_q111'),array('class'=>'form-control')) }}
			</div>

		</div>

	</td>
	
	<td>{{$data['qa1r11']}}</td>
	
</tr>
</tbody>
</table>
</div>
</div>
</div>
</div>






<div class="panel panel-default">
                        <div class="panel-heading">

<div class="form-group" align="right">
	{{ Form::label('Q9',$data['qa2']) }}
</div>


<div class="panel-body" align="right">
<div class="table-responsive">
           <table class="table">
<thead>
       <tr>
                   <th>{{$data['qa2th3']}}</th>
                   <th class="col-md-3">{{$data['qa2th2']}}</th>
                   <th class="col-md-3">{{$data['qa2th1']}}</th>
       </tr>
</thead>

<tbody>
<tr>
	

	
	<td>

		<div class="form-group" align="right">
			
			<div class="input-group">
				{{ Form::text('qa2_q12',Input::old('qa2_q12'),array('class'=>'form-control')) }}
			</div>

		</div>


	</td>
	
	<td>
		<div class="form-group" align="right">
			
			<div class="input-group">
				{{ Form::select('qa2_q11',array('1'=>'1','2'=>'2','3'=>'3','4'=>'4','5'=>'5'),Input::old('qa2_q11'),array('class'=>'form-control')) }}
			</div>

		</div>

	</td>
	
	<td>{{$data['qa2r1']}}</td>
	
</tr>

<tr>
	

	
	<td>

		<div class="form-group" align="right">
			
			<div class="input-group">
				{{ Form::text('qa2_q22',Input::old('qa2_q22'),array('class'=>'form-control')) }}
			</div>

		</div>


	</td>
	<td>
		<div class="form-group" align="right">
			
			<div class="input-group">
				{{ Form::select('qa2_q21',array('1'=>'1','2'=>'2','3'=>'3','4'=>'4','5'=>'5'),Input::old('qa2_q21'),array('class'=>'form-control')) }}
			</div>

		</div>

	</td>
	
	<td>{{$data['qa2r2']}}</td>
	
</tr><tr>
	

	
	<td>

		<div class="form-group" align="right">
			
			<div class="input-group">
				{{ Form::text('qa2_q32',Input::old('qa2_q32'),array('class'=>'form-control')) }}
			</div>

		</div>


	</td>
	
	<td>
		<div class="form-group" align="right">
			
			<div class="input-group">
				{{ Form::select('qa2_q31',array('1'=>'1','2'=>'2','3'=>'3','4'=>'4','5'=>'5'),Input::old('qa2_q31'),array('class'=>'form-control')) }}
			</div>

		</div>

	</td>
	
	<td>{{$data['qa2r3']}}</td>
	
</tr><tr>
	

	
	<td>

		<div class="form-group" align="right">
			
			<div class="input-group">
				{{ Form::text('qa2_q42',Input::old('qa2_q42'),array('class'=>'form-control')) }}
			</div>

		</div>


	</td>
	<td>
		<div class="form-group" align="right">
			
			<div class="input-group">
				{{ Form::select('qa2_q41',array('1'=>'1','2'=>'2','3'=>'3','4'=>'4','5'=>'5'),Input::old('qa2_q41'),array('class'=>'form-control')) }}
			</div>

		</div>

	</td>
	
	<td>{{$data['qa2r4']}}</td>
	
</tr><tr>
	

	
	<td>

		<div class="form-group" align="right">
			
			<div class="input-group">
				{{ Form::text('qa2_q52',Input::old('qa2_q52'),array('class'=>'form-control')) }}
			</div>

		</div>


	</td>
	
	<td>
		<div class="form-group" align="right">
			
			<div class="input-group">
				{{ Form::select('qa2_q51',array('1'=>'1','2'=>'2','3'=>'3','4'=>'4','5'=>'5'),Input::old('qa2_q51'),array('class'=>'form-control')) }}
			</div>

		</div>

	</td>
	
	<td>{{$data['qa2r5']}}</td>
	
</tr><tr>
	

	
	<td>

		<div class="form-group" align="right">
			
			<div class="input-group">
				{{ Form::text('qa2_q62',Input::old('qa2_q62'),array('class'=>'form-control')) }}
			</div>

		</div>


	</td>
	
	<td>
		<div class="form-group" align="right">
			
			<div class="input-group">
				{{ Form::select('qa2_q61',array('1'=>'1','2'=>'2','3'=>'3','4'=>'4','5'=>'5'),Input::old('qa2_q61'),array('class'=>'form-control')) }}
			</div>

		</div>

	</td>
	
	<td>{{$data['qa2r6']}}</td>
	
</tr><tr>
	

	
	<td>

		<div class="form-group" align="right">
			
			<div class="input-group">
				{{ Form::text('qa2_q72',Input::old('qa2_q72'),array('class'=>'form-control')) }}
			</div>

		</div>


	</td>
	<td>
		<div class="form-group" align="right">
			
			<div class="input-group">
				{{ Form::select('qa2_q71',array('1'=>'1','2'=>'2','3'=>'3','4'=>'4','5'=>'5'),Input::old('qa2_q71'),array('class'=>'form-control')) }}
			</div>

		</div>

	</td>
	
	<td>{{$data['qa2r7']}}</td>
	
</tr><tr>
	

	
	<td>

		<div class="form-group" align="right">
			
			<div class="input-group">
				{{ Form::text('qa2_q82',Input::old('qa2_q82'),array('class'=>'form-control')) }}
			</div>

		</div>


	</td>
	<td>
		<div class="form-group" align="right">
			
			<div class="input-group">
				{{ Form::select('qa2_q81',array('1'=>'1','2'=>'2','3'=>'3','4'=>'4','5'=>'5'),Input::old('qa2_q81'),array('class'=>'form-control')) }}
			</div>

		</div>

	</td>
	
	<td>{{$data['qa2r8']}}</td>
	
</tr><tr>
	

	
	<td>

		<div class="form-group" align="right">
			
			<div class="input-group">
				{{ Form::text('qa2_q92',Input::old('qa2_q92'),array('class'=>'form-control')) }}
			</div>

		</div>


	</td>
	<td>
		<div class="form-group" align="right">
			
			<div class="input-group">
				{{ Form::select('qa2_q91',array('1'=>'1','2'=>'2','3'=>'3','4'=>'4','5'=>'5'),Input::old('qa2_q91'),array('class'=>'form-control')) }}
			</div>

		</div>

	</td>
	
	<td>{{$data['qa2r9']}}</td>
	
</tr><tr>
	

	
	<td>

		<div class="form-group" align="right">
			
			<div class="input-group">
				{{ Form::text('qa2_q102',Input::old('qa2_q102'),array('class'=>'form-control')) }}
			</div>

		</div>


	</td>
	<td>
		<div class="form-group" align="right">
			
			<div class="input-group">
				{{ Form::select('qa2_q101',array('1'=>'1','2'=>'2','3'=>'3','4'=>'4','5'=>'5'),Input::old('qa2_q101'),array('class'=>'form-control')) }}
			</div>

		</div>

	</td>
	
	<td>{{$data['qa2r10']}}</td>
	
</tr><tr>
	

	
	<td>

		<div class="form-group" align="right">
			
			<div class="input-group">
				{{ Form::text('qa2_q112',Input::old('qa2_q112'),array('class'=>'form-control')) }}
			</div>

		</div>


	</td>
	
	<td>
		<div class="form-group" align="right">
			
			<div class="input-group">
				{{ Form::select('qa2_q111',array('1'=>'1','2'=>'2','3'=>'3','4'=>'4','5'=>'5'),Input::old('qa2_q111'),array('class'=>'form-control')) }}
			</div>

		</div>

	</td>
	<td>{{$data['qa2r11']}}</td>
	
</tr><tr>
	

	
	<td>

		<div class="form-group" align="right">
			
			<div class="input-group">
				{{ Form::text('qa2_q122',Input::old('qa2_q122'),array('class'=>'form-control')) }}
			</div>

		</div>


	</td>
	
	<td>
		<div class="form-group" align="right">
			
			<div class="input-group">
				{{ Form::select('qa2_q121',array('1'=>'1','2'=>'2','3'=>'3','4'=>'4','5'=>'5'),Input::old('qa2_q121'),array('class'=>'form-control')) }}
			</div>

		</div>

	</td>
	
	<td>{{$data['qa2r12']}}</td>
	
</tr><tr>
	

	
	<td>

		<div class="form-group" align="right">
			
			<div class="input-group">
				{{ Form::text('qa2_q132',Input::old('qa2_q132'),array('class'=>'form-control')) }}
			</div>

		</div>


	</td>
	
	<td>
		<div class="form-group" align="right">
			
			<div class="input-group">
				{{ Form::select('qa2_q131',array('1'=>'1','2'=>'2','3'=>'3','4'=>'4','5'=>'5'),Input::old('qa2_q131'),array('class'=>'form-control')) }}
			</div>

		</div>

	</td>
	
	<td>{{$data['qa2r13']}}</td>
	
</tr><tr>
	

	
	<td>

		<div class="form-group" align="right">
			
			<div class="input-group">
				{{ Form::text('qa2_q142',Input::old('qa2_q142'),array('class'=>'form-control')) }}
			</div>

		</div>


	</td>
	
	<td>
		<div class="form-group" align="right">
			
			<div class="input-group">
				{{ Form::select('qa2_q141',array('1'=>'1','2'=>'2','3'=>'3','4'=>'4','5'=>'5'),Input::old('qa2_q141'),array('class'=>'form-control')) }}
			</div>

		</div>

	</td>
	
	
	<td>{{$data['qa2r14']}}</td>
	
</tr><tr>
	

	
	<td>

		<div class="form-group" align="right">
			
			<div class="input-group">
				{{ Form::text('qa2_q152',Input::old('qa2_q152'),array('class'=>'form-control')) }}
			</div>

		</div>


	</td>
	
	<td>
		<div class="form-group" align="right">
			
			<div class="input-group">
				{{ Form::select('qa2_q151',array('1'=>'1','2'=>'2','3'=>'3','4'=>'4','5'=>'5'),Input::old('qa2_q151'),array('class'=>'form-control')) }}
			</div>

		</div>

	</td>
	
	<td>{{$data['qa2r15']}}</td>
	
</tr><tr>
	

	
	<td>

		<div class="form-group" align="right">
			
			<div class="input-group">
				{{ Form::text('qa2_q162',Input::old('qa2_q162'),array('class'=>'form-control')) }}
			</div>

		</div>


	</td>
	
	<td>
		<div class="form-group" align="right">
			
			<div class="input-group">
				{{ Form::select('qa2_q161',array('1'=>'1','2'=>'2','3'=>'3','4'=>'4','5'=>'5'),Input::old('qa2_q161'),array('class'=>'form-control')) }}
			</div>

		</div>

	</td>
	
	<td>{{$data['qa2r16']}}</td>
	
</tr><tr>
	

	
	<td>

		<div class="form-group" align="right">
			
			<div class="input-group">
				{{ Form::text('qa2_q172',Input::old('qa2_q172'),array('class'=>'form-control')) }}
			</div>

		</div>


	</td>
	
	<td>
		<div class="form-group" align="right">
			
			<div class="input-group">
				{{ Form::select('qa2_q171',array('1'=>'1','2'=>'2','3'=>'3','4'=>'4','5'=>'5'),Input::old('qa2_q171'),array('class'=>'form-control')) }}
			</div>

		</div>

	</td>
	
	
	<td>{{$data['qa2r17']}}</td>
	
</tr><tr>
	

	
	<td>

		<div class="form-group" align="right">
			
			<div class="input-group">
				{{ Form::text('qa2_q182',Input::old('qa2_q182'),array('class'=>'form-control')) }}
			</div>

		</div>


	</td>
	
	<td>
		<div class="form-group" align="right">
			
			<div class="input-group">
				{{ Form::select('qa2_q181',array('1'=>'1','2'=>'2','3'=>'3','4'=>'4','5'=>'5'),Input::old('qa2_q181'),array('class'=>'form-control')) }}
			</div>

		</div>

	</td>
	
	
	<td>{{$data['qa2r18']}}</td>
	
</tr>
</tbody>
</table>
</div>
</div>
</div>
</div>







<div class="panel panel-default">
                        <div class="panel-heading">

<div class="form-group" align="right">
	{{ Form::label('qa3',$data['qa3']) }}
</div>
<div class="panel-body" align="right">
	<div class="input-group">
		  {{$data['qa3a']}} {{ Form::radio('qa3', '1') }}<br />

		  {{$data['qa3b']}} {{ Form::radio('qa3', '2') }}<br />

		  {{$data['qa3c']}} {{ Form::radio('qa3', '3') }}<br />

		  {{$data['qa3d']}} {{ Form::radio('qa3', '4') }}<br />
		
		  {{$data['qa3e']}} {{ Form::radio('qa3', '5') }}
	</div>
</div>
</div>
</div>
	
	
	
	
	
	
	
	
	
	
	
	</div>
</div>











<!-- end of q8_a -->
</div>
<div class="q8_b">

 <div class="panel panel-default">
	<div class="panel-heading">
		{{$data['partb']}}
	</div>
	<div class="panel-body" align="right">
	
	
	
	
	
	
	
	
	
	
	<div class="panel panel-default">
                        <div class="panel-heading">

<div class="form-group" align="right">
	{{ Form::label('qb1',$data['qb1']) }}

</div>
<div class="panel-body" align="right">
	<div class="input-group">
	{{ Form::select('qb1',array(''=>$data['select'],'0'=>'0%','5'=>'5%','10'=>'10%','15'=>'15%','20'=>'20%','25'=>'25%','30'=>'30%','35'=>'35%','40'=>'40%','45'=>'45%','50'=>'50%','55'=>'55%','60'=>'60%','65'=>'65%','70'=>'70%','75'=>'75%','80'=>'80%','85'=>'85%','90'=>'90%','95'=>'95%','100'=>'100%'),Input::old('qb1'),array('class'=>'form-control')) }}
	</div>
</div>
</div>
</div>


 <div class="panel panel-default">
                        <div class="panel-heading">

<div class="form-group" align="right">
	{{ Form::label('qb2',$data['qb2']) }}
</div>
<div class="panel-body" align="right">
	<div class="input-group">
		  {{$data['qb2a']}} {{ Form::radio('qb2', '1') }}<br />

		  {{$data['qb2b']}} {{ Form::radio('qb2', '2') }}<br />

		  {{$data['qb2c']}} {{ Form::radio('qb2', '3') }}<br />

		  {{$data['qb2d']}} {{ Form::radio('qb2', '4') }}

	</div>
</div>
</div>
</div>





<div class="panel panel-default">
                        <div class="panel-heading">

<div class="form-group" align="right">
	{{ Form::label('Q9',$data['qb3']) }}
</div>


<div class="panel-body" align="right">
<div class="table-responsive">
           <table class="table">
<thead>
       <tr>
                   <th>{{$data['qb3th3']}}</th>
                   <th>{{$data['qb3th2']}}</th>
                   <th>{{$data['qb3th1']}}</th>
       </tr>
</thead>

<tbody>
<tr>
	

	
	<td>

		<div class="form-group" align="right">
			
			<div class="input-group">
				{{ Form::text('qb3_q12',Input::old('qb3_q12'),array('class'=>'form-control')) }}
			</div>

		</div>


	</td>
	
	<td>
		<div class="form-group" align="right">
			
			<div class="input-group">
		{{ Form::radio('qb3_q11', '1') }} {{$data['yes']}}
		{{ Form::radio('qb3_q11', '0') }} {{$data['no']}}
			</div>

		</div>

	</td>
	
	<td>{{$data['qb3r1']}}</td>
	
</tr>

<tr>
	

	
	<td>

		<div class="form-group" align="right">
			
			<div class="input-group">
				{{ Form::text('qb3_q22',Input::old('qb3_q22'),array('class'=>'form-control')) }}
			</div>

		</div>


	</td>
	
	<td>
		<div class="form-group" align="right">
			
			<div class="input-group">
		{{ Form::radio('qb3_q21', '1') }} {{$data['yes']}}
		{{ Form::radio('qb3_q21', '0') }} {{$data['no']}}
			</div>

		</div>

	</td>
	
	
	<td>{{$data['qb3r2']}}</td>
	
</tr>
<tr>
	

	
	<td>

		<div class="form-group" align="right">
			
			<div class="input-group">
				{{ Form::text('qb3_q32',Input::old('qb3_q32'),array('class'=>'form-control')) }}
			</div>

		</div>


	</td>
	
	<td>
		<div class="form-group" align="right">
			
			<div class="input-group">
		{{ Form::radio('qb3_q31', '1') }} {{$data['yes']}}
		{{ Form::radio('qb3_q31', '0') }} {{$data['no']}}
			</div>

		</div>

	</td>
	
	
	<td>{{$data['qb3r3']}}</td>
	
</tr>
<tr>
	

	
	<td>

		<div class="form-group" align="right">
			
			<div class="input-group">
				{{ Form::text('qb3_q42',Input::old('qb3_q42'),array('class'=>'form-control')) }}
			</div>

		</div>


	</td>
	
	<td>
		<div class="form-group" align="right">
			
			<div class="input-group">
		{{ Form::radio('qb3_q41', '1') }} {{$data['yes']}}
		{{ Form::radio('qb3_q41', '0') }} {{$data['no']}}
			</div>

		</div>

	</td>
	
	
	<td>{{$data['qb3r4']}}</td>
	
</tr>
<tr>
	

	
	<td>

		<div class="form-group" align="right">
			
			<div class="input-group">
				{{ Form::text('qb3_q52',Input::old('qb3_q52'),array('class'=>'form-control')) }}
			</div>

		</div>


	</td>
	
	<td>
		<div class="form-group" align="right">
			
			<div class="input-group">
		{{ Form::radio('qb3_q51', '1') }} {{$data['yes']}}
		{{ Form::radio('qb3_q51', '0') }} {{$data['no']}}
			</div>

		</div>

	</td>
	
	
	<td>{{$data['qb3r5']}}</td>
	
</tr>
<tr>
	

	
	<td>

		<div class="form-group" align="right">
			
			<div class="input-group">
				{{ Form::text('qb3_q62',Input::old('qb3_q62'),array('class'=>'form-control')) }}
			</div>

		</div>


	</td>
	
	<td>
		<div class="form-group" align="right">
			
			<div class="input-group">
		{{ Form::radio('qb3_q61', '1') }} {{$data['yes']}}
		{{ Form::radio('qb3_q61', '0') }} {{$data['no']}}
			</div>

		</div>

	</td>
	
	<td>{{$data['qb3r6']}}</td>
	
</tr>
<tr>
	

	
	<td>

		<div class="form-group" align="right">
			
			<div class="input-group">
				{{ Form::text('qb3_q72',Input::old('qb3_q72'),array('class'=>'form-control')) }}
			</div>

		</div>


	</td>
	
	<td>
		<div class="form-group" align="right">
			
			<div class="input-group">
		{{ Form::radio('qb3_q71', '1') }} {{$data['yes']}}
		{{ Form::radio('qb3_q71', '0') }} {{$data['no']}}
			</div>

		</div>

	</td>
	
	<td>{{$data['qb3r7']}}</td>
	
</tr>
<tr>
	

	
	<td>

		<div class="form-group" align="right">
			
			<div class="input-group">
				{{ Form::text('qb3_q82',Input::old('qb3_q82'),array('class'=>'form-control')) }}
			</div>

		</div>


	</td>
	
	
	<td>
		<div class="form-group" align="right">
			
			<div class="input-group">
		{{ Form::radio('qb3_q81', '1') }} {{$data['yes']}}
		{{ Form::radio('qb3_q81', '0') }} {{$data['no']}}
			</div>

		</div>

	</td>
	
	<td>{{$data['qb3r8']}}</td>
	
</tr>
<tr>
	

	
	<td>

		<div class="form-group" align="right">
			
			<div class="input-group">
				{{ Form::text('qb3_q92',Input::old('qb3_q92'),array('class'=>'form-control')) }}
			</div>

		</div>


	</td>
	
	<td>
		<div class="form-group" align="right">
			
			<div class="input-group">
		{{ Form::radio('qb3_q91', '1') }} {{$data['yes']}}
		{{ Form::radio('qb3_q91', '0') }} {{$data['no']}}
			</div>

		</div>

	</td>
	
	
	<td>{{$data['qb3r9']}}</td>
	
</tr>
<tr>
	

	
	<td>

		<div class="form-group" align="right">
			
			<div class="input-group">
				{{ Form::text('qb3_q102',Input::old('qb3_q102'),array('class'=>'form-control')) }}
			</div>

		</div>


	</td>
	
	<td>
		<div class="form-group" align="right">
			
			<div class="input-group">
		{{ Form::radio('qb3_q101', '1') }} {{$data['yes']}}
		{{ Form::radio('qb3_q101', '0') }} {{$data['no']}}
			</div>

		</div>

	</td>
	
	<td>{{$data['qb3r10']}}</td>
	
</tr>
<tr>
	

	
	<td>

		<div class="form-group" align="right">
			
			<div class="input-group">
				{{ Form::text('qb3_q112',Input::old('qb3_q112'),array('class'=>'form-control')) }}
			</div>

		</div>


	</td>
	
	<td>
		<div class="form-group" align="right">
			
			<div class="input-group">
		{{ Form::radio('qb3_q111', '1') }} {{$data['yes']}}
		{{ Form::radio('qb3_q111', '0') }} {{$data['no']}}
			</div>

		</div>

	</td>
	
	<td>{{$data['qb3r11']}}</td>
	
</tr>
<tr>
	

	
	<td>

		<div class="form-group" align="right">
			
			<div class="input-group">
				{{ Form::text('qb3_q122',Input::old('qb3_q122'),array('class'=>'form-control')) }}
			</div>

		</div>


	</td>
	
	<td>
		<div class="form-group" align="right">
			
			<div class="input-group">
		{{ Form::radio('qb3_q121', '1') }} {{$data['yes']}}
		{{ Form::radio('qb3_q121', '0') }} {{$data['no']}}
			</div>

		</div>

	</td>
	
	<td>{{$data['qb3r12']}}</td>
	
</tr>
<tr>
	

	
	<td>

		<div class="form-group" align="right">
			
			<div class="input-group">
				{{ Form::text('qb3_q132',Input::old('qb3_q132'),array('class'=>'form-control')) }}
			</div>

		</div>


	</td>
	
	<td>
		<div class="form-group" align="right">
			
			<div class="input-group">
		{{ Form::radio('qb3_q131', '1') }} {{$data['yes']}}
		{{ Form::radio('qb3_q131', '0') }} {{$data['no']}}
			</div>

		</div>

	</td>
	
	<td>{{$data['qb3r13']}}</td>
	
</tr>




</tbody>
</table>
</div>
</div>
</div>
</div>
	
	
	
	
	
	
	
	
	
	
	
	
	

	</div>
</div>


 







<!-- end of q8_b -->
</div>


{{ Form::submit('Submit the Survey!',array('class'=>'btn btn-outline btn-primary btn-lg btn-block')) }}

{{ Form::close() }}


















@else












<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
		    <h1 class="page-header">{{ $data['h1'] }}</h1>

		    @if (Session::has('message'))
		    	<div class="alert alert-info">{{ Session::get('message') }}</div>
		    @endif
		
		                  </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
		<div class="col-lg-12">

{{HTML::ul($errors->all()) }} 


{{Form::open(array('url'=>'answers/store')) }}

{{ Form::hidden('q0', Auth::user()->company) }}

{{ Form::hidden('q1', Auth::user()->country) }}
{{ Form::hidden('language', $data['language']) }}


@if(Auth::user()->company != 18)

<div class="panel panel-default">
                        <div class="panel-heading">
<div class="form-group">
	{{ Form::label('q2',$data['q1']) }}
</div>
<div class="panel-body">
	<div class="input-group">
		{{ Form::number('q2',Input::old('q2'),array('class'=>'form-control'))}}<span class="input-group-addon">{{ $data['employee'] }}</span>
	</div>
</div>
</div>
</div>


@endif



 <div class="panel panel-default">
                        <div class="panel-heading">

<div class="form-group">
	{{ Form::label('q3',$data['q2']) }}

</div>
<div class="panel-body">
	<div class="input-group">
	{{ Form::select('q3',array(''=>$data['select'],'0'=>'0%','5'=>'5%','10'=>'10%','15'=>'15%','20'=>'20%','25'=>'25%','30'=>'30%','35'=>'35%','40'=>'40%','45'=>'45%','50'=>'50%','55'=>'55%','60'=>'60%','65'=>'65%','70'=>'70%','75'=>'75%','80'=>'80%','85'=>'85%','90'=>'90%','95'=>'95%','100'=>'100%'),Input::old('q3'),array('class'=>'form-control')) }}
	</div>
</div>
</div>
</div>



 <div class="panel panel-default">
                        <div class="panel-heading">

<div class="form-group">
	{{ Form::label('q4',$data['q3']) }}
</div>
<div class="panel-body">
	<div class="input-group">
		{{ Form::radio('q4', '1') }} {{ $data['q3a'] }}<br />

		{{ Form::radio('q4', '2') }} {{ $data['q3b']}}<br />

		{{ Form::radio('q4', '3') }} {{ $data['q3c']}}<br />

		{{ Form::radio('q4', '4') }} {{ $data['q3d']}}<br />

		{{ Form::radio('q4', '5') }} {{ $data['q3e']}}

	</div>
</div>
</div>
</div>



 <div class="panel panel-default">
                        <div class="panel-heading">

<div class="form-group">
	{{ Form::label('q5',$data['q4']) }}
</div>
<div class="panel-body">
	<div class="input-group">
		{{ Form::radio('q5', '1') }} {{ $data['q4a']}}<br />

		{{ Form::radio('q5', '2') }} {{$data['q4b']}}<br />

		{{ Form::radio('q5', '3') }} {{ $data['q4c']}}<br />

		{{ Form::radio('q5', '4') }} {{$data['q4d']}}<br />

		{{ Form::radio('q5', '5') }} {{$data['q4e']}}

	</div>
</div>
</div>
</div>





 <div class="panel panel-default">
                        <div class="panel-heading">

<div class="form-group">
	{{ Form::label('Q9',$data['q5']) }}
</div>


<div class="panel-body">
<div class="table-responsive">
           <table class="table">
<thead>
       <tr>
                   <th>{{$data['q5th1']}}</th>
                   <th>{{$data['q5th2']}}</th>
                   <th>{{$data['q5th3']}}</th>
                   <th>{{$data['q5th4']}}</th>
                   <th>{{$data['q5th5']}}</th>
       </tr>
</thead>
<tbody>
<tr>
	<td>{{$data['q5r1']}}</td>
	<td>
		<div class="form-group">
			
			<div class="input-group">
				{{ Form::select('q6_q11',array(''=>$data['select'],'0'=>'0%','5'=>'5%','10'=>'10%','15'=>'15%','20'=>'20%','25'=>'25%','30'=>'30%','35'=>'35%','40'=>'40%','45'=>'45%','50'=>'50%','55'=>'55%','60'=>'60%','65'=>'65%','70'=>'70%','75'=>'75%','80'=>'80%','85'=>'85%','90'=>'90%','95'=>'95%','100'=>'100%'),Input::old('q6_q11'),array('class'=>'form-control')) }}
			</div>

		</div>

	</td>
	<td>
		<div class="form-group">
			
			<div class="input-group">
				{{ Form::select('q6_q12',array(''=>$data['o1x'], '1'=>$data['o1a'],'2'=>$data['o1b'],'3'=>$data['o1c'],'4'=>$data['o1d'],'5'=>$data['o1e']),Input::old('q6_q12'),array('class'=>'form-control')) }}
			</div>

		</div>



	</td>
	<td>

		<div class="form-group">
			
			<div class="input-group">
				{{ Form::select('q6_q13',array(''=>$data['o2x'], '1'=>$data['o2a'],'2'=>$data['o2b'],'3'=>$data['o2c'],'4'=>$data['o2d'],'5'=>$data['o2e']),Input::old('q6_q13'),array('class'=>'form-control')) }}
			</div>

		</div>


	</td>
	
	
		<td>

		<div class="form-group">
			
			<div class="input-group">
				{{ Form::text('q6_q14',Input::old('q6_q14'),array('class'=>'form-control')) }}
			</div>

		</div>


	</td>
	
	
</tr>

<tr>
	<td>{{$data['q5r2']}}</td>
	<td>

		<div class="form-group">
			
			<div class="input-group">
				{{ Form::select('q6_q21',array(''=>$data['select'],'0'=>'0%','5'=>'5%','10'=>'10%','15'=>'15%','20'=>'20%','25'=>'25%','30'=>'30%','35'=>'35%','40'=>'40%','45'=>'45%','50'=>'50%','55'=>'55%','60'=>'60%','65'=>'65%','70'=>'70%','75'=>'75%','80'=>'80%','85'=>'85%','90'=>'90%','95'=>'95%','100'=>'100%'),Input::old('q6_q21'),array('class'=>'form-control')) }}
			</div>

		</div>

	</td>
	<td>

		<div class="form-group">
			
			<div class="input-group">
				{{ Form::select('q6_q22',array(''=>$data['o1x'], '1'=>$data['o1a'],'2'=>$data['o1b'],'3'=>$data['o1c'],'4'=>$data['o1d'],'5'=>$data['o1e']),Input::old('q6_q22'),array('class'=>'form-control')) }}
			</div>

		</div>
	</td>
	<td>

		<div class="form-group">
			
			<div class="input-group">
				{{ Form::select('q6_q23',array(''=>$data['o2x'], '1'=>$data['o2a'],'2'=>$data['o2b'],'3'=>$data['o2c'],'4'=>$data['o2d'],'5'=>$data['o2e']),Input::old('q6_q23'),array('class'=>'form-control')) }}
			</div>

		</div>
	
	</td>
	
	
		
		<td>

		<div class="form-group">
			
			<div class="input-group">
				{{ Form::text('q6_q24',Input::old('q6_q24'),array('class'=>'form-control')) }}
			</div>

		</div>


	</td>
	
	
</tr>


<tr>
	<td>{{$data['q5r3']}}</td>
	<td>

		<div class="form-group">
			
			<div class="input-group">
				{{ Form::select('q6_q31',array(''=>$data['select'],'0'=>'0%','5'=>'5%','10'=>'10%','15'=>'15%','20'=>'20%','25'=>'25%','30'=>'30%','35'=>'35%','40'=>'40%','45'=>'45%','50'=>'50%','55'=>'55%','60'=>'60%','65'=>'65%','70'=>'70%','75'=>'75%','80'=>'80%','85'=>'85%','90'=>'90%','95'=>'95%','100'=>'100%'),Input::old('q6_q31'),array('class'=>'form-control')) }}
			</div>

		</div>

	</td>
	<td>

		<div class="form-group">
			
			<div class="input-group">
				{{ Form::select('q6_q32',array(''=>$data['o1x'], '1'=>$data['o1a'],'2'=>$data['o1b'],'3'=>$data['o1c'],'4'=>$data['o1d'],'5'=>$data['o1e']),Input::old('q6_q32'),array('class'=>'form-control')) }}
			</div>

		</div>
	</td>
	<td>

		<div class="form-group">
			
			<div class="input-group">
				{{ Form::select('q6_q33',array(''=>$data['o2x'], '1'=>$data['o2a'],'2'=>$data['o2b'],'3'=>$data['o2c'],'4'=>$data['o2d'],'5'=>$data['o2e']),Input::old('q6_q33'),array('class'=>'form-control')) }}
			</div>

		</div>
	
	</td>
	
	
		
		<td>

		<div class="form-group">
			
			<div class="input-group">
				{{ Form::text('q6_q34',Input::old('q6_q34'),array('class'=>'form-control')) }}
			</div>

		</div>


	</td>
	
	
</tr>

<tr>
	<td>{{$data['q5r4']}}</td>
	<td>

		<div class="form-group">
			
			<div class="input-group">
				{{ Form::select('q6_q41',array(''=>$data['select'],'0'=>'0%','5'=>'5%','10'=>'10%','15'=>'15%','20'=>'20%','25'=>'25%','30'=>'30%','35'=>'35%','40'=>'40%','45'=>'45%','50'=>'50%','55'=>'55%','60'=>'60%','65'=>'65%','70'=>'70%','75'=>'75%','80'=>'80%','85'=>'85%','90'=>'90%','95'=>'95%','100'=>'100%'),Input::old('q6_q41'),array('class'=>'form-control')) }}
			</div>

		</div>

	</td>
	<td>

		<div class="form-group">
			
			<div class="input-group">
				{{ Form::select('q6_q42',array(''=>$data['o1x'], '1'=>$data['o1a'],'2'=>$data['o1b'],'3'=>$data['o1c'],'4'=>$data['o1d'],'5'=>$data['o1e']),Input::old('q6_q42'),array('class'=>'form-control')) }}
			</div>

		</div>
	</td>
	<td>

		<div class="form-group">
			
			<div class="input-group">
				{{ Form::select('q6_q43',array(''=>$data['o2x'], '1'=>$data['o2a'],'2'=>$data['o2b'],'3'=>$data['o2c'],'4'=>$data['o2d'],'5'=>$data['o2e']),Input::old('q6_q43'),array('class'=>'form-control')) }}
			</div>

		</div>
	
	</td>
	
	
		
		<td>

		<div class="form-group">
			
			<div class="input-group">
				{{ Form::text('q6_q44',Input::old('q6_q44'),array('class'=>'form-control')) }}
			</div>

		</div>


	</td>
	
	
</tr>



<tr>
	<td>{{$data['q5r5']}}</td>
	<td>
		<div class="form-group">
			
			<div class="input-group">
				{{ Form::select('q6_q51',array(''=>$data['select'],'0'=>'0%','5'=>'5%','10'=>'10%','15'=>'15%','20'=>'20%','25'=>'25%','30'=>'30%','35'=>'35%','40'=>'40%','45'=>'45%','50'=>'50%','55'=>'55%','60'=>'60%','65'=>'65%','70'=>'70%','75'=>'75%','80'=>'80%','85'=>'85%','90'=>'90%','95'=>'95%','100'=>'100%'),Input::old('q6_q51'),array('class'=>'form-control')) }}
			</div>

		</div>


	</td>
	<td>

		<div class="form-group">
			
			<div class="input-group">
				{{ Form::select('q6_q52',array(''=>$data['o1x'], '1'=>$data['o1a'],'2'=>$data['o1b'],'3'=>$data['o1c'],'4'=>$data['o1d'],'5'=>$data['o1e']),Input::old('q6_q52'),array('class'=>'form-control')) }}
			</div>

		</div>

	</td>
	<td>

		<div class="form-group">
			
			<div class="input-group">
				{{ Form::select('q6_q53',array(''=>$data['o2x'], '1'=>$data['o2a'],'2'=>$data['o2b'],'3'=>$data['o2c'],'4'=>$data['o2d'],'5'=>$data['o2e']),Input::old('q6_q53'),array('class'=>'form-control')) }}
			</div>

		</div>

	</td>
	
			<td>

		<div class="form-group">
			
			<div class="input-group">
				{{ Form::text('q6_q54',Input::old('q6_q54'),array('class'=>'form-control')) }}
			</div>

		</div>


	</td>
	
	
</tr>

<tr>
	<td>{{$data['q5r6']}}</td>
	<td>
		<div class="form-group">
			
			<div class="input-group">
				{{ Form::select('q6_q61',array(''=>$data['select'],'0'=>'0%','5'=>'5%','10'=>'10%','15'=>'15%','20'=>'20%','25'=>'25%','30'=>'30%','35'=>'35%','40'=>'40%','45'=>'45%','50'=>'50%','55'=>'55%','60'=>'60%','65'=>'65%','70'=>'70%','75'=>'75%','80'=>'80%','85'=>'85%','90'=>'90%','95'=>'95%','100'=>'100%'),Input::old('q6_q61'),array('class'=>'form-control')) }}
			</div>

		</div>


	</td>
	<td>

		<div class="form-group">
			
			<div class="input-group">
				{{ Form::select('q6_q62',array(''=>$data['o1x'], '1'=>$data['o1a'],'2'=>$data['o1b'],'3'=>$data['o1c'],'4'=>$data['o1d'],'5'=>$data['o1e']),Input::old('q6_q62'),array('class'=>'form-control')) }}
			</div>

		</div>

	</td>
	<td>

		<div class="form-group">
			
			<div class="input-group">
				{{ Form::select('q6_q63',array(''=>$data['o2x'], '1'=>$data['o2a'],'2'=>$data['o2b'],'3'=>$data['o2c'],'4'=>$data['o2d'],'5'=>$data['o2e']),Input::old('q6_q63'),array('class'=>'form-control')) }}
			</div>

		</div>

	</td>
	
			<td>

		<div class="form-group">
			
			<div class="input-group">
				{{ Form::text('q6_q64',Input::old('q6_q64'),array('class'=>'form-control')) }}
			</div>

		</div>


	</td>
	
	
</tr>

</tbody>
</table>
</div>
</div>
</div>
</div>




<div class="panel panel-default">
                        <div class="panel-heading">

<div class="form-group">
	{{ Form::label('Q9',$data['q6']) }}
</div>


<div class="panel-body">
<div class="table-responsive">
           <table class="table">
<thead>
       <tr>
                   <th>{{$data['q6th1']}}</th>
                   <th>{{$data['q6th2']}}</th>
                   <th>{{$data['q6th3']}}</th>
       </tr>
</thead>

<tbody>
<tr>
	<td>{{$data['q6r1']}}</td>

	<td>
		<div class="form-group">
			
			<div class="input-group">
				{{ Form::select('q7_q11',array('1'=>'1','2'=>'2','3'=>'3','4'=>'4','5'=>'5'),Input::old('q7_q11'),array('class'=>'form-control')) }}
			</div>

		</div>

	</td>
	<td>

		<div class="form-group">
			
			<div class="input-group">
				{{ Form::text('q7_q12',Input::old('q7_q12'),array('class'=>'form-control')) }}
			</div>

		</div>


	</td>
	
</tr>

<tr>
	<td>{{$data['q6r2']}}</td>

	<td>
		<div class="form-group">
			
			<div class="input-group">
				{{ Form::select('q7_q21',array('1'=>'1','2'=>'2','3'=>'3','4'=>'4','5'=>'5'),Input::old('q7_q21'),array('class'=>'form-control')) }}
			</div>

		</div>

	</td>
	<td>

		<div class="form-group">
			
			<div class="input-group">
				{{ Form::text('q7_q22',Input::old('q7_q22'),array('class'=>'form-control')) }}
			</div>

		</div>


	</td>
	
</tr><tr>
	<td>{{$data['q6r3']}}</td>

	<td>
		<div class="form-group">
			
			<div class="input-group">
				{{ Form::select('q7_q31',array('1'=>'1','2'=>'2','3'=>'3','4'=>'4','5'=>'5'),Input::old('q7_q31'),array('class'=>'form-control')) }}
			</div>

		</div>

	</td>
	<td>

		<div class="form-group">
			
			<div class="input-group">
				{{ Form::text('q7_q32',Input::old('q7_q32'),array('class'=>'form-control')) }}
			</div>

		</div>


	</td>
	
</tr><tr>
	<td>{{$data['q6r4']}}</td>

	<td>
		<div class="form-group">
			
			<div class="input-group">
				{{ Form::select('q7_q41',array('1'=>'1','2'=>'2','3'=>'3','4'=>'4','5'=>'5'),Input::old('q7_q41'),array('class'=>'form-control')) }}
			</div>

		</div>

	</td>
	<td>

		<div class="form-group">
			
			<div class="input-group">
				{{ Form::text('q7_q42',Input::old('q7_q42'),array('class'=>'form-control')) }}
			</div>

		</div>


	</td>
	
</tr><tr>
	<td>{{$data['q6r5']}}</td>

	<td>
		<div class="form-group">
			
			<div class="input-group">
				{{ Form::select('q7_q51',array('1'=>'1','2'=>'2','3'=>'3','4'=>'4','5'=>'5'),Input::old('q7_q51'),array('class'=>'form-control')) }}
			</div>

		</div>

	</td>
	<td>

		<div class="form-group">
			
			<div class="input-group">
				{{ Form::text('q7_q52',Input::old('q7_q52'),array('class'=>'form-control')) }}
			</div>

		</div>


	</td>
	
</tr><tr>
	<td>{{$data['q6r6']}}</td>

	<td>
		<div class="form-group">
			
			<div class="input-group">
				{{ Form::select('q7_q61',array('1'=>'1','2'=>'2','3'=>'3','4'=>'4','5'=>'5'),Input::old('q7_q61'),array('class'=>'form-control')) }}
			</div>

		</div>

	</td>
	<td>

		<div class="form-group">
			
			<div class="input-group">
				{{ Form::text('q7_q62',Input::old('q7_q62'),array('class'=>'form-control')) }}
			</div>

		</div>


	</td>
	
</tr><tr>
	<td>{{$data['q6r7']}}</td>

	<td>
		<div class="form-group">
			
			<div class="input-group">
				{{ Form::select('q7_q71',array('1'=>'1','2'=>'2','3'=>'3','4'=>'4','5'=>'5'),Input::old('q7_q71'),array('class'=>'form-control')) }}
			</div>

		</div>

	</td>
	<td>

		<div class="form-group">
			
			<div class="input-group">
				{{ Form::text('q7_q72',Input::old('q7_q72'),array('class'=>'form-control')) }}
			</div>

		</div>


	</td>
	
</tr><tr>
	<td>{{$data['q6r8']}}</td>

	<td>
		<div class="form-group">
			
			<div class="input-group">
				{{ Form::select('q7_q81',array('1'=>'1','2'=>'2','3'=>'3','4'=>'4','5'=>'5'),Input::old('q7_q81'),array('class'=>'form-control')) }}
			</div>

		</div>

	</td>
	<td>

		<div class="form-group">
			
			<div class="input-group">
				{{ Form::text('q7_q82',Input::old('q7_q82'),array('class'=>'form-control')) }}
			</div>

		</div>


	</td>
	
</tr><tr>
	<td>{{$data['q6r9']}}</td>

	<td>
		<div class="form-group">
			
			<div class="input-group">
				{{ Form::select('q7_q91',array('1'=>'1','2'=>'2','3'=>'3','4'=>'4','5'=>'5'),Input::old('q7_q91'),array('class'=>'form-control')) }}
			</div>

		</div>

	</td>
	<td>

		<div class="form-group">
			
			<div class="input-group">
				{{ Form::text('q7_q92',Input::old('q7_q92'),array('class'=>'form-control')) }}
			</div>

		</div>


	</td>
	
</tr><tr>
	<td>{{$data['q6r10']}}</td>

	<td>
		<div class="form-group">
			
			<div class="input-group">
				{{ Form::select('q7_q101',array('1'=>'1','2'=>'2','3'=>'3','4'=>'4','5'=>'5'),Input::old('q7_q101'),array('class'=>'form-control')) }}
			</div>

		</div>

	</td>
	<td>

		<div class="form-group">
			
			<div class="input-group">
				{{ Form::text('q7_q102',Input::old('q7_q102'),array('class'=>'form-control')) }}
			</div>

		</div>


	</td>
	
</tr><tr>
	<td>{{$data['q6r11']}}</td>

	<td>
		<div class="form-group">
			
			<div class="input-group">
				{{ Form::select('q7_q111',array('1'=>'1','2'=>'2','3'=>'3','4'=>'4','5'=>'5'),Input::old('q7_q111'),array('class'=>'form-control')) }}
			</div>

		</div>

	</td>
	<td>

		<div class="form-group">
			
			<div class="input-group">
				{{ Form::text('q7_q112',Input::old('q7_q112'),array('class'=>'form-control')) }}
			</div>

		</div>


	</td>
	
</tr><tr>
	<td>{{$data['q6r12']}}</td>

	<td>
		<div class="form-group">
			
			<div class="input-group">
				{{ Form::select('q7_q121',array('1'=>'1','2'=>'2','3'=>'3','4'=>'4','5'=>'5'),Input::old('q7_q121'),array('class'=>'form-control')) }}
			</div>

		</div>

	</td>
	<td>

		<div class="form-group">
			
			<div class="input-group">
				{{ Form::text('q7_q122',Input::old('q7_q122'),array('class'=>'form-control')) }}
			</div>

		</div>


	</td>
	
</tr><tr>
	<td>{{$data['q6r13']}}</td>

	<td>
		<div class="form-group">
			
			<div class="input-group">
				{{ Form::select('q7_q131',array('1'=>'1','2'=>'2','3'=>'3','4'=>'4','5'=>'5'),Input::old('q7_q131'),array('class'=>'form-control')) }}
			</div>

		</div>

	</td>
	<td>

		<div class="form-group">
			
			<div class="input-group">
				{{ Form::text('q7_q132',Input::old('q7_q132'),array('class'=>'form-control')) }}
			</div>

		</div>


	</td>
	
</tr><tr>
	<td>{{$data['q6r14']}}</td>

	<td>
		<div class="form-group">
			
			<div class="input-group">
				{{ Form::select('q7_q141',array('1'=>'1','2'=>'2','3'=>'3','4'=>'4','5'=>'5'),Input::old('q7_q141'),array('class'=>'form-control')) }}
			</div>

		</div>

	</td>
	<td>

		<div class="form-group">
			
			<div class="input-group">
				{{ Form::text('q7_q142',Input::old('q7_q142'),array('class'=>'form-control')) }}
			</div>

		</div>


	</td>
	
</tr><tr>
	<td>{{$data['q6r15']}}</td>

	<td>
		<div class="form-group">
			
			<div class="input-group">
				{{ Form::select('q7_q151',array('1'=>'1','2'=>'2','3'=>'3','4'=>'4','5'=>'5'),Input::old('q7_q151'),array('class'=>'form-control')) }}
			</div>

		</div>

	</td>
	<td>

		<div class="form-group">
			
			<div class="input-group">
				{{ Form::text('q7_q152',Input::old('q7_q152'),array('class'=>'form-control')) }}
			</div>

		</div>


	</td>
	
</tr><tr>
	<td>{{$data['q6r16']}}</td>

	<td>
		<div class="form-group">
			
			<div class="input-group">
				{{ Form::select('q7_q161',array('1'=>'1','2'=>'2','3'=>'3','4'=>'4','5'=>'5'),Input::old('q7_q161'),array('class'=>'form-control')) }}
			</div>

		</div>

	</td>
	<td>

		<div class="form-group">
			
			<div class="input-group">
				{{ Form::text('q7_q162',Input::old('q7_q162'),array('class'=>'form-control')) }}
			</div>

		</div>


	</td>
	
</tr>
</tbody>
</table>
</div>
</div>
</div>
</div>

@if(Auth::user()->company != 18)


 <div class="panel panel-default">
                        <div class="panel-heading">

<div class="form-group">
	{{ Form::label('q8',$data['q7']) }}
</div>
<div class="panel-body">
	<div class="input-group">
		{{ Form::radio('q8', 'yes') }} {{$data['yes']}}<div class="q8_b">{{ $data['q7a']}} {{ Form::number('q8_years',Input::old('years'))}} {{$data['q7b']}}</div><br />

		{{ Form::radio('q8', 'no') }} {{$data['no']}}<br />
		

    



	</div>
</div>
</div>
</div>

@endif

<div class="q8_a">




 <div class="panel panel-default">
	<div class="panel-heading">
		{{ $data['parta'] }}
	</div>
	<div class="panel-body">

	
	
	
	
	
	
	
	
	<div class="panel panel-default">
                        <div class="panel-heading">

<div class="form-group">
	{{ Form::label('Q9',$data['qa1']) }}
</div>


<div class="panel-body">
<div class="table-responsive">
           <table class="table">
<thead>
       <tr>
                   <th>{{$data['qa1th1']}}</th>
                   <th>{{$data['qa1th2']}}</th>
                   <th>{{$data['qa1th3']}}</th>
       </tr>
</thead>

<tbody>
<tr>
	<td>{{$data['qa1r1']}}</td>

	<td>
		<div class="form-group">
			
			<div class="input-group">
				{{ Form::select('qa1_q11',array('1'=>'1','2'=>'2','3'=>'3','4'=>'4','5'=>'5'),Input::old('qa1_q11'),array('class'=>'form-control')) }}
			</div>

		</div>

	</td>
	<td>

		<div class="form-group">
			
			<div class="input-group">
				{{ Form::text('qa1_q12',Input::old('qa1_q12'),array('class'=>'form-control')) }}
			</div>

		</div>


	</td>
	
</tr>

<tr>
	<td>{{$data['qa1r2']}}</td>

	<td>
		<div class="form-group">
			
			<div class="input-group">
				{{ Form::select('qa1_q21',array('1'=>'1','2'=>'2','3'=>'3','4'=>'4','5'=>'5'),Input::old('qa1_q21'),array('class'=>'form-control')) }}
			</div>

		</div>

	</td>
	<td>

		<div class="form-group">
			
			<div class="input-group">
				{{ Form::text('qa1_q22',Input::old('qa1_q22'),array('class'=>'form-control')) }}
			</div>

		</div>


	</td>
	
</tr><tr>
	<td>{{$data['qa1r3']}}</td>

	<td>
		<div class="form-group">
			
			<div class="input-group">
				{{ Form::select('qa1_q31',array('1'=>'1','2'=>'2','3'=>'3','4'=>'4','5'=>'5'),Input::old('qa1_q31'),array('class'=>'form-control')) }}
			</div>

		</div>

	</td>
	<td>

		<div class="form-group">
			
			<div class="input-group">
				{{ Form::text('qa1_q32',Input::old('qa1_q32'),array('class'=>'form-control')) }}
			</div>

		</div>


	</td>
	
</tr><tr>
	<td>{{$data['qa1r4']}}</td>

	<td>
		<div class="form-group">
			
			<div class="input-group">
				{{ Form::select('qa1_q41',array('1'=>'1','2'=>'2','3'=>'3','4'=>'4','5'=>'5'),Input::old('qa1_q41'),array('class'=>'form-control')) }}
			</div>

		</div>

	</td>
	<td>

		<div class="form-group">
			
			<div class="input-group">
				{{ Form::text('qa1_q42',Input::old('qa1_q42'),array('class'=>'form-control')) }}
			</div>

		</div>


	</td>
	
</tr><tr>
	<td>{{$data['qa1r5']}}</td>

	<td>
		<div class="form-group">
			
			<div class="input-group">
				{{ Form::select('qa1_q51',array('1'=>'1','2'=>'2','3'=>'3','4'=>'4','5'=>'5'),Input::old('qa1_q51'),array('class'=>'form-control')) }}
			</div>

		</div>

	</td>
	<td>

		<div class="form-group">
			
			<div class="input-group">
				{{ Form::text('qa1_q52',Input::old('qa1_q52'),array('class'=>'form-control')) }}
			</div>

		</div>


	</td>
	
</tr><tr>
	<td>{{$data['qa1r6']}}</td>

	<td>
		<div class="form-group">
			
			<div class="input-group">
				{{ Form::select('qa1_q61',array('1'=>'1','2'=>'2','3'=>'3','4'=>'4','5'=>'5'),Input::old('qa1_q61'),array('class'=>'form-control')) }}
			</div>

		</div>

	</td>
	<td>

		<div class="form-group">
			
			<div class="input-group">
				{{ Form::text('qa1_q62',Input::old('qa1_q62'),array('class'=>'form-control')) }}
			</div>

		</div>


	</td>
	
</tr><tr>
	<td>{{$data['qa1r7']}}</td>

	<td>
		<div class="form-group">
			
			<div class="input-group">
				{{ Form::select('qa1_q71',array('1'=>'1','2'=>'2','3'=>'3','4'=>'4','5'=>'5'),Input::old('qa1_q71'),array('class'=>'form-control')) }}
			</div>

		</div>

	</td>
	<td>

		<div class="form-group">
			
			<div class="input-group">
				{{ Form::text('qa1_q72',Input::old('qa1_q72'),array('class'=>'form-control')) }}
			</div>

		</div>


	</td>
	
</tr><tr>
	<td>{{$data['qa1r8']}}</td>

	<td>
		<div class="form-group">
			
			<div class="input-group">
				{{ Form::select('qa1_q81',array('1'=>'1','2'=>'2','3'=>'3','4'=>'4','5'=>'5'),Input::old('qa1_q81'),array('class'=>'form-control')) }}
			</div>

		</div>

	</td>
	<td>

		<div class="form-group">
			
			<div class="input-group">
				{{ Form::text('qa1_q82',Input::old('qa1_q82'),array('class'=>'form-control')) }}
			</div>

		</div>


	</td>
	
</tr><tr>
	<td>{{$data['qa1r9']}}</td>

	<td>
		<div class="form-group">
			
			<div class="input-group">
				{{ Form::select('qa1_q91',array('1'=>'1','2'=>'2','3'=>'3','4'=>'4','5'=>'5'),Input::old('qa1_q91'),array('class'=>'form-control')) }}
			</div>

		</div>

	</td>
	<td>

		<div class="form-group">
			
			<div class="input-group">
				{{ Form::text('qa1_q92',Input::old('qa1_q92'),array('class'=>'form-control')) }}
			</div>

		</div>


	</td>
	
</tr><tr>
	<td>{{$data['qa1r10']}}</td>

	<td>
		<div class="form-group">
			
			<div class="input-group">
				{{ Form::select('qa1_q101',array('1'=>'1','2'=>'2','3'=>'3','4'=>'4','5'=>'5'),Input::old('qa1_q101'),array('class'=>'form-control')) }}
			</div>

		</div>

	</td>
	<td>

		<div class="form-group">
			
			<div class="input-group">
				{{ Form::text('qa1_q102',Input::old('qa1_q102'),array('class'=>'form-control')) }}
			</div>

		</div>


	</td>
	
</tr><tr>
	<td>{{$data['qa1r11']}}</td>

	<td>
		<div class="form-group">
			
			<div class="input-group">
				{{ Form::select('qa1_q111',array('1'=>'1','2'=>'2','3'=>'3','4'=>'4','5'=>'5'),Input::old('qa1_q111'),array('class'=>'form-control')) }}
			</div>

		</div>

	</td>
	<td>

		<div class="form-group">
			
			<div class="input-group">
				{{ Form::text('qa1_q112',Input::old('qa1_q112'),array('class'=>'form-control')) }}
			</div>

		</div>


	</td>
	
</tr>
</tbody>
</table>
</div>
</div>
</div>
</div>






<div class="panel panel-default">
                        <div class="panel-heading">

<div class="form-group">
	{{ Form::label('Q9',$data['qa2']) }}
</div>


<div class="panel-body">
<div class="table-responsive">
           <table class="table">
<thead>
       <tr>
                   <th>{{$data['qa2th1']}}</th>
                   <th>{{$data['qa2th2']}}</th>
                   <th>{{$data['qa2th3']}}</th>
       </tr>
</thead>

<tbody>
<tr>
	<td>{{$data['qa2r1']}}</td>

	<td>
		<div class="form-group">
			
			<div class="input-group">
				{{ Form::select('qa2_q11',array('1'=>'1','2'=>'2','3'=>'3','4'=>'4','5'=>'5'),Input::old('qa2_q11'),array('class'=>'form-control')) }}
			</div>

		</div>

	</td>
	<td>

		<div class="form-group">
			
			<div class="input-group">
				{{ Form::text('qa2_q12',Input::old('qa2_q12'),array('class'=>'form-control')) }}
			</div>

		</div>


	</td>
	
</tr>

<tr>
	<td>{{$data['qa2r2']}}</td>

	<td>
		<div class="form-group">
			
			<div class="input-group">
				{{ Form::select('qa2_q21',array('1'=>'1','2'=>'2','3'=>'3','4'=>'4','5'=>'5'),Input::old('qa2_q21'),array('class'=>'form-control')) }}
			</div>

		</div>

	</td>
	<td>

		<div class="form-group">
			
			<div class="input-group">
				{{ Form::text('qa2_q22',Input::old('qa2_q22'),array('class'=>'form-control')) }}
			</div>

		</div>


	</td>
	
</tr><tr>
	<td>{{$data['qa2r3']}}</td>

	<td>
		<div class="form-group">
			
			<div class="input-group">
				{{ Form::select('qa2_q31',array('1'=>'1','2'=>'2','3'=>'3','4'=>'4','5'=>'5'),Input::old('qa2_q31'),array('class'=>'form-control')) }}
			</div>

		</div>

	</td>
	<td>

		<div class="form-group">
			
			<div class="input-group">
				{{ Form::text('qa2_q32',Input::old('qa2_q32'),array('class'=>'form-control')) }}
			</div>

		</div>


	</td>
	
</tr><tr>
	<td>{{$data['qa2r4']}}</td>

	<td>
		<div class="form-group">
			
			<div class="input-group">
				{{ Form::select('qa2_q41',array('1'=>'1','2'=>'2','3'=>'3','4'=>'4','5'=>'5'),Input::old('qa2_q41'),array('class'=>'form-control')) }}
			</div>

		</div>

	</td>
	<td>

		<div class="form-group">
			
			<div class="input-group">
				{{ Form::text('qa2_q42',Input::old('qa2_q42'),array('class'=>'form-control')) }}
			</div>

		</div>


	</td>
	
</tr><tr>
	<td>{{$data['qa2r5']}}</td>

	<td>
		<div class="form-group">
			
			<div class="input-group">
				{{ Form::select('qa2_q51',array('1'=>'1','2'=>'2','3'=>'3','4'=>'4','5'=>'5'),Input::old('qa2_q51'),array('class'=>'form-control')) }}
			</div>

		</div>

	</td>
	<td>

		<div class="form-group">
			
			<div class="input-group">
				{{ Form::text('qa2_q52',Input::old('qa2_q52'),array('class'=>'form-control')) }}
			</div>

		</div>


	</td>
	
</tr><tr>
	<td>{{$data['qa2r6']}}</td>

	<td>
		<div class="form-group">
			
			<div class="input-group">
				{{ Form::select('qa2_q61',array('1'=>'1','2'=>'2','3'=>'3','4'=>'4','5'=>'5'),Input::old('qa2_q61'),array('class'=>'form-control')) }}
			</div>

		</div>

	</td>
	<td>

		<div class="form-group">
			
			<div class="input-group">
				{{ Form::text('qa2_q62',Input::old('qa2_q62'),array('class'=>'form-control')) }}
			</div>

		</div>


	</td>
	
</tr><tr>
	<td>{{$data['qa2r7']}}</td>

	<td>
		<div class="form-group">
			
			<div class="input-group">
				{{ Form::select('qa2_q71',array('1'=>'1','2'=>'2','3'=>'3','4'=>'4','5'=>'5'),Input::old('qa2_q71'),array('class'=>'form-control')) }}
			</div>

		</div>

	</td>
	<td>

		<div class="form-group">
			
			<div class="input-group">
				{{ Form::text('qa2_q72',Input::old('qa2_q72'),array('class'=>'form-control')) }}
			</div>

		</div>


	</td>
	
</tr><tr>
	<td>{{$data['qa2r8']}}</td>

	<td>
		<div class="form-group">
			
			<div class="input-group">
				{{ Form::select('qa2_q81',array('1'=>'1','2'=>'2','3'=>'3','4'=>'4','5'=>'5'),Input::old('qa2_q81'),array('class'=>'form-control')) }}
			</div>

		</div>

	</td>
	<td>

		<div class="form-group">
			
			<div class="input-group">
				{{ Form::text('qa2_q82',Input::old('qa2_q82'),array('class'=>'form-control')) }}
			</div>

		</div>


	</td>
	
</tr><tr>
	<td>{{$data['qa2r9']}}</td>

	<td>
		<div class="form-group">
			
			<div class="input-group">
				{{ Form::select('qa2_q91',array('1'=>'1','2'=>'2','3'=>'3','4'=>'4','5'=>'5'),Input::old('qa2_q91'),array('class'=>'form-control')) }}
			</div>

		</div>

	</td>
	<td>

		<div class="form-group">
			
			<div class="input-group">
				{{ Form::text('qa2_q92',Input::old('qa2_q92'),array('class'=>'form-control')) }}
			</div>

		</div>


	</td>
	
</tr><tr>
	<td>{{$data['qa2r10']}}</td>

	<td>
		<div class="form-group">
			
			<div class="input-group">
				{{ Form::select('qa2_q101',array('1'=>'1','2'=>'2','3'=>'3','4'=>'4','5'=>'5'),Input::old('qa2_q101'),array('class'=>'form-control')) }}
			</div>

		</div>

	</td>
	<td>

		<div class="form-group">
			
			<div class="input-group">
				{{ Form::text('qa2_q102',Input::old('qa2_q102'),array('class'=>'form-control')) }}
			</div>

		</div>


	</td>
	
</tr><tr>
	<td>{{$data['qa2r11']}}</td>

	<td>
		<div class="form-group">
			
			<div class="input-group">
				{{ Form::select('qa2_q111',array('1'=>'1','2'=>'2','3'=>'3','4'=>'4','5'=>'5'),Input::old('qa2_q111'),array('class'=>'form-control')) }}
			</div>

		</div>

	</td>
	<td>

		<div class="form-group">
			
			<div class="input-group">
				{{ Form::text('qa2_q112',Input::old('qa2_q112'),array('class'=>'form-control')) }}
			</div>

		</div>


	</td>
	
</tr><tr>
	<td>{{$data['qa2r12']}}</td>

	<td>
		<div class="form-group">
			
			<div class="input-group">
				{{ Form::select('qa2_q121',array('1'=>'1','2'=>'2','3'=>'3','4'=>'4','5'=>'5'),Input::old('qa2_q121'),array('class'=>'form-control')) }}
			</div>

		</div>

	</td>
	<td>

		<div class="form-group">
			
			<div class="input-group">
				{{ Form::text('qa2_q122',Input::old('qa2_q122'),array('class'=>'form-control')) }}
			</div>

		</div>


	</td>
	
</tr><tr>
	<td>{{$data['qa2r13']}}</td>

	<td>
		<div class="form-group">
			
			<div class="input-group">
				{{ Form::select('qa2_q131',array('1'=>'1','2'=>'2','3'=>'3','4'=>'4','5'=>'5'),Input::old('qa2_q131'),array('class'=>'form-control')) }}
			</div>

		</div>

	</td>
	<td>

		<div class="form-group">
			
			<div class="input-group">
				{{ Form::text('qa2_q132',Input::old('qa2_q132'),array('class'=>'form-control')) }}
			</div>

		</div>


	</td>
	
</tr><tr>
	<td>{{$data['qa2r14']}}</td>

	<td>
		<div class="form-group">
			
			<div class="input-group">
				{{ Form::select('qa2_q141',array('1'=>'1','2'=>'2','3'=>'3','4'=>'4','5'=>'5'),Input::old('qa2_q141'),array('class'=>'form-control')) }}
			</div>

		</div>

	</td>
	<td>

		<div class="form-group">
			
			<div class="input-group">
				{{ Form::text('qa2_q142',Input::old('qa2_q142'),array('class'=>'form-control')) }}
			</div>

		</div>


	</td>
	
</tr><tr>
	<td>{{$data['qa2r15']}}</td>

	<td>
		<div class="form-group">
			
			<div class="input-group">
				{{ Form::select('qa2_q151',array('1'=>'1','2'=>'2','3'=>'3','4'=>'4','5'=>'5'),Input::old('qa2_q151'),array('class'=>'form-control')) }}
			</div>

		</div>

	</td>
	<td>

		<div class="form-group">
			
			<div class="input-group">
				{{ Form::text('qa2_q152',Input::old('qa2_q152'),array('class'=>'form-control')) }}
			</div>

		</div>


	</td>
	
</tr><tr>
	<td>{{$data['qa2r16']}}</td>

	<td>
		<div class="form-group">
			
			<div class="input-group">
				{{ Form::select('qa2_q161',array('1'=>'1','2'=>'2','3'=>'3','4'=>'4','5'=>'5'),Input::old('qa2_q161'),array('class'=>'form-control')) }}
			</div>

		</div>

	</td>
	<td>

		<div class="form-group">
			
			<div class="input-group">
				{{ Form::text('qa2_q162',Input::old('qa2_q162'),array('class'=>'form-control')) }}
			</div>

		</div>


	</td>
	
</tr><tr>
	<td>{{$data['qa2r17']}}</td>

	<td>
		<div class="form-group">
			
			<div class="input-group">
				{{ Form::select('qa2_q171',array('1'=>'1','2'=>'2','3'=>'3','4'=>'4','5'=>'5'),Input::old('qa2_q171'),array('class'=>'form-control')) }}
			</div>

		</div>

	</td>
	<td>

		<div class="form-group">
			
			<div class="input-group">
				{{ Form::text('qa2_q172',Input::old('qa2_q172'),array('class'=>'form-control')) }}
			</div>

		</div>


	</td>
	
</tr><tr>
	<td>{{$data['qa2r18']}}</td>

	<td>
		<div class="form-group">
			
			<div class="input-group">
				{{ Form::select('qa2_q181',array('1'=>'1','2'=>'2','3'=>'3','4'=>'4','5'=>'5'),Input::old('qa2_q181'),array('class'=>'form-control')) }}
			</div>

		</div>

	</td>
	<td>

		<div class="form-group">
			
			<div class="input-group">
				{{ Form::text('qa2_q182',Input::old('qa2_q182'),array('class'=>'form-control')) }}
			</div>

		</div>


	</td>
	
</tr>
</tbody>
</table>
</div>
</div>
</div>
</div>







<div class="panel panel-default">
                        <div class="panel-heading">

<div class="form-group">
	{{ Form::label('qa3',$data['qa3']) }}
</div>
<div class="panel-body">
	<div class="input-group">
		{{ Form::radio('qa3', '1') }}  {{$data['qa3a']}}<br />

		{{ Form::radio('qa3', '2') }}  {{$data['qa3b']}} <br />

		{{ Form::radio('qa3', '3') }}  {{$data['qa3c']}}<br />

		{{ Form::radio('qa3', '4') }}  {{$data['qa3d']}}<br />
		
		{{ Form::radio('qa3', '5') }}  {{$data['qa3e']}}
	</div>
</div>
</div>
</div>
	
	
	
	
	
	
	
	
	
	
	
	</div>
</div>











<!-- end of q8_a -->
</div>
<div class="q8_b">

 <div class="panel panel-default">
	<div class="panel-heading">
		{{$data['partb']}}
	</div>
	<div class="panel-body">
	
	
	
	
	
	
	
	
	
	
	<div class="panel panel-default">
                        <div class="panel-heading">

<div class="form-group">
	{{ Form::label('qb1',$data['qb1']) }}

</div>
<div class="panel-body">
	<div class="input-group">
	{{ Form::select('qb1',array(''=>$data['select'],'0'=>'0%','5'=>'5%','10'=>'10%','15'=>'15%','20'=>'20%','25'=>'25%','30'=>'30%','35'=>'35%','40'=>'40%','45'=>'45%','50'=>'50%','55'=>'55%','60'=>'60%','65'=>'65%','70'=>'70%','75'=>'75%','80'=>'80%','85'=>'85%','90'=>'90%','95'=>'95%','100'=>'100%'),Input::old('qb1'),array('class'=>'form-control')) }}
	</div>
</div>
</div>
</div>


 <div class="panel panel-default">
                        <div class="panel-heading">

<div class="form-group">
	{{ Form::label('qb2',$data['qb2']) }}
</div>
<div class="panel-body">
	<div class="input-group">
		{{ Form::radio('qb2', '1') }}  {{$data['qb2a']}}<br />

		{{ Form::radio('qb2', '2') }}  {{$data['qb2b']}}<br />

		{{ Form::radio('qb2', '3') }}  {{$data['qb2c']}}<br />

		{{ Form::radio('qb2', '4') }}  {{$data['qb2d']}} 

	</div>
</div>
</div>
</div>





<div class="panel panel-default">
                        <div class="panel-heading">

<div class="form-group">
	{{ Form::label('Q9',$data['qb3']) }}
</div>


<div class="panel-body">
<div class="table-responsive">
           <table class="table">
<thead>
       <tr>
                   <th>{{$data['qb3th1']}}</th>
                   <th>{{$data['qb3th2']}}</th>
                   <th>{{$data['qb3th3']}}</th>
       </tr>
</thead>

<tbody>
<tr>
	<td>{{$data['qb3r1']}}</td>

	<td>
		<div class="form-group">
			
			<div class="input-group">
		{{ Form::radio('qb3_q11', '1') }} {{$data['yes']}}
		{{ Form::radio('qb3_q11', '0') }} {{$data['no']}}
			</div>

		</div>

	</td>
	<td>

		<div class="form-group">
			
			<div class="input-group">
				{{ Form::text('qb3_q12',Input::old('qb3_q12'),array('class'=>'form-control')) }}
			</div>

		</div>


	</td>
	
</tr>

<tr>
	<td>{{$data['qb3r2']}}</td>

	<td>
		<div class="form-group">
			
			<div class="input-group">
		{{ Form::radio('qb3_q21', '1') }} {{$data['yes']}}
		{{ Form::radio('qb3_q21', '0') }} {{$data['no']}}
			</div>

		</div>

	</td>
	<td>

		<div class="form-group">
			
			<div class="input-group">
				{{ Form::text('qb3_q22',Input::old('qb3_q22'),array('class'=>'form-control')) }}
			</div>

		</div>


	</td>
	
</tr>
<tr>
	<td>{{$data['qb3r3']}}</td>

	<td>
		<div class="form-group">
			
			<div class="input-group">
		{{ Form::radio('qb3_q31', '1') }} {{$data['yes']}}
		{{ Form::radio('qb3_q31', '0') }} {{$data['no']}}
			</div>

		</div>

	</td>
	<td>

		<div class="form-group">
			
			<div class="input-group">
				{{ Form::text('qb3_q32',Input::old('qb3_q32'),array('class'=>'form-control')) }}
			</div>

		</div>


	</td>
	
</tr>
<tr>
	<td>{{$data['qb3r4']}}</td>

	<td>
		<div class="form-group">
			
			<div class="input-group">
		{{ Form::radio('qb3_q41', '1') }} {{$data['yes']}}
		{{ Form::radio('qb3_q41', '0') }} {{$data['no']}}
			</div>

		</div>

	</td>
	<td>

		<div class="form-group">
			
			<div class="input-group">
				{{ Form::text('qb3_q42',Input::old('qb3_q42'),array('class'=>'form-control')) }}
			</div>

		</div>


	</td>
	
</tr>
<tr>
	<td>{{$data['qb3r5']}}</td>

	<td>
		<div class="form-group">
			
			<div class="input-group">
		{{ Form::radio('qb3_q51', '1') }} {{$data['yes']}}
		{{ Form::radio('qb3_q51', '0') }} {{$data['no']}}
			</div>

		</div>

	</td>
	<td>

		<div class="form-group">
			
			<div class="input-group">
				{{ Form::text('qb3_q52',Input::old('qb3_q52'),array('class'=>'form-control')) }}
			</div>

		</div>


	</td>
	
</tr>
<tr>
	<td>{{$data['qb3r6']}}</td>

	<td>
		<div class="form-group">
			
			<div class="input-group">
		{{ Form::radio('qb3_q61', '1') }} {{$data['yes']}}
		{{ Form::radio('qb3_q61', '0') }} {{$data['no']}}
			</div>

		</div>

	</td>
	<td>

		<div class="form-group">
			
			<div class="input-group">
				{{ Form::text('qb3_q62',Input::old('qb3_q62'),array('class'=>'form-control')) }}
			</div>

		</div>


	</td>
	
</tr>
<tr>
	<td>{{$data['qb3r7']}}</td>

	<td>
		<div class="form-group">
			
			<div class="input-group">
		{{ Form::radio('qb3_q71', '1') }} {{$data['yes']}}
		{{ Form::radio('qb3_q71', '0') }} {{$data['no']}}
			</div>

		</div>

	</td>
	<td>

		<div class="form-group">
			
			<div class="input-group">
				{{ Form::text('qb3_q72',Input::old('qb3_q72'),array('class'=>'form-control')) }}
			</div>

		</div>


	</td>
	
</tr>
<tr>
	<td>{{$data['qb3r8']}}</td>

	<td>
		<div class="form-group">
			
			<div class="input-group">
		{{ Form::radio('qb3_q81', '1') }} {{$data['yes']}}
		{{ Form::radio('qb3_q81', '0') }} {{$data['no']}}
			</div>

		</div>

	</td>
	<td>

		<div class="form-group">
			
			<div class="input-group">
				{{ Form::text('qb3_q82',Input::old('qb3_q82'),array('class'=>'form-control')) }}
			</div>

		</div>


	</td>
	
</tr>
<tr>
	<td>{{$data['qb3r9']}}</td>

	<td>
		<div class="form-group">
			
			<div class="input-group">
		{{ Form::radio('qb3_q91', '1') }} {{$data['yes']}}
		{{ Form::radio('qb3_q91', '0') }} {{$data['no']}}
			</div>

		</div>

	</td>
	<td>

		<div class="form-group">
			
			<div class="input-group">
				{{ Form::text('qb3_q92',Input::old('qb3_q92'),array('class'=>'form-control')) }}
			</div>

		</div>


	</td>
	
</tr>
<tr>
	<td>{{$data['qb3r10']}}</td>

	<td>
		<div class="form-group">
			
			<div class="input-group">
		{{ Form::radio('qb3_q101', '1') }} {{$data['yes']}}
		{{ Form::radio('qb3_q101', '0') }} {{$data['no']}}
			</div>

		</div>

	</td>
	<td>

		<div class="form-group">
			
			<div class="input-group">
				{{ Form::text('qb3_q102',Input::old('qb3_q102'),array('class'=>'form-control')) }}
			</div>

		</div>


	</td>
	
</tr>
<tr>
	<td>{{$data['qb3r11']}}</td>

	<td>
		<div class="form-group">
			
			<div class="input-group">
		{{ Form::radio('qb3_q111', '1') }} {{$data['yes']}}
		{{ Form::radio('qb3_q111', '0') }} {{$data['no']}}
			</div>

		</div>

	</td>
	<td>

		<div class="form-group">
			
			<div class="input-group">
				{{ Form::text('qb3_q112',Input::old('qb3_q112'),array('class'=>'form-control')) }}
			</div>

		</div>


	</td>
	
</tr>
<tr>
	<td>{{$data['qb3r12']}}</td>

	<td>
		<div class="form-group">
			
			<div class="input-group">
		{{ Form::radio('qb3_q121', '1') }} {{$data['yes']}}
		{{ Form::radio('qb3_q121', '0') }} {{$data['no']}}
			</div>

		</div>

	</td>
	<td>

		<div class="form-group">
			
			<div class="input-group">
				{{ Form::text('qb3_q122',Input::old('qb3_q122'),array('class'=>'form-control')) }}
			</div>

		</div>


	</td>
	
</tr>
<tr>
	<td>{{$data['qb3r13']}}</td>

	<td>
		<div class="form-group">
			
			<div class="input-group">
		{{ Form::radio('qb3_q131', '1') }} {{$data['yes']}}
		{{ Form::radio('qb3_q131', '0') }} {{$data['no']}}
			</div>

		</div>

	</td>
	<td>

		<div class="form-group">
			
			<div class="input-group">
				{{ Form::text('qb3_q132',Input::old('qb3_q132'),array('class'=>'form-control')) }}
			</div>

		</div>


	</td>
	
</tr>




</tbody>
</table>
</div>
</div>
</div>
</div>
	
	
	
	
	
	
	
	
	
	
	
	
	

	</div>
</div>


 




























<!-- end of q8_b -->
</div>


{{ Form::submit('Submit the Survey!',array('class'=>'btn btn-outline btn-primary btn-lg btn-block')) }}

{{ Form::close() }}

@endif


@stop
