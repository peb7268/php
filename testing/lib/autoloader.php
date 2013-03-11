<?php
$root 			= getcwd();

$cwdpath 		= get_include_path().":".getcwd();
$module_path 	= dirname($root).DIRECTORY_SEPARATOR."modules";
$path 			= get_include_path().':'.$module_path.':'.$cwdpath;
set_include_path($path);

function __autoload($className)
{	
	$base = 'classes'.DIRECTORY_SEPARATOR;
	$file = $base.$className.'.php';
	if(file_exists($file)){
		require_once $file;
		return;
	} 
	throw new Exception("File could not be autoloaded", 1);
}