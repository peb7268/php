<?php class Registry
{
	public static function getAccessManager(){
		$manager = new StdClass();
		$manager->login = function($user, $pass){
			return 1;
		};

		return $manager;
	}
}