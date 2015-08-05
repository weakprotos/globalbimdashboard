<?php

use Khill\Lavacharts\Lavacharts;


class EagleController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$eagles = Eagle::all();
		return View::make('eagles.index')->with('eagles',$eagles);
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('eagles.create');
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$rules = array (
		'name' => 'required',
		'age' => 'required|numeric'
		);
		$validator = Validator::make(Input::all(),$rules);
		
		//process the login
		if ($validator->fails()) {
			return Redirect::to('eagles/create')
			->witheErrors($validator)
			->withInput();
		} else {
			//store
			$eagle=new Eagle;
			$eagle->name = Input::get('name');
			$eagle->age = Input::get('age');
			$eagle->save();

		//redirect
		Session::flash('message', 'Successfully created eagle!');
		return Redirect::to('eagles');
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
		$eagle = Eagle::find($id);
		return View::make('eagles.show')->with('eagle', $eagle);
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$eagle = Eagle::find($id);
		return View::make('eagles.edit')->with('eagle', $eagle);
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$rules = array (
		'name' => 'required',
		'age' => 'required|numeric'
		);
		$validator = Validator::make(Input::all(),$rules);
		
		//process the login
		if ($validator->fails()) {
			return Redirect::to('eagles/'.$id.'/edit')
			->witheErrors($validator)
			->withInput();
		} else {
			//store
			$eagle=Eagle::find($id);
			$eagle->name = Input::get('name');
			$eagle->age = Input::get('age');
			$eagle->save();

		//redirect
		Session::flash('message', 'Successfully updated eagle!');
		return Redirect::to('eagles');
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
		$eagle = Eagle::find($id);
		$eagle->delete();
		Session::flash('message', 'Successfully deleted the eagle!');
		return Redirect::to('eagles');
	}
	
	public function chart()
	{
		$eagles=Eagle::all();
		$names = array();
		$ages = array();
		foreach($eagles as $eagle) {
			array_push($names, $eagle->name);
			array_push($ages, $eagle->age);
		
		}
		return View::make('eagle-chart')->with('names',$names)->with('ages',$ages);
	}
	public function diamond()
	{
		$total_number = Answer::all()->count();
		$adoption_number = Answer::where('q8', 'yes')->get()->count() + Answer::where('q8','1')->get()->count();
		$depth_number = Answer::where('qb1', '>=', 60)->get()->count();
		$proficiency_number = Answer::where('qb2',3)->get()->count() + Answer::where('qb2',4)->get()->count();
		$years_number = Answer::where('q8_years', '>=', 5)->get()->count();
		
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

		return View::make('eagle-diamond')->with('data',$data);
	}
	public function map()
	{
		$codes = Code::all();
		$num = Lava::DataTable();
		$num->addStringColumn('Country')
			->addNumberColumn('Number of Records');
		for($x=0; $x<$codes->count();$x++)
		{
			$country = Code::find($x+1);
			$countOfRecords = Answer::where('q1', $country->codename)->get()->count();
			if($countOfRecords != 0)
			{
				$num->addRow(array($country->codename,$countOfRecords));
			}
		}
		$geochart = Lava::GeoChart('GeoMap')
		->setOptions(array(
				'datatable'=>$num));
		return View::make('eagle-map');
	}

}
