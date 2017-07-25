<?php
/**
 * Created by PhpStorm.
 * User: V.ahmedzhanov
 * Date: 24/07/17
 * Time: 14:53
 */

namespace unisender\commands;


use unisender\Command;

class Hooks extends Command
{
    const ACTION_SET = 'set';
    const ACTION_GET = 'get';
    const ACTION_DEL = 'delete';

    const DELIVERY_INFO_DETAILED = 1;
    const DELIVERY_INFO_LESS = 0;

    const SINGLE_EVENT_ON = 1;
    const SINGLE_EVENT_OFF = 0;

    const SENT = 'sent';
    const DELIVERED = 'delivered';
    const OPENED = 'opened';
    const HARD_BOUNCED = 'hard_bounced';
    const SOFT_BOUNCED = 'soft_bounced';
    const SPAM = 'spam';
    const CLICKED = 'clicked';
    const UNSUBSCRIBED = 'unsubscribed';

    private function actionSet($param)
    {
        $this->actionUrl = '/transactional/api/v1/webhook/set.json';

        $result = [
            'url'           => $param['url'],
            'event_format'  => isset($param['event_format']) ? $param['event_format'] : 'json_post',
            "delivery_info" => isset($param['delivery_info']) ? $param['delivery_info'] : 0,
            "single_event"  => (int)!empty($param['single_event']),
            "maxParallel"   => isset($param['maxParallel']) ? $param['maxParallel'] : 10,
        ];

        $result['events']['email_status'] = $param['email_status'];

        if (!empty($param['spam_block'])) {
            $result['events']['spam_block'] = $param['spam_block'];
        }

        $this->result = $result;
    }

    private function actionGet($param)
    {
        $this->actionUrl = '/transactional/api/v1/webhook/get.json';

        $result = [
            'url' => $param['url'],
        ];
        $this->result = $result;
    }

    private function actionDelete($param)
    {
        $this->actionUrl = '/transactional/api/v1/webhook/delete.json';

        $result = [
            'url' => $param['url'],
        ];
        $this->result = $result;
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
        }
    }
}