<?php require_once "src/lib/config.php";

/** -- The Command Pattern -------------------------------------------------------------------------------------------------------
 *  Has 3 main players:
 *	
 *	Client  : Instantiates the command object
 *  Invoker : Deploy's the command object
 *  Reciever: What the command object operates on..
 * 
 *-------------------------------------------------------------------------------------------------------------------------------*/

//The invoker
$controller = new Controller(); 				

// fake user request
$context = $controller->getContext();
$context->addParam('action', 'login' );
$context->addParam('username', 'bob' );
$context->addParam('pass', 'tiddles' );
$controller->process();