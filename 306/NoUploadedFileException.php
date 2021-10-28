<?php

class NoUploadedFileException extends FileUploadException
{
    public function __construct($message = "No se ha subido el archivo.")
    {
        parent::__construct($message);
    }
}