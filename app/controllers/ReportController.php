<?php

class ReportController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */



	public function search()
	{
		
		$search = Input::get('search');
		return Redirect::to('/reports/search='.$search);
	}

	



	public function index()
	{
		//return Input::all();

		if(Auth::guest())
		{
			Session::flash('message', "You have to login first in order to use.");
			return Redirect::to('login');
		}

		
		
		$reports = Report::orderBy('created_at', 'desc')->paginate(10);
		return View::make('reports.index')->with('reports',$reports);
	

	}

	public function postIndex($search)
	{
		$q = $search;
		$reports = Report::where('name','LIKE','%'.$q.'%')->orwhere('introduction','LIKE','%'.$q.'%')->orwhere('url','LIKE','%'.$q.'%')->paginate(10);
		return View::make('reports.result')->with('reports',$reports);
		//return 'searching';
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('reports.create');
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
			'introduction' => 'required',
			'url' => 'required'
		
		);

		$validator = Validator::make(Input::all(),$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withInput()->withErrors($validator);
		}else {
		
			$organization_temp = Report::where('name', Input::get('name'))->first();
			if($organization_temp){

			Session::flash('message','There already is report with same name.');
			return Redirect::to('reports/submitted');
			
			}
			

			

			


			$organization = new Report;

			$organization->name = Input::get('name');
			$organization->url = Input::get('url');
			$organization->introduction = Input::get('introduction');
			
			$organization->save();
			
			
						

			Session::flash('message','Successfully submitted!');
			return Redirect::to('reports/submitted');
			
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
		//
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}


}
