<?php

namespace TeamSix\Helper; 

class Response
{
    public static function retrieveFormattedResponse(array $response): void
    {
        header('Content-Type: application/json', '', 200);
        echo json_encode($response); 
        exit; 
    }

    public static function generateNewFilename(string $extension): string
    {
        $timestamp = microtime(); 

        return md5($timestamp) . $extension; 
    }
}