<?php

class SessionsController extends BaseController{

	public function create()
	{
		if(Auth::check()) return Redirect::to('index');
		return View::make('sessions.create');
	}

	public function store()
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

	public function destroy()
	{
		Auth::logout();
		Session::flash('message','Successfully logged out. Redirect to homepage in 3 seconds.');
		return Redirect::to('sessions/submitted');
	}
}
