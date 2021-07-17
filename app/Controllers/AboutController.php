<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class AboutController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'About',
        ];
        return view('about/index', $data);
    }
}
