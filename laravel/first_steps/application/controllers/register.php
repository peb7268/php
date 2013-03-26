<?php
class Register_Controller extends Base_Controller
{
	public $restful = true;
	public $layout 	= 'layouts.master';

	public function get_index()
	{	
		$data = array(
		'date' 	 	=> date('D, F d'),
		'message' 	=> '',
		'user' 		=> $user = User::find(1)
		);
		Asset::add('base', 'css/base.css');
		return View::make('register.index')->with('data', $data);
	}

	public function post_index()
	{
		Asset::add('base', 'css/base.css');
		$user_info 		= array(
			'name' 		=>  Input::get('name'),
			'username' 	=> 	Input::get('username'),
			'password' 	=> 	Input::get('password'),
			'confirm' 	=> 	Input::get('password_confirmation')
		);

		if(! is_null($user_info['username']) && ($user_info['password'] == $user_info['confirm']))
		{
			$message 	= 'Ready to register';
			$user 		= new User();

			$id = $user->create_user($user_info); 
			echo "<h1> ID is: ".$id." </h1>";
		}
		if(! isset($message)) {
			$message = 'Registration error';

		}

		$data = array(
			'date' 	 	=> date('D, F d'),
			'message' 	=> $message,
			'creds' 	=> $user_info
		);
		return View::make('register.index')->with('data', $data);
	}
}