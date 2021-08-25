<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/vendor/autoload.php';

use TeamSix\Helper\Response; 

$response = [
    'success' => true
]; 


Response::retrieveFormattedResponse($response); 
exit; 