<?php


class SlimbimSurveyController extends BaseController {

	public function select()
	{

		if(Auth::guest())
		{
			Session::flash('message', "You have to login first in order to participate in.");
			return Redirect::to('login');
		}

		return View::make('slimbimsurvey');
	}

	public function selected()
	{
		
		

		
	}



	
}
