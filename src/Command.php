<?php

namespace unisender;

abstract class Command
{
    protected $result = [];

    protected $actionUrl = null;

    protected $onlyApiKey = false;

    public function getActionUrl()
    {
        return $this->actionUrl;
    }

    public function exec()
    {
        $data = $this->result;
        $data['onlyApiKey'] = $this->onlyApiKey;
        return $data;
    }
}