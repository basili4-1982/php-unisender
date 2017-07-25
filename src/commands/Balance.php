<?php

namespace unisender\commands;

use unisender\Command;

class Balance extends Command
{
    public function __construct()
    {
        $this->actionUrl='/transactional/api/v1/balance.json';

        $this->result=[];
    }
}