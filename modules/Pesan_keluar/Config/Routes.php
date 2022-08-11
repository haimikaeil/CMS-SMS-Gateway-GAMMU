<?php

$pathControllers = '\Modules\pesan_keluar\Controllers\pesan_keluar::';
$controllers     = '/pesan_keluar';

$routes->get($controllers, $pathControllers . 'index');
$routes->post($controllers . '/get_data', $pathControllers . 'get_data');
