<?php

class LionController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$lions = Lion::all();
		return View::make('lions.index')->with('lions',$lions);
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('lions.create');
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
			return Redirect::to('lions/create')
					->witherrors($validator)
					->withInput();
		}else{
			$lion = new Lion;
			$lion->name = Input::get('name');
			$lion->age = Input::get('age');
			$lion->save();

			Session::flash('message', 'Successfully created lion!');
			return Redirect::to('lions');
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
		$lion = Lion::find($id);
		return View::make('lions.show')->with('lion', $lion);
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$lion =  Lion::find($id);
		return View::make('lions.edit')->with('lion', $lion);
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

		// process the login
		if($validator->fails()){
			return Redirect::to('lions/' .$id.'/edit')
					->witherrors($validator)
					->withInput();
		}else{
			$lion = Lion::find($id);
			$lion->name = Input::get('name');
			$lion->age = Input::get('age');
			$lion->save();

			Session::flash('message', 'Successfully updated lion!');
			return Redirect::to('lions');
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
		$lion = Lion::find($id);
		$lion->delete();

		Session::flash('message', 'Successfully deleted the lion!');
		return Redirect::to('lions');
	}


	public function chart()
	{
		$lions = Lion::all();
		$names = array();
		$ages = array();

		for($i=0;$i<$lions.count();$i++){
			array_push($names, Lion::find(($i+1))->name);
			array_push($ages, Lion::find(($i+1))->age);
		}
		return View::make('lion-chart')->with('names',$names)->with('ages',$ages);
	}
	public function diamond()
	{
		$total_number = Answer::all()->count();
		$adoption_number = Answer::where('q8','yes')->get()->count()+Answer::where('q8',1)->get()->count();
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

		return View::make('lion-diamond')->with('data',$data);
	}

}
















