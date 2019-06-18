<?php

final class Email
{
    private $email;

    public function __construct(string $email)
    {
         if (!filter_validate('EMAIL')) {
             throw new Exception;
             return false;
         }
         $this->email = $email;
    }

    public function getEmail()
    {
        return $this->email;
    }
}

