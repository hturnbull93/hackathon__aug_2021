<?php

class Response
{
    public static function retrieveFormattedResponse(array $response): void
    {
        header('Content-Type: application/json', '', 200);
        echo json_encode($response); 
        exit; 
    }


}