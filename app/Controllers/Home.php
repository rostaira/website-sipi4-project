<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Home extends BaseController
{
    public function landing(){
        return view('landing_page');
    }
    public function index(){
        echo view ('layout/header');
        echo view ('layout/sidebar');
        echo view ('layout/dashboard');
    }
    public function eksternal()
    {
        return view('eksternal_page');
    }
}
