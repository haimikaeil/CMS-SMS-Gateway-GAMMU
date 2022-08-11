<?php

$pathControllers = '\Modules\pesan_terkirim\Controllers\pesan_terkirim::';
$controllers     = '/pesan_terkirim';

$routes->get($controllers, $pathControllers . 'index');
$routes->post($controllers . '/get_data', $pathControllers . 'get_data');
