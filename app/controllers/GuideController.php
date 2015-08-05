<?php

class GuideController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{

		if(Auth::guest())
		{
			Session::flash('message', "You have to login first in order to use.");
			return Redirect::to('login');
		}


		$guides = Guide::orderBy('created_at', 'desc')->paginate(10);
		return View::make('guides.index')->with('guides',$guides);
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('guides.create');
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
		
			$organization_temp = Guide::where('name', Input::get('name'))->first();
			if($organization_temp){

			Session::flash('message','There already is guide with same name.');
			return Redirect::to('guides/submitted');
			
			}
			

			
			$organization = new Guide;
			$organization->name = Input::get('name');
			$organization->url = Input::get('url');
			$organization->introduction = Input::get('introduction');
			
			$organization->save();
			
			
						

			Session::flash('message','Successfully submitted!');
			return Redirect::to('guides/submitted');
			
		}

		if (Input::hasFile('avatar'))
		{
    			$file = Input::file('avatar');
			$file->move('uploads', $file->getClientOriginalName());
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
