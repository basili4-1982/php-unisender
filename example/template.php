<?php

$config = require 'config.php';

$newsletter = new Newsletter();

$template = new Template();

$template->setBody('Тестовое сообщение');

$newsletter->applyTemplate($template);

$newsletter->run();
