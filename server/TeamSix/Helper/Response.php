<?php

namespace TeamSix\Helper; 

class Response
{
    public static function sendFormattedResponse(array $response): void
    {
        header("Access-Control-Allow-Origin: *");
        header("Access-Control-Allow-Headers: *");
        header('Content-Type: application/json', '', 200);
        echo json_encode($response); 
        exit; 
    }
}