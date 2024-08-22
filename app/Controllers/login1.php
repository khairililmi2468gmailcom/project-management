<?php

namespace App\Controllers;

class login extends BaseController
{
    public function login()
    {
        $data = [
            'nilai' => 'View User'
        ];


        echo view('home/login');
    }
}
