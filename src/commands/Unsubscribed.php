<?php

namespace unisender\commands;


use unisender\Command;

class Unsubscribed extends Command
{

    const ACTION_CHECK = 'check';
    const ACTION_LIST = 'list';

    private function actionCheck($email)
    {
        $this->actionUrl = '/transactional/api/v1/unsubscribed/check.json';
        $result = [];
        $result['address'] = $email;
        $this->result = $result;
    }

    private function actionList()
    {
        $this->actionUrl = '/transactional/api/v1/unsubscribed/list.json';
        $this->result = [];
    }

    public function __construct($param, $type = self::ACTION_CHECK)
    {
        switch ($type) {
            case self::ACTION_CHECK: {
                $this->actionCheck($param);
                break;
            }

            case self::ACTION_LIST: {
                $this->actionList();
                break;
            }
        }
    }
}