<?php

class DbException extends Exception
{
    public function __construct($message = null, $code = 0)
    {
        $message = "Database error: $message";
        parent::__construct($message, $code);
    }
}