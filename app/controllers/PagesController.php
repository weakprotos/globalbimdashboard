<?php
/*

PagesController는 홈페이지 첫 화면인 views/dashboard.blade.php를 관리합니다.
여기에서 계산을 수행하여 views/dashboard.blade.php로 넘겨줍니다.

추가로 소개 페이지인 About-Us 페이지도 여기에서 관리됩니다.

*/

use Khill\Lavacharts\Lavacharts;	// Google Visualization API를 쉽게 이용하게 만들어 주는 Lavachart를 불러옵니다.

class PagesController extends BaseController {
	
	// About-Us 시작 //
	public function about()
	{
		return View::make('about');
	}
	// About-Us 끝 //
	
	public function maps()
	{
		$codes = Code::all();
		
		$num = Lava::DataTable();
		$num->addStringColumn('Country')
			->addNumberColumn('Number of Records');

		for($x=0;$x<$codes->count();$x++){
			$country = Code::find($x+1);
			$countOfRecords = Answer::where('q1',$country->codename)->get()->count();
			if($countOfRecords !=0)
				$num->addRow(array($country->codename,$countOfRecords));
		}
		$geochart =Lava::GeoChart('GeoMap')
				->setOptions(array('datatable'=>$num));

		return View::make('maps');
	}
	
	
	// Dashboard 시작 //
	public function dashboard()
	{
	
		// 각 테이블의 레코드 개수를 센다.
		$number_of_users = User::all()->count();
		$number_of_organizations = Organization::all()->count();
		$number_of_answers = Answer::all()->count();
		$number_of_reports = Report::all()->count();
		$number_of_guides = Guide::all()->count();

		// Answer 테이블(설문조사결과테이블)의 설문조사 전체 개수를 센다.
		$total_number = Answer::all()->count();
		
		// Answer테이블에서 SLIM BIM 지표를 구하기 위해서 기준을 넘는 adoption, depth, proficiency, years의 개수를 센다.
		$adoption_number = Answer::where('q8','yes')->get()->count()+ Answer::where('q8',1)->get()->count();		// adoption
		$depth_number = Answer::where('qb1', '>=', 60)->get()->count();	//depth
		$proficiency_number = Answer::where('qb2',3)->get()->count() + Answer::where('qb2',4)->get()->count();	//proficiency
		$years_number = Answer::where('q8_years','>=',5)->get()->count();	//years

		// 만약 전체 개수가 0일 경우, 1로 바꾼다. (0으로 나누면 에러)
		if($total_number  == 0) $total_number = 1;
	
		// $data 배열에다가 모든 정보를 저장한 후에 views/dashboard.blade.php로 넘긴다.
		$data = array(		
			'number_of_users' => $number_of_users,
			'number_of_organizations' => $number_of_organizations,
			'number_of_answers' => $number_of_answers,
			'number_of_reports' => $number_of_reports,
			'number_of_guides' => $number_of_guides,

			'adoption' => round($adoption_number/$total_number*100,2),
			'depth' => round($depth_number/$total_number*100,2),
			'proficiency' => round($proficiency_number/$total_number*100,2),
			'years' => round($years_number/$total_number*100,2)
		);
		
		
		
		/*-------------------Organization PieChart -------------------------시작-------------*/

		$reasons = Lava::DataTable(); // Lava차트용 데이터테이블을 만든다.

		$number_of_1 = Organization::where('category',1)->get()->count();	// Organization 중 category가 1인 레코드의 개수를 센다.(University 개수)
		$number_of_2 = Organization::where('category',2)->get()->count();	// Organization 중 category가 2인 레코드의 개수를 센다.(Research Center 개수)
		$number_of_3 = Organization::where('category',3)->get()->count();	// Organization 중 category가 3인 레코드의 개수를 센다.(Governmental Organization 개수)
		$number_of_4 = Organization::where('category',4)->get()->count();	// Organization 중 category가 4인 레코드의 개수를 센다.(Others 개수)

		$reasons->addStringColumn('BIM Organization')	// String Column을 추가
			->addNumberColumn('Number')			// Number Column을 추가
			->addRow(array('University', $number_of_1))		// Row 추가
			->addRow(array('Research Center', $number_of_2))	// Row 추가
			->addRow(array('Governmental Organization', $number_of_3))	// Row 추가
			->addRow(array('Others', $number_of_4));	// Row 추가

		$piechart = Lava::PieChart('IMDB')	// PieChart 생성
			->setOptions(array(
				'datatable' => $reasons,
				'title' => 'BIM Organizations',
				'is3D' => true,
				'slices' => array(
					Lava::Slice(array(
						'offset' => 0.2
					)),
					Lava::Slice(array(
						'offset' => 0.25
					)),
					Lava::Slice(array(
						'offset' => 0.3
					))
				)
			));

		/*-------------------Organization PieChart -------------------------끝-------------*/

		/*-------------------게이지 차트-------------------------시작-------------*/
		
		$temps = Lava::DataTable();

		$temps->addStringColumn('Type')
			->addNumberColumn('Value')
			->addRow(array('Depth of implementation',round($depth_number/$total_number*100,2) ))
			->addRow(array('Years using BIM',round($years_number/$total_number*100,2) ))
			->addRow(array('Level of proficiency', round($proficiency_number/$total_number*100,2)))
			->addRow(array('Level of adoption', round($adoption_number/$total_number*100,2)));

		/*
		Lava::GaugeChart('Temps')
			->setOptions(array(
				'datatable' => $temps,
				'greenFrom' => 0,
				'greenTo' => 100,
				'yellowFrom' => 100,
				'yellowTo' => 100,
				'redFrom' => 100,
				'redTo' => 100,
				'majorTicks' => array(
					'Low',
					'High'
				)
			));
		*/

			Lava::ColumnChart('Temps')
			->setOptions(array(
				'datatable' => $temps,
				 'title' => 'World Average slim BIM Indices',
                   			   'titleTextStyle' => Lava::TextStyle(array(
                        			'color' => '#eb6b2c',
                       				 'fontSize' => 14
                      				))
			));

		/*-------------------게이지 차트-------------------------끝------------*/
			
		return View::make('dashboard')->with('data', $data);		// dashboard.blade.php를 만들고 $data를 넘겨서 뷰를 만든다.
	}
	// Dashboard 끝 //
}
