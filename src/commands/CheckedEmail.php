<?php
namespace unisender\commands;


use function is_null;
use unisender\Command;

class CheckedEmail extends Command
{
    public function __construct($email = null)
    {

        $this->actionUrl = 'https://api.unisender.com/ru/api/getCheckedEmail';

        $result = [];

        if (!is_null($email)) {
            $result['email'] = $email;
        }

        $this->result = $result;
    }
}