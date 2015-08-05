<?php

/*


SlimController는 slim BIM Data Map을 컨트롤합니다.


*/

use Khill\Lavacharts\Lavacharts;	// Lavachart 라이브러리를 로드함


class SlimController extends BaseController {

	//  slim/map/world 시작 //
	public function map_world()
	{

	
		if(Auth::guest())	// 만약 로그인을 안 했다면(Guest라면)
		{
			Session::flash('message', "You have to login first in order to use.");
			return Redirect::to('login');	// 로그인 페이지로 이동한다.
		}

		
		$answers = Answer::all();	// answers 테이블(설문조서 결과가 쌓이는 테이블)의 모든 레코드를 $answers에 저장
		$codes = Code::all();		// codes 테이블(국가 코드 테이블)의 모든 레코드를 변수 $codes에 저장
	
	
		$diamond = Lava::DataTable();		// Lavachart 데이터 테이블 생성 - d index map 용
		$diamond->addStringColumn('Country')	// String Column 추가
			->addNumberColumn('d index');		// Number Column 추가
		   
		$triangle = Lava::DataTable();		// Lavachart 데이터 테이블 생성 - t index map 용
		$triangle->addStringColumn('Country')		// String Column 추가
			->addNumberColumn('t index');			// Number Column 추가
		   
		$rugby = Lava::DataTable();		// Lavachart 데이터 테이블 생성 - r index map 용
		$rugby->addStringColumn('Country')		// String Column 추가
		->addNumberColumn('r index');			// Number Column 추가
	

	
		for ($x=0;$x<$codes->count();$x++)	// code의 개수만큼(전체 국가 수 만큼) For 문을 돌린다.
		{
			$country = Code::find($x+1);	// $x+1번째 국가에 대하여 
			$total_number = Answer::where('q1', $country->codename)->get()->count();	// answers 테이블에서  해당 국가가 포함된 레코드의 개수를 센다.
	
			if($total_number != 0)	// 개수가 0이 아니라면, 레코드가 있다면
			{

				$adoption_number = Answer::where('q1', $country->codename)->where('q8','yes')->get()->count() + Answer::where('q1', $country->codename)->where('q8',1)->get()->count();	// 그 국가이면서, q8(7번째 질문 '7. BIM을 사용하고 계십니까?') 항목이 yes인 레코드의 개수를 센다.
				$depth_number = Answer::where('q1', $country->codename)->where('qb1', '>=', 60)->get()->count();	// 그 국가이면서, qb1([B]파트 1번째 질문, '1. 현재 회사 전체 프로젝트 중 대략 몇 퍼센트 정도 BIM을 적용하고 있습니까?') 항목이 60보다 크거나 같은 레코드의 개수를 센다.
				$proficiency_number = Answer::where('q1', $country->codename)->where('qb2',3)->get()->count() + Answer::where('qb2',4)->get()->count();	// 그 국가이면서, qb2([B[파트 2번째 질문, '2. 본인 회사의 BIM 전문성은 어느 수준이라고 생각하십니까?') 항목이 3이거나 4인 레코드의 개수를 센다.
				$years_number = Answer::where('q1', $country->codename)->where('q8_years','>=',5)->get()->count();	// 그 국가이면서, q8_years(7번째 질문 '7. BIM을 사용하고 계십니까?'에서  몇년 사용중인지') 항목이 5보다 크거나 같은 레코드의 개수를 센다.

				$adoption = round($adoption_number/$total_number*100,2);	// adoption 계산
				$depth = round($depth_number/$total_number*100,2);		// depth 계산
				$proficiency = round($proficiency_number/$total_number*100,2);	// proficiency 계산
				$years = round($years_number/$total_number*100,2);		// years 계산
			
				$dindex = round(($depth+$proficiency)*($adoption+$years)/2,1);		// d-index(diamond의 넓이) 계산
				$tindex = round((($depth*$proficiency+$proficiency*$years+$years*$depth)*sqrt(3))/4,1);	// t-index(triangle의 넓이) 계산
				$rindex = round(pi()*$adoption*$depth,1);					// r-index(rugby)의 넓이 계산
			
				$diamond->addRow(array($country->codename,$dindex));		// 해당 국가의 d-index를 diamond 테이블에 추가
				$triangle->addRow(array($country->codename,$tindex));		// 해당 국가의 t-index를 triangle 테이블에 추가
				$rugby->addRow(array($country->codename,$rindex));		// 해당 국가의 r-index를 rugby 테이블에 추가
			}
		}
	

		$geochart = Lava::GeoChart('Diamond')	// diamont 테이블로 Diamond GeoChart 생성
			->setOptions(array(
			'datatable' => $diamond
		));
		$geochart = Lava::GeoChart('Triangle')		// triangle 테이블로 Triangle GeoChart 생성
			->setOptions(array(
			'datatable' => $triangle
		));
		$geochart = Lava::GeoChart('Rugby')		// rugby 테이블로 Rugby GeoChart 생성
			->setOptions(array(
			'datatable' => $rugby
		));
	
		$popularity = Lava::DataTable();			// 1번째 지도(레코드가 몇개 쌓여 있는 지도)를 위한 데이터 테이블 생성
		$popularity->addStringColumn('Country')	// String Column 추가
			->addNumberColumn('Number of Records');	// Number Column 추가

	
		for ($x=0;$x<$codes->count();$x++)	// 국가 개수만큼 For 문을 돌린다.
		{
			$country = Code::find($x+1);	// $x+1 번째 국가에 대해서
			$countOfRecords = Answer::where('q1', $country->codename)->get()->count();		// 해당 국가의 레코드 개수를 센다.
			if($countOfRecords != 0)
				$popularity->addRow(array($country->codename,$countOfRecords));		// 데이터테이블에 해당 국가의 레코드 개수 추가
		}

		$select = Lava::Select('selectCallback');

		$geochart = Lava::GeoChart('Popularity')
		->setOptions(array(
				'datatable' => $popularity,
				'events' => array($select)
		));

	

		return View::make('slim.map.world');

	}
	//  slim/map/world 끝 //

	
	
