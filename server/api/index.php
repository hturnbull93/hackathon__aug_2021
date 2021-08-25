<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/vendor/autoload.php';

use TeamSix\Helper\Generator\FilenameGenerator;

echo FilenameGenerator::generateNewFilename('.png'); 
exit; 