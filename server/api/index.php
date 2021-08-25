<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/vendor/autoload.php';

use TeamSix\Helper\Response;

var_dump(get_class_methods(TeamSix\Helper\Response::class));
exit;  

echo Response::generateNewFilename('.png'); 
exit; 