	public function model_world()
	{
		
		if(Auth::guest())
		{
			Session::flash('message', "You have to login first in order to use.");
			return Redirect::to('login');
		}


		$total_number = Answer::all()->count();
		$adoption_number = Answer::where('q8','yes')->get()->count()+ Answer::where('q8',1)->get()->count();
		$depth_number = Answer::where('qb1', '>=', 60)->get()->count();
		$proficiency_number = Answer::where('qb2',3)->get()->count() + Answer::where('qb2',4)->get()->count();
		$years_number = Answer::where('q8_years','>=',5)->get()->count();
		
		if($total_number == 0)
			$total_number = 1;
		
		$adoption = round($adoption_number/$total_number*100,2);
		$depth = round($depth_number/$total_number*100,2);
		$proficiency = round($proficiency_number/$total_number*100,2);
		$years = round($years_number/$total_number*100,2);
		$dindex = round(($depth+$proficiency)*($adoption+$years)/2,1);
		$tindex = round((($depth*$proficiency+$proficiency*$years+$years*$depth)*sqrt(3))/4,1);
		$rindex = round(pi()*$adoption*$depth,1);
        
        $user = User::find(Auth::user()->id);
        
        $your_total_number = Answer::where('q1',$user->country)->get()->count();
		$your_answers = Answer::where('q1',$user->country)->get();
		$your_adoption_number = Answer::where('q1',$user->country)->where('q8','yes')->get()->count()+ Answer::where('q1',$user->country)->where('q8',1)->get()->count();
		$your_depth_number = Answer::where('q1',$user->country)->where('qb1', '>=', 60)->get()->count();
		$your_proficiency_number = Answer::where('q1',$user->country)->where('qb2',3)->get()->count() + Answer::where('q1',$user->country)->where('qb2',4)->get()->count();
		$your_years_number = Answer::where('q1',$user->country)->where('q8_years','>=',5)->get()->count();

		
		$your_adoption = round($your_adoption_number/$your_total_number*100,2);
		$your_depth = round($your_depth_number/$your_total_number*100,2);
		$your_proficiency = round($your_proficiency_number/$your_total_number*100,2);
		$your_years = round($your_years_number/$your_total_number*100,2);
		$your_dindex = round(($your_depth+$your_proficiency)*($your_adoption+$your_years)/2,1);
		$your_tindex = round((($your_depth*$your_proficiency+$your_proficiency*$your_years+$your_years*$your_depth)*sqrt(3))/4,1);
		$your_rindex = round(pi()*$your_adoption*$your_depth,1);



		
		$data = array(
		'adoption' => round($adoption_number/$total_number*100,2),
		'depth' => round($depth_number/$total_number*100,2),
		'proficiency' => round($proficiency_number/$total_number*100,2),
		'years' => round($years_number/$total_number*100,2),
		'dindex' => $dindex,
		'tindex' => $tindex,
		'rindex' => $rindex,
        'your_adoption' => round($your_adoption_number/$your_total_number*100,2),
		'your_depth' => round($your_depth_number/$your_total_number*100,2),
		'your_proficiency' => round($your_proficiency_number/$your_total_number*100,2),
		'your_years' => round($your_years_number/$your_total_number*100,2),
		'your_dindex' => $your_dindex,
		'your_tindex' => $your_tindex,
		'your_rindex' => $your_rindex
		);
		


		return View::make('slim.model.world')->with('data',$data);
	}
	
