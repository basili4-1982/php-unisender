<?php

/**
 *
 *  Первичное сообщение устанвливает настройки для всей рассылки може
 *
 * Class Message
 */

class Recipient
{
    // Список замен
    private $substitutions = [];
    private $meta = [];
    protected $email;

    public function __construct($email)
    {
        $this->email = $email;
    }

    public function addSubs($key, $substitution)
    {
        $this->substitutions[ $key ] = $substitution;
    }

    public function addMeta($key, $meta)
    {
        $this->meta[ $key ] = $meta;
    }

    public function getData()
    {
        $data=[
            'email'         => $this->email
        ];

        if (!empty($this->substitutions)) {
            $data['substitutions'] = $this->substitutions;
        }

        if (!empty($this->meta)) {
            $data['metadata'] = $this->meta;
        }

        return $data;
    }
}