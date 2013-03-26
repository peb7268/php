<?php 
//make sure autoload also works from the class context
require_once CLASS_PATH."Command.php";
require_once CLASS_PATH."Registry.php";

class Login extends Command {
	public function __construct(){}
	public function execute( CommandContext $context )
	{
		$manager 	= Registry::getAccessManager();
		$user  		= $context->get('username');
		$pass 		= $context->get('pass');
		$login 		= $manager->login;
		$user_obj 	= $login( $user, $pass );
		if( is_null($user_obj) )
		{
			$context->setError( $manager->getError() );
			return false;
		}
		$context->addParam( 'user', $user_obj );
		return true;
	}
}