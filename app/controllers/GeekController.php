<?php

use Khill\Lavacharts\Lavacharts;

class GeekController extends \BaseController {
	
	
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$geeks = Geek::all();
		return View::make('geeks.index')->with('geeks', $geeks);
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('geeks.create');
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$rules = array(
			'name' => 'required',
			'age' => 'required|numeric'
		);

		$validator = Validator::make(Input::all(), $rules);

		if($validator->fails()){
			return Redirect::to('geeks/create')
					->withErrors($validator)
					->withInput();
		}else{
			$geek = new Geek;
			$geek->name = Input::get('name');
			$geek->age = Input::get('age');
			$geek->save();
			
			Session::flash('message', 'Successfully created geek!');
			return Redirect::to('geeks');
		}
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$geek = Geek::find($id);
		return View::make('geeks.show')->with('geek', $geek);
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$geek = Geek::find($id);
		return View::make('geeks.edit')->with('geek', $geek);
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$rules = array(
			'name' => 'required',
			'age' => 'required|numeric'
		);
		$validator = Validator::make(Input::all(), $rules);

		if($validator->fails()){
			return Redirect::to('geeks/'.$id.'/edit')
					->withErrors($validator)
					->withInput();
		}else{
			$geek = Geek::find($id);
			$geek->name = Input::get('name');
			$geek->age = Input::get('age');
			$geek->save();
			
			Session::flash('message', 'Successfully updated geek!');
			return Redirect::to('geeks');
		}


	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$geek = Geek::find($id);
		$geek->delete();
		
		Session::flash('message', 'Successfully deleted the geek!');
		return Redirect::to('geeks');
	}


	public function chart()
	{
		$geeks = Geek::all();
		
		$names = array();
		$ages = array();

		foreach($geeks as $geek){
			array_push($names, $geek->name);
			array_push($ages, $geek->age);
		}		
		
		
		return View::make('geek-chart')->with('names',$names)->with('ages',$ages);;
	}

	public function diamond()
	{
		$total_number = Answer::all()->count();
		$adoption_number = Answer::where('q8','yes')->get()->count()+Answer::where('q8','1')->get()->count();
		$depth_number = Answer::where('qb1','>=',60)->get()->count();
		$proficiency_number = Answer::where('qb2',3)->get()->count()+Answer::where('qb2',4)->get()->count();
		$years_number = Answer::where('q8_years','>=',5)->get()->count();
		
		$adoption = $adoption_number/$total_number;
		$depth = $depth_number/$total_number;
		$proficiency = $proficiency_number/$total_number;
		$years = $years_number/$total_number;

		$data = array(
			'adoption' => $adoption,
			'depth' => $depth,
			'proficiency' => $proficiency,
			'years' => $years
		);


		return View::make('geek-diamond')->with('data',$data);
	}
	public function map()
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

		return View::make('geek-map');	
	}
}
