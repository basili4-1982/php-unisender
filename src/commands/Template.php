<?php

namespace unisender\commands;


use unisender\Command;
use unisender\data\TemplData;

class Template extends Command
{
    const ACTION_SET = 'set';
    const ACTION_GET = 'get';
    const ACTION_DEL = 'delete';
    const ACTION_LIST = 'list';


    private function actionGet($id)
    {
        $this->actionUrl = "/transactional/api/v1/template/get.json";
        $result = [];
        $result['id'] = $id;

        return $result;
    }

    private function actionSet(TemplData $templ)
    {
        $this->actionUrl = "/transactional/api/v1/template/set.json";
        $result = [];
        $result['template'] = $templ();
        $this->result = $result;
    }

    private function actionDelete($id)
    {
        $this->actionUrl = "/transactional/api/v1/template/delete.json";
        $result = [];
        $result['id'] = $id;

        return $result;
    }


    private function actionList($param)
    {
        $limit = $param['limit'];
        if (!isset($param['offset'])) {
            $param['offset'] = 0;
        }
        $offset = $param['offset'];

        $result = [];
        $result['limit'] = $limit;
        $result['offset'] = $offset;

        return $result;
    }

    public function __construct($param, $action)
    {
        switch ($action) {

            case self::ACTION_GET: {
                $this->actionGet($param);
                break;
            }

            case self::ACTION_SET: {
                $this->actionSet($param);
                break;
            }

            case self::ACTION_DEL: {
                $this->actionDelete($param);
                break;
            }

            case self::ACTION_LIST: {
                $this->actionList($param);
                break;
            }
        }
    }
}