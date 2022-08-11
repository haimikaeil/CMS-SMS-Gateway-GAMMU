<?php

$pathControllers = '\Modules\Dashboard\Controllers\Dashboard::';
$controllers     = '/dashboard';

$routes->get($controllers, $pathControllers . 'index');
$routes->post($controllers . '/cek_pulsa', $pathControllers . 'cek_pulsa');
$routes->post($controllers . '/get_grafik_bulan', $pathControllers . 'get_grafik_bulan');
$routes->get($controllers . '/get_chart', $pathControllers . 'get_chart');
$routes->get($controllers . '/get_belum_baca', $pathControllers . 'get_belum_baca');
$routes->get($controllers . '/pesan_keluar', $pathControllers . 'pesan_keluar');
