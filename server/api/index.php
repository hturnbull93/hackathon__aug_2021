<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/vendor/autoload.php';

use TeamSix\Helper\Response;

echo Response::generateNewFilename('.png'); 
exit; 


$sampleResponse = ['name' => 'Bond'];

Response::retrieveFormattedResponse($sampleResponse); 
exit; 
