<?php

namespace App\Controllers;

class Rusak extends BaseController
{
    public function index()
    {
        return view('errors/html/error_404_custom.php');
    }
}
