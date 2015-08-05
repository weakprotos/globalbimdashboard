<?php
//Nerd Tutorial

Route::get('maps', 'PagesController@maps');

Route::get('under-construction', function()
{
	return View::make('underconstruction');
});

Route::get('bear-map', 'BearController@map');

Route::get('lion-map', 'LionController@map');


Route::get('bear-diamond', 'BearController@diamond');

Route::get('lion-diamond', 'LionController@diamond');


Route::get('bear-sub1', function()
{
	return View::make('bear-sub1');
});

Route::get('lion-sub1', function()
{
	return View::make('lion-sub1');
});

Route::get('bear-chart', 'BearController@chart');

Route::get('lion-chart', 'LionController@chart');

Route::resource('lions','LionController');

Route::resource('bears', 'BearController');

Route::resource('nerds','NerdController');

Route::resource('items','ItemsController');


//Bootstrap
Route::get('sb-test', function()
{
	return View::make('sb-test');
});


//Email Verification
Route::get('register/verify/{confirmationCode}', [
    'as' => 'confirmation_path',
    'uses' => 'UsersController@confirm'
]);

//Route::get('email.verify',function(){return View::make('email.verify');});

//Main page
Route::get('/', function(){
//return Redirect::to('dashboard');
return Redirect::to('under-construction');
});
//Route::get('dashboard', function(){return View::make('dashboard')->with('user');});


//New Dashboard
Route::get('index', 'NewdashboardController@Newdashboard');


Route::get('dashboard','PagesController@dashboard');
Route::get('charts/flot',function(){return View::make('charts.flot');});
Route::get('charts/morris',function(){return View::make('charts.morris');});
Route::get('tables',function(){return View::make('tables');});
Route::get('forms',function(){return View::make('forms');});
Route::get('ui/panels-wells',function(){return View::make('ui.panels-wells');});
Route::get('ui/buttons',function(){return View::make('ui.buttons');});
Route::get('ui/notifications',function(){return View::make('ui.notifications');});
Route::get('ui/typography',function(){return View::make('ui.typography');});
Route::get('ui/icons',function(){return View::make('ui.icons');});
Route::get('ui/grid',function(){return View::make('ui.grid');});
Route::get('blank',function(){return View::make('blank');});
//Route::get('login',function(){return View::make('login');});
//Route::get('maps/slimblimindex',function(){return 'foo bar';});
Route::get('maps/slimbimindex',function(){return View::make('maps.slimbimindex');});
Route::get('slim/about',function(){return View::make('slim.about');});
Route::get('slim/overview',function(){return View::make('slim.overview');});

Route::post('answers/store', 'AnswerController@store');
Route::post('answers/create', 'AnswerController@create');
Route::get('answers/submitted',function(){return View::make('answers.submitted');});


Route::resource('answers','AnswerController');

Route::get('languages/select', 'LanguageController@select');
Route::post('languages/selected', 'LanguageController@selected');


//Slim
Route::get('slim/map/world','SlimController@map_world');
Route::get('slim/model/world','SlimController@model_world');
Route::get('slim/model/finder','SlimController@model_finder');

Route::post('slim/model', 'SlimController@show');


Route::get('slimbim', 'SlimbimController@index'); 
Route::get('slimbimsurvey', 'SlimbimSurveyController@select');
Route::post('slimbimsurvey/create', 'SlimbimSurveyAnswerController@create');
Route::post('slimbimsurvey/store', 'SlimbimSurveyAnswerController@store');
Route::get('slimbimsurvey/submitted',function(){return View::make('slimbimsurvey.submitted');});


Route::get('sessions/submitted',function(){return View::make('sessions.submitted');});

Route::get('users/submitted',function(){return View::make('users.submitted');});
//Answer-Slim


Route::get('organizations/submitted',function(){return View::make('organizations.submitted');});
Route::get('reports/submitted',function(){return View::make('reports.submitted');});
Route::get('guides/submitted',function(){return View::make('guides.submitted');});

  
//Report

Route::post('reports/search',
	array(
	'as' => 'reports.search',
	'uses' => 'ReportController@search'));


Route::get('reports/search={search}','ReportController@postIndex');

Route::resource('reports','ReportController');


//Report
Route::resource('guides','GuideController');


//Organization
Route::resource('organizations','OrganizationController');
//Slimtestvalue
Route::resource('slimtestvalues','SlimtestvalueController');

Route::get('admin', function()
{
	return 'Admin Page';
})->before('auth');


Route::get('login','SessionsController@create');
Route::get('logout','SessionsController@destroy');
Route::resource('sessions','SessionsController');

Route::resource('users','UsersController');
//Route::resource('preusers','PreusersController');



Route::resource('codes','CodesController');

Route::get('users','UsersController@index');
Route::get('users/{username}','UsersController@show');
Route::get('codes','CodesController@index');
Route::get('codes/{codename}','CodesController@show');

Route::get('lavachart/linechart', 'LavachartController@linechart');
Route::get('about', 'PagesController@about');


//About us page
Route::get('about-us', function()
{
	return View::make('about-us');
});

Route::get('hello', 'HelloController@hello');


Route::get('dbtest', function()
{
	$users = User::where('id','>',1)->orWhere('id','<=',5)->get();
	return View::make('dbtest')->with('aaa',$users);
;
});


Route::get('page1', function()
{
	return View::make('page1');
;
});

Route::get('page2', function()
{
	return View::make('page2');
;
});

Route::get('dogs', function()
{
	$dogs = Dog::all();
	return View::make('dogs')->with('dogs',$dogs);
;
});

Route::get('finder', function()
{
	$codes = Code::lists('countryname','codename');
	return View::make('finder')->with('codes',$codes);
;
});

Route::get('casestudies', function()
{
	
	return View::make('casestudies');
;
});
Route::get('qna', function()
{
	
	return View::make('qna');
;
});
Route::get('compare', function()
{
	
	return View::make('compare');
;
});
Route::get('detail', function()
{
	
	return View::make('detail');
;
});


?>
