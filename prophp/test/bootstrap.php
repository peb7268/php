<?php 
$src = getcwd()."/src";
set_include_path(get_include_path().":{$src}");
require_once "{$src}/autoload.php"; ?>