<?php

class FileUploadException extends Exception
{
    public function __construct($message = "Hay una excepción con el fichero.")
    {
        parent::__construct($message);
    }
}