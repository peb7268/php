<?php require_once('lib/config.php');
$fs = new File('erford7268');
$fs->pwd()->ls()->whoowns('.DS_Store')->whoami()->rm('.DS_Store');