	public function model_finder()
	{


		if(Auth::guest())
		{
			Session::flash('message', "You have to login first in order to use.");
			return Redirect::to('login');
		}

		$user = User::find(Auth::user()->id);

		if( $user->confirmed == 1){
				Session::flash('message','Would you share your thoughts on the BIM implementation level of your region? The survey will take less than five minutes. By participating in the survey, you will gain access to the slim BIM finder section till the end of this year. You can renew your access next year by participate in a next year&#39;s survey.');
				return Redirect::to('languages/select');
				

		} else if($user->confirmed == 2){

		$codes = Code::lists('countryname','codename');
		return View::make('slim.model.finder')->with('codes',$codes);
		}

		return 'oh';
	}

	public function show()
	{



		$total_number = Answer::where('q1',Input::get('country'))->get()->count();
		$answers = Answer::where('q1',Input::get('country'))->get();
		$adoption_number = Answer::where('q1',Input::get('country'))->where('q8','yes')->get()->count()+ Answer::where('q1',Input::get('country'))->where('q8',1)->get()->count();
		$depth_number = Answer::where('q1',Input::get('country'))->where('qb1', '>=', 60)->get()->count();
		$proficiency_number = Answer::where('q1',Input::get('country'))->where('qb2',3)->get()->count() + Answer::where('q1',Input::get('country'))->where('qb2',4)->get()->count();
		$years_number = Answer::where('q1',Input::get('country'))->where('q8_years','>=',5)->get()->count();

		$code = Code::where('codename',Input::get('country'))->first();
		
		$adoption = round($adoption_number/$total_number*100,2);
		$depth = round($depth_number/$total_number*100,2);
		$proficiency = round($proficiency_number/$total_number*100,2);
		$years = round($years_number/$total_number*100,2);
		$dindex = round(($depth+$proficiency)*($adoption+$years)/2,1);
		$tindex = round((($depth*$proficiency+$proficiency*$years+$years*$depth)*sqrt(3))/4,1);
		$rindex = round(pi()*$adoption*$depth,1);



		
		$data = array(

		'country' => $code->countryname,
		'adoption' => round($adoption_number/$total_number*100,2),
		'depth' => round($depth_number/$total_number*100,2),
		'proficiency' => round($proficiency_number/$total_number*100,2),
		'years' => round($years_number/$total_number*100,2),
		'dindex' => $dindex,
		'tindex' => $tindex,
		'rindex' => $rindex
		
		);

		return View::make('slim.model.show')->with('data',$data);


	}
	


	public function region()
	{
	
	$answers = Answer::all();
	$codes = Code::all();

	$popularity = Lava::DataTable();
	$popularity->addStringColumn('Country')
           ->addNumberColumn('Number of Records');

	for ($x=0;$x<$codes->count();$x++)
	{
		$country = Code::find($x+1);
		$countOfRecords = Answer::where('q1', $country->codename)->get()->count();
		$popularity->addRow(array($country->codename,$countOfRecords));

	}

	$select = Lava::Select('selectCallback');

	$geochart = Lava::GeoChart('Popularity')
                 ->setOptions(array(
                   'datatable' => $popularity,
			'events' => array($select)
                 ));

	



	return View::make('slim.map.region');

	}


	
}
