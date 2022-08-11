<?php

$pathControllers = '\Modules\broadcast_pesan\Controllers\broadcast_pesan::';
$controllers     = '/broadcast_pesan';

$routes->get($controllers, $pathControllers . 'index');
$routes->post($controllers . '/send', $pathControllers . 'send');
