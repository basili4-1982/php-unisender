<?php
namespace unisender\commands;
use unisender\Command;

class Send extends Command
{
    public function __construct($param)
    {
        $this->result=$param;
    }
}