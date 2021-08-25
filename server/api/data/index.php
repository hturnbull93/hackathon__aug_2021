<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/vendor/autoload.php';

use TeamSix\Helper\Response; 

$contents = scandir("../data");

$data['images'] = [];
foreach($contents as $file) {
    
    if (str_contains($file, ".json")) {
        $filedata = json_decode(file_get_contents($file), true);
        $filedata['path'] = $file;
        $data['images'][] = $filedata;
    }
}

$data['tags'] = array_keys((array) json_decode(file_get_contents('../names.json', true)));

$response = [
    'success' => true,
    'result'  => $data
]; 

Response::sendFormattedResponse($response); 
exit; 