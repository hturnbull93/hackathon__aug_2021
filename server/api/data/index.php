<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/vendor/autoload.php';

use TeamSix\Helper\Response; 

$data = [
    'images/image1.png',
    'images/image2.png',
    'images/image3.png'
]; 

$response = [
    'success' => true,
    'result'  => $data
]; 


Response::retrieveFormattedResponse($response); 
exit; 