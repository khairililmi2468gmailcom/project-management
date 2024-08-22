<?php

namespace App\Controllers;

class register extends BaseController
{
    public function register()
    {
        $data = [
            'nilai' => 'register'
        ];
        echo view('home/register');
    }
}
