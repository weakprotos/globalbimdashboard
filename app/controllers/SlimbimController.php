<?php


use Khill\Lavacharts\Lavacharts;


class SlimbimController extends BaseController {

	public function index(){
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
        
     	
		$data = array(
		'adoption' => round($adoption_number/$total_number*100,2),
		'depth' => round($depth_number/$total_number*100,2),
		'proficiency' => round($proficiency_number/$total_number*100,2),
		'years' => round($years_number/$total_number*100,2),
		'dindex' => $dindex,
		'tindex' => $tindex,
		'rindex' => $rindex,
       		);
		
		return View::make('slimbimindex')->with('data',$data);
	}
}
