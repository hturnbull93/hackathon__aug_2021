<?php 

namespace TeamSix\Handler; 

use TeamSix\Helper\Generator\FilenameGenerator;

class UploadRequest
{
    private $extension;
    
    private $tags; 

    public function __construct(string $extension, array $tags)
    {
        $this->extension = $extension; 
        $this->tags = $tags; 
    }

    
    private function execute(): array
    {
        $filename = FilenameGenerator::generateNewFilename(
            $this->extension
        );
        
        return [
            'filename' => $this->filename, 
            'tags'     => $this->tags 
        ]; 
    }
}