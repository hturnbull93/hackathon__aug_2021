<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/vendor/autoload.php';

use TeamSix\Helper\Response; 
use TeamSix\Helper\Generator\FilenameGenerator; 

$imageString = preg_replace("/^data:image\/\w+;base64,/", "", $_REQUEST['file']);

$response = [
    'success' => true
]; 

$filename = FilenameGenerator::generateNewFilename(); 

// Process it for security
$image = imagecreatefromstring(base64_decode($imageString));

if ($image) {
    //storing image
    //move_uploaded_file($_FILES['file']['tmp_name'], "../data/" . $filename);
    file_put_contents("../data" . $filename, $imageString);

    //storing metadata for image 
    file_put_contents("../data/" . $filename . ".json", json_encode($_REQUEST));
} else {
    $response['success'] = false;
}

Response::sendFormattedResponse($response); 
exit; 