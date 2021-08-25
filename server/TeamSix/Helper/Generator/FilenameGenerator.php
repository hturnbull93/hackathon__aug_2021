<?php

namespace TeamSix\Helper\Generator; 

class FilenameGenerator
{
    public static function generateNewFilename(string $extension): string
    {
        $timestamp = microtime(); 

        return md5($timestamp) . $extension; 
    }
}