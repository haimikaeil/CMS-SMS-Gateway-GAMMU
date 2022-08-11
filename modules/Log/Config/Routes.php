<?php

$pathControllers = '\Modules\Log\Controllers\Log::';
$controllers     = '/log';

$routes->get($controllers, $pathControllers . 'index');
$routes->post($controllers . '/get_data', $pathControllers . 'get_data');
