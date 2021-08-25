<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/vendor/autoload.php';

use TeamSix\Helper\Response; 
use TeamSix\Helper\Generator\FilenameGenerator; 

$response = [
    'success' => true
]; 

$filename = FilenameGenerator::generateNewFilename(); 

// Process it for security
$image = imagecreatefromstring(base64_decode($_REQUEST['file']));

if ($image) {
    //storing image
    //move_uploaded_file($_FILES['file']['tmp_name'], "../data/" . $filename);
    file_put_contents("../data" . $filename, $_REQUEST['file']);

    //storing metadata for image 
    file_put_contents("../data/" . $filename . ".json", json_encode($_REQUEST));
} else {
    $response['success'] = false;
}

Response::sendFormattedResponse($response); 
exit; 