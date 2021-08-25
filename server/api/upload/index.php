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

$fileContents = file_get_contents($_FILES['file']['tmp_name']);
$image = imagecreatefromstring($fileContents);

if ($image) {
    //storing image
    move_uploaded_file($_FILES['file']['tmp_name'], "../data/" . $filename);

    //storing metadata for image 
    file_put_contents("../data/" . $filename . ".json", json_encode($_REQUEST));
} else {
    $respons['success'] = false;
}

Response::sendFormattedResponse($response); 
exit; 