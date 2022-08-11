<?php

$pathControllers = '\Modules\Web_service\Controllers\Web_service::';
$controllers     = '/web_service';

$routes->get($controllers, $pathControllers . 'index');
$routes->get($controllers . '/send_sms', $pathControllers . 'send_sms');
