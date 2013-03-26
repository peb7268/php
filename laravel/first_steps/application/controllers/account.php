<?php 
class Account_Controller extends Base_Controller {
	public $layout  = 'layouts.master';
	public $restful = true;
	public $user;
	public $data;
	
	public function __construct()
	{
		$this->filter('before', $this->setUp());
	}	
	public function setUp()
	{
		Asset::add('base', 'css/base.css');
		Asset::add('jquery', 'http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"');
		Asset::add('global', 'js/global.js');

		if (Auth::check()){ 
			$this->user = Auth::user();
			$this->data = array(
				'date' 	 	=> date('D, F d'),
				'name' 		=> $this->user->name,
				'message' 	=> '',
				'user'		=> $this->user
			);
		} else {
			return Redirect::to('/')->with('status', 'Please login to continue.');;
		}
	}
	public function get_logout()
	{
		Auth::logout();
		return Redirect::to('/');
	}
	public function get_profile()
	{	
		return View::make('account.profile')-> with('data', $this->data);
	}
}