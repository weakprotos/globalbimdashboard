<?php

class UsersController extends \BaseController {

	protected $user;


	public function index()
	{
//		$users = $this->user->all();
//		return View::make('users.index', ['users' => $users]);	
	}
	
	public function show($username)
	{
//		$user = $this->user->whereUsername($username)->first();
//		return View::make('users.show', ['user' => $user]);
	}

	public function create()
	{
		$codes = Code::lists('countryname','codename');
		return View::make('users.create')->with('codes',$codes);

	}
	
	public function confirm($confirmation_code)
	{
		if( ! $confirmation_code)
        {
            Session::flash('message','There&#39;s no verification code.');
		return Redirect::to('users/submitted');       

	}

        $preuser = Preuser::whereConfirmationCode($confirmation_code)->first();

        if ( ! $preuser)
        {
            Session::flash('message','There&#39;s no user has that code.');
		return Redirect::to('users/submitted');
        }
	if ($preuser->confirmed ==1)
	{
		Session::flash('message','Already verified. Redirect to login page in 3 seconds.');
		return Redirect::to('users/submitted');
	}else if($preuser->confirmed == 0){
	$temp_user = User::whereEmail($preuser->email)->first();
	if ($temp_user){
		Session::flash('message','There&#39;s already user with that email. Please sign up with other email.');
		return Redirect::to('users/submitted');

	}


	$user = new User;
	$user->email = $preuser->email;
	$user->username = $preuser->username;
	$user->password = $preuser->password;
	$user->country = $preuser->country;
	$user->organization = $preuser->organization;
	$user->position = $preuser->position;
	$user->company = $preuser->company;
        $user->confirmed = 1;
        $user->save();

	Session::flash('message','You have successfully verified your account. Redirect to login page in 3 seconds.');
	return Redirect::to('users/submitted');

        //return Redirect::route('login');
	}
	}	
	public function store()
	{
		$rules = array(
			'country' => 'required',
			'email' => 'required',
			'firstname' => 'required',
			'lastname' => 'required',
			'password' => 'required',
			'password2' => 'required',
			'organization' => 'required',
			'position' => 'required',
			'company' => 'required'
		
		);

		$validator = Validator::make(Input::all(),$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withInput()->withErrors($validator);
		}else if(Input::get('password')!=Input::get('password2')){
	
			Session::flash('message', "Passwords do not match.");
			return Redirect::back();
		}else{
		
		
			//confirmation
			do{
		
				$confirmation_code = str_random(50);
				$user_temp = Preuser::whereConfirmationCode($confirmation_code)->first();
			}while($user_temp);			

			$username = Input::get('firstname').' '.Input::get('lastname');


			$preuser = new Preuser;
			
			$preuser->email = Input::get('email');
			$preuser->username = $username;
			$preuser->password = Hash::make(Input::get('password'));
			$preuser->country = Input::get('country');
			$preuser->organization = Input::get('organization');
			$preuser->position = Input::get('position');
			$preuser->company = Input::get('company');
			
			//confirmation
			$preuser->confirmation_code = $confirmation_code;
			
			$preuser->save();
			
			
			//confirmation
			Mail::send('email.verify',['confirmation_code' => $confirmation_code], function($message){
				$message->to(Input::get('email'), Input::get('firstname').' '.Input::get('lastname'))->subject('Verify your email address');
			});

					
			

			Session::flash('message','Successfully submitted! Thanks for signing up! Please check your email. Redirect to login page in 3 seconds.');
			return Redirect::to('users/submitted');
			
		}
		

	}
}
