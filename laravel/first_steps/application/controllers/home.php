<?php

class Home_Controller extends Base_Controller {
	public $restful = true;
	/* Default Non-RESTful Style
		public function action_index() {
			return View::make('home.index');
		}
	*/

	//Enable Restful Routing: GET, POST, PUT, DELETE
	public function get_index(){
		$message = "get index method firing";
		return View::make('home.index')->with('message', $message);
	}

	public function get_about($name){
		$message = "get about method firing and finding info about {$name}";
		return View::make('home.about')->with('message', $message);
	}

	public function post_index(){
		$message = "post index method firing";
		return View::make('home.index')->with('message', $message);
	}


}