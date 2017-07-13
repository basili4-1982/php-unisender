<?php
/**
 * Подьверждение  емейла для отправки писем
 *  подробности
 *  https://one.unisender.com/ru/docs
 */

$config = require 'config.php';

$unisender = new Unisender($config['apy_key'], $config['user_name']);

$unisender->validateSender('email@domain.ru');
