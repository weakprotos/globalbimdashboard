<?php

class NewdashboardController extends BaseController {
	
	public function Newdashboard()
	{
		return View::make('Newdashboard');
	}
	








	//Login
	public function login()
	{
		if(Auth::check()) return Redirect::to('/index');
		return View::make('index');
	}

	public function loginstore()
	{
		
		if(Auth::attempt(Input::only('email','password')))
		{
			//After log in, redirect to the homepage.
			return Redirect::to('index')->with('user', Auth::user());
			//return Redirect::intended()->with('user', Auth::user());
			//return Auth::user();
		}
		
		Session::flash('message','Authentication failed. Please check your email and password.');	
		return Redirect::back()->withInput();
		//return 'Failed!';

	}
}
