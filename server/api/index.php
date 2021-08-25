<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/vendor/autoload.php';

use iTechTeamSix\Helper\Response; 

$sampleResponse = ['name' => 'Bond'];

Response::retrieveFormattedResponse($sampleResponse); 
exit; 