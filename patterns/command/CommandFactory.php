<?php
//The client = Responsible for instantiating the command object.
class CommandFactory
{
	private static $dir = CLASS_PATH;

	public static function getCommand( $action = "Default" )
	{
		$class = ucfirst(strtolower($action));
		$file  = CLASS_PATH."{$class}Command.php";

		if ( ! file_exists($file) )
		{
			throw new CommandNotFoundException("File {$file} not found.");
		}
		require_once( $file );
		if( ! class_exists( $class ))
		{
			throw new Exception("No class of {$class} located in ".getcwd().".");
		}
	
		$cmd = new $class();
		return $cmd;
	}
}