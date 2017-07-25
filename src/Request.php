<?php

namespace unisender;

use function substr;

class Request
{
    /***
     * @var Connect
     */
    protected $connect = null;

    protected function addConnectToData($data)
    {
        $onlyApiKey = false;
        if (isset($data['onlyApiKey'])) {
            $onlyApiKey = $data['onlyApiKey'];
            unset($data['onlyApiKey']);
        }

        $data['api_key'] = $this->connect->apiKey;
        if (!$onlyApiKey) {
            $data['user'] = $this->connect->user;
        }

        return $data;
    }

    public function __construct(Connect $connect)
    {
        $this->connect = $connect;
    }

    public function send(\unisender\Command $command)
    {

        $actionUrl = $command->getActionUrl();

        if (substr($actionUrl, 0, 4) == 'http') {
            // абсолютный путь
            $url = $actionUrl;
        } else {
            $url = $this->connect->url . $actionUrl;
        }

        // $data - массив для отправки сервису
        $data = $this->addConnectToData($command->exec());

        // огонь

        return [$url, $data];
    }
}

