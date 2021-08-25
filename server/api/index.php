<?php

require_once '../vendor/autoload.php'; 


use TeamSix\Generator\ImageFilenameGenerator;

echo ImageFilenameGenerator::generateNewFilename('.png'); 
exit; 


use TeamSix\Helper\Response; 

$sampleResponse = ['name' => 'Bond'];

Response::retrieveFormattedResponse($sampleResponse); 
exit; 
