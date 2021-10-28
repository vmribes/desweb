<?php

class TooBigFileException extends FileUploadException
{
    public function __construct($message = "El fichero es demasiado grande")
    {
        parent::__construct($message);
    }
}