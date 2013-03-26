<?php
class Home_Controller extends Base_Controller {
	public $restful = true;
	public $layout = 'layouts.master';
	public $user;

	public function __construct()
	{
		parent::__construct();
		$this->filter('before', $this->setUp());
	}	
	public function setUp()
	{
		Asset::add('base', 'css/base.css');
	}
	public function get_index()
	{
		if (Auth::check()){ 
			$this->user = Auth::user();
		} else {
			return Redirect::to('/')->with('status', 'Please login to continue.');;
		}
		//fix the $user property later bc only works when authed
		$data = array(
			'date' 	 	=> date('D, F d'),
			'name' 		=> $this->user->name,
			'message' 	=> '',
			'user'		=> $this->user
		);
		return View::make('home.index')->with('data', $data);
	}
	public function post_index()
	{
		$message = "post index method firing";
		return View::make('home.index')->with('message', $message);
	}
}