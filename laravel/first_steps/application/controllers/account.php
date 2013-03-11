<?php 
class Account_Controller extends Base_Controller {
	
	//Default Action
	public function action_index(){
		echo "im the index action of the accounts page";
	}

	//Passing variables
	public function action_welcome($name, $place){
		$data = new StdClass();
		$data->name  = $name;
		$data->place = $place;

		return View::make('account.welcome')
			-> with('data', $data);
		/* or
		$data = array(
	        'name'  => $name,
	        'place' => $place
	    );
	    return View::make('welcome', $data);
		*/
	}


}