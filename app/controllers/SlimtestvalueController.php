<?php

class SlimtestvalueController extends \BaseController {

	public function index()
	{
		$slimtestvalues = Slimtestvalue::all();
		return View::make('slimtestvalues.index')->with('slimtestvalues',$slimtestvalues);	
	}

	public function create()
	{
		$codes = Code::lists('countryname','codename');
		return View::make('slimtestvalues.create')->with('codes',$codes);
	}
	
	public function store()
	{
		$rules = array(
			'country' => 'required',
			'year' => 'required|numeric',
			'adoption' => 'required|numeric',
			'years' => 'required|numeric',
			'depth' => 'required|numeric',
			'expertise' => 'required|numeric'
		);

		$validator = Validator::make(Input::all(),$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withInput()->withErrors($validator);
		}else{
			$slimtestvalue = new Slimtestvalue;
			$slimtestvalue->country = Input::get('country');
			$slimtestvalue->year = Input::get('year');
			$slimtestvalue->adoption = Input::get('adoption')/100;
			$slimtestvalue->years = Input::get('years')/100;
			$slimtestvalue->depth = Input::get('depth')/100;
			$slimtestvalue->expertise = Input::get('expertise')/100;
			$slimtestvalue->save();

			Session::flash('message','Successfully Submitted!');
			return Redirect::to('slimtestvalues');
			
		}
		return Input::all();
	}
	
	public function show($id)
	{
	}
	
	public function edit($id)
	{
	}
	
	public function update($id)
	{
	}
	
	public function destroy($id)
	{
		$slimtestvalue = Slimtestvalue::find($id);
		$slimtestvalue->delete();

		Session::flash('message','Successfully deleted!');
		return Redirect::to('slimtestvalues');
	}
}
