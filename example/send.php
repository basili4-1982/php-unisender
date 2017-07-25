<?php

require realpath(__DIR__ . "/../vendor") . DIRECTORY_SEPARATOR . "autoload.php";

use unisender\commands\CheckedEmail;
use unisender\commands\Hooks;
use unisender\commands\Send;
use unisender\commands\ValidateSender;
use unisender\Connect;
use unisender\Request;

$connect = new Connect('api_key', 'user');


$request = new Request($connect);

// ValidateSender
var_dump($request->send(new ValidateSender('basili4.1982@gmail.com')));

/*
    var_dump($request->send(new Hooks([],Hooks::ACTION_SET)));
    var_dump($request->send(new Hooks([],Hooks::ACTION_GET)));
    var_dump($request->send(new Hooks([],Hooks::ACTION_DEL)));
 */


var_dump($request->send(new CheckedEmail('email@domen.com')));

