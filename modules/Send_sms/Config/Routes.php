<?php

$pathControllers = '\Modules\send_sms\Controllers\send_sms::';
$controllers     = '/send_sms';

$routes->get($controllers, $pathControllers . 'index');
$routes->post($controllers . '/send', $pathControllers . 'send');
