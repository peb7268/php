<?php
class Login_Controller extends Base_Controller
{
	public $restful = true;
	public $layout 	= 'layouts.master';

	public function get_index()
	{	
		$data = array(
		'date' 	 	=> date('D, F d'),
		'message' 	=> ''
		);
		Asset::add('base', 'css/base.css');
		return View::make('login.index')->with('data', $data);
	}

	public function post_index()
	{
		Asset::add('base', 'css/base.css');
		$credentials 		= array(
			'username' 	=> 	Input::get('username'),
			'password' 	=> 	Input::get('password')
		);

		if (Auth::attempt($credentials))
		{	
		    return Redirect::to('home');
		} else {
			$data = array(
			'date' 	 	=> date('D, F d'),
			'message' 	=> 'Your login attempt was unsuccessful. Please try again.'
			);
			return View::make('login.index')->with('data', $data);
		}
	}
}