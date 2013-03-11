<?php 
error_reporting(E_ALL); 
define('MODE', 'dev');
$_ENV['mode'] = MODE;

require_once "lib/autoloader.php";
require_once "functions.php";