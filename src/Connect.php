<?php

namespace unisender;
/**
 * Class Connect
 * @package unisender
 * @property $apiKey
 * @property $user
 * @property $lang
 * @property $url
 */
class Connect
{
    protected $options = [];
    protected $rootActionUrl = "https://one.unisender.com";

    const LANG_RU = 'ru';
    const LANG_EN = 'en';

    public function __construct($apiKey, $user, $lang = self::LANG_EN)
    {
        $this->options['apiKey'] = $apiKey;
        $this->options['api_key'] = $apiKey;
        $this->options['user'] = $user;
        $this->options['lang'] = $lang;
        $this->options['url'] = $this->rootActionUrl . "/" . $this->options['lang'];
    }

    public function __get($name)
    {
        if (isset($this->options[ $name ])) {
            return $this->options[ $name ];
        }

        return null;
    }
}