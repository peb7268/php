<?php
define("APP_ROOT", dirname(dirname(dirname(__FILE__))));
define("APP_PATH", dirname(dirname(__FILE__)));
define("CLASS_PATH", dirname(dirname(__FILE__)).DIRECTORY_SEPARATOR."classes".DIRECTORY_SEPARATOR);
define("MODULES_PATH", dirname(dirname(dirname(dirname(dirname(__FILE__))))).DIRECTORY_SEPARATOR."modules".DIRECTORY_SEPARATOR);

set_include_path(get_include_path().":".APP_ROOT.DIRECTORY_SEPARATOR."src".DIRECTORY_SEPARATOR."classes".DIRECTORY_SEPARATOR.":".MODULES_PATH);

function __autoload($class){
	require_once( "{$class}.php" );
}

