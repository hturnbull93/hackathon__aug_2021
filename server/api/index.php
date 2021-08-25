<?php

require_once '../vendor/autoload.php'; 

use TeamSix\Helper\Response; 

$sampleResponse = ['name' => 'Bond'];

Response::retrieveFormattedResponse($sampleResponse); 
exit; 
