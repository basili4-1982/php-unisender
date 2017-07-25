<?php

namespace unisender\commands;


use unisender\Command;

class ValidateSender extends Command
{
    protected $onlyApiKey=true;

    public function __construct($email)
    {
        $this->result = [
            "email" => $email,
        ];
        $this->actionUrl = '/api/validateSender';
    }
}