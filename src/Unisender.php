<?php

/**
 * Base class
 * Class Unisender
 */
class Unisender
{
    private $urlUnisender = 'https://one.unisender.com';
    private $urlValidateSender = '/ru/api/validateSender';

    private $apiKey = null;
    private $userName = null;

    private function _send($url, $data)
    {
        $data['api_key'] = $this->apiKey;
        $pjson = json_encode($data);
        $ch=curl_init($url);
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $pjson);
        $result=$content = curl_exec($ch);
        curl_close($ch);

        if ($result === false) {
            throw new Exception('Invalid request sending');
        }
    }

    public function __construct($apiKey, $userName)
    {
        $this->apiKey = $apiKey;
        $this->userName = $userName;
    }

    /**
     * Подтверждение email для отправки
     * @param $email мыло для подтверждения
     */
    public function validateSender($email)
    {
        $actionUrl = $this->urlUnisender . $this->urlValidateSender;

        $data = [
            'email' => $email,
        ];

        return $this->_send($actionUrl, $data);
    }

    public function addTemplate($name)
    {

    }
}