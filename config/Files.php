<?php

namespace App\config;

class Files
{
    private $files;

    public function __construct($files)
    {
        $this->files = $files;
    }

    public function getName($name)
    {

        return $this->files[$name]['name'];
    }

    public function getTmp($name)
    {
        return $this->files[$name]['tmp_name'];
    }

    public function getFiles($name)
    {
        return $this->files[$name];
    }

}