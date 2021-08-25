<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/vendor/autoload.php';

use TeamSix\Helper\Response; 
use TeamSix\Helper\Generator\FilenameGenerator; 

/*
$_FILES -> contain file
$_REQUEST -> metadata 

           [name] => MyFile.jpg
            [type] => image/jpeg
            [tmp_name] => /tmp/php/php6hst32
            [error] => UPLOAD_ERR_OK
            [size] => 98174


            https://www.php.net/manual/en/function.move-uploaded-file.php

*/


//loop through $_FILES 
// create new upload request for each item in array
// then use tmp_name and generated filename and pass to move_uploaded_file (referencing data directory where image goes)

//Form elemen

$response = [
    'success' => true
]; 


$filename = FilenameGenerator::generateNewFilename(); 

// Process it for security
$image = imagecreatefromstring(base64_decode($_REQUEST['file']));

var_dump($_REQUEST);
die();

if ($image) {
    //storing image
    //move_uploaded_file($_FILES['file']['tmp_name'], "../data/" . $filename);
    file_put_contents("../data" . $filename, $_REQUEST['file']);

    //storing metadata for image 
    file_put_contents("../data/" . $filename . ".json", json_encode($_REQUEST));
} else {
    $response['success'] = false;
}

/* 
Index code
*/



Response::sendFormattedResponse($response); 
exit; 