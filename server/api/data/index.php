<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/vendor/autoload.php';

use TeamSix\Helper\Response; 

$image1 = new stdClass; 
$image1->tags = [
    'andrew.spode@itech.media',
    'harry.turnball@itech.media'
];
$image1->path = 'images/image1.png';

$image2 = new stdClass; 
$image2->tags = [
    'harry.turnball@itech.media'
];
$image2->path = 'images/image2.png';



$data = [
    $image1, 
    $image2
]; 

$response = [
    'success' => true,
    'result'  => $data
]; 


Response::retrieveFormattedResponse($response); 
exit; 