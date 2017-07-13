<?php
/**
 * Created by PhpStorm.
 * User: V.ahmedzhanov
 * Date: 13/07/17
 * Time: 16:15
 */

$config = require 'config.php';

$newsletter = new Newsletter();


$newsletter->setBody('Тест сообщения для  {{ username }} ');
$newsletter->setSubject('Письмо которе изменит мир');

$recipient = new Recipient('basili4.1982@yandex.ru');

$recipient->addSubs('username', 'Васюши');

$newsletter->addRecipient($recipient);

$newsletter->run();

