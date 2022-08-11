<?php

$pathControllers = '\Modules\Kontak\Controllers\Kontak::';
$controllers     = '/kontak';

$routes->get($controllers, $pathControllers . 'index');
$routes->post($controllers . '/get_data', $pathControllers . 'get_data');
$routes->get($controllers . '/tambah', $pathControllers . 'tambah');
$routes->post($controllers . '/do_tambah', $pathControllers . 'do_tambah');
$routes->get($controllers . '/edit/(:alpha)', $pathControllers . 'edit');
$routes->post($controllers . '/do_ubah', $pathControllers . 'do_ubah');
$routes->get($controllers . '/hapus/(:alpha)', $pathControllers . 'hapus');
