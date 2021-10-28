<?php

class RequiredValidationException extends ValidationException
{
    public function __construct($campo, $message = " requerdio, no ha sido rellenado.")
    {
        parent::__construct($campo.$message);
    }
}