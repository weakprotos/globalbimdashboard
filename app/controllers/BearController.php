<?php

use Khill\Lavacharts\Lavacharts;

class BearController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$bears = Bear::all();
		return View::make('bears.index')->with('bears', $bears);
	}


	/** ((주석 표시))
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('bears.create');
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$rules = array(
			'name'	=> 'required',
			'age'	=> 'required|numeric'
		);
		$validator = Validator::make(Input::all(), $rules);

	if ($validator->fails()) {
		return Redirect::to('bears/create')
			->withErrors($validator)
			->withInput();

	} else {
		$bear = new Bear;
		$bear->name		= Input::get('name');
		$bear->age		=Input::get('age');
		$bear->save();

	Session::flash('message', 'Successfully created bear!');
	return Redirect::to('bears');
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
		$bear = Bear::find($id);
		return View::make('bears.show')->with('bear',$bear);
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$bear = Bear::find($id);
		return View::make('bears.edit')->with('bear', $bear);

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
			'name'	=> 'required',
			'age'	=> 'required|numeric'
		);
		$validator = Validator::make(Input::all(), $rules);

	if ($validator->fails()) {
		return Redirect::to('bears/' . $id . '/edit')
			->withErrors($validator)
			->withInput();

	} else {
//store		
		$bear = Bear::find($id);
		$bear->name		= Input::get('name');
		$bear->age		=Input::get('age');
		$bear->save();

	Session::flash('message', 'Successfully updated bear!');
	return Redirect::to('bears');
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
		$bear = Bear::find($id);
		$bear -> delete();
		Session::flash('message', 'Successfully deleted the bear!');
		return Redirect::to('bears');
	}





public function chart()
{
	$bears = Bear::all();

	$names = array();
	$ages = array();

	foreach($bears as $bear){
		array_push($names, $bear->name);
		array_push($ages, $bear->age);
			}
	
	return View::make('bear-chart')->with('names',$names)->with('ages',$ages);
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
	
	return View::make('bear-diamond')->with('data',$data);
}

public function map()
{
	$codes = Code::all();
	$num = Lava::DataTable();
	$num->addStringColumn('Country')
		->addNumberColumn('Number of Records');
		
	for ($x=0;$x<$codes->count();$x++)
	{
		$country = Code::find($x+1);
		$countOfRecords = Answer::where('q1',$country->codename)->get()->count();
		if($countOfRecords !=0) $num->addRow(array($country->codename,$countOfRecords));
	}

	$geochart = Lava::GeoChart('GeoMap')
		->setOptions(array('datatable' => $num));

return View::make('bear-map');

}


}