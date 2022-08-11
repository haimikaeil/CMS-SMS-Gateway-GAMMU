<?php

$pathControllers = '\Modules\pesan_masuk\Controllers\pesan_masuk::';
$controllers     = '/pesan_masuk';

$routes->get($controllers, $pathControllers . 'index');
$routes->post($controllers . '/get_data', $pathControllers . 'get_data');
$routes->post($controllers . '/update_is_baca', $pathControllers . 'update_is_baca');
