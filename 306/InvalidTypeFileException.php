<?php

class InvalidTypeFileException extends FileUploadException
{
    public function __construct($message = "El tipo del fichero no es valido.")
    {
        parent::__construct($message);
    }
}