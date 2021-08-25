<?php

require_once '../vendor/autoload.php'; 

use iTechTeam6\Helper\Response; 

$sampleResponse = ['name' => 'Bond'];

Response::retrieveFormattedResponse($sampleResponse); 
exit; 
