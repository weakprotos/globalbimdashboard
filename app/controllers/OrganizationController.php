<?php

class OrganizationController extends \BaseController {




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


	
		$organizations = Organization::orderBy('created_at', 'desc')->paginate(12);
		return View::make('organizations.index')->with('organizations',$organizations);
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('organizations.create');
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
			'url' => 'required',
			'category' => 'required',
			'image' => 'required'
		
		);

		$validator = Validator::make(Input::all(),$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withInput()->withErrors($validator);
		}else {
		
			$organization_temp = Organization::where('name', Input::get('name'))->first();
			if($organization_temp){

			Session::flash('message','There already is organization.');
			return Redirect::to('organiztions/submitted');
			
			}
			

			

			$file = Input::file('image');

			if(strtolower($file->getClientOriginalExtension()) != 'png')
			{
				Session::flash('message','Submission Failed! The image should be png file.');
				return Redirect::to('organizations/submitted');
			}

			$destinationPath = 'uploads/';
			$filename = str_random(50).'.'.$file->getClientOriginalExtension();
			Input::file('image')->move($destinationPath, $filename);



			$organization = new Organization;
			$organization->image_name = $filename;
			$organization->category = Input::get('category');
			$organization->name = Input::get('name');
			$organization->url = Input::get('url');
			$organization->introduction = Input::get('introduction');
			
			$organization->save();
			
			
						

			Session::flash('message','Successfully submitted!');
			return Redirect::to('organizations/submitted');
			
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
