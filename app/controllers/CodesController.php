<?php

class CodesController extends \BaseController {

	public function index()
	{
		$codes = DB::table('codes')->get();
		return View::make('codes.index', ['codes' => $codes]);
	}

	public function show($codename)
	{
		$code = DB::table('codes')->where('codename',$codename)->first();
		return View::make('codes.show',['code' => $code]);
	}
}
