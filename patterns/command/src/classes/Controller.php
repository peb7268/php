<?php 
//The invoker - deploys the command object
class Controller {
	private $context;

	public function __construct()
	{
		$this->context = new CommandContext();
	}
	public function getContext()
	{
		return $this->context;
	}
	public function process()
	{
		$cmd = CommandFactory::getCommand( $this->context->get('action') );
		if( ! $cmd->execute( $this->context )){
			//handle failure
			echo "failure";
		} else 
		{
			//handle success
			//dispatch view
			echo "success";
		}
	}
}