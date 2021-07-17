<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class HomeController extends Controller
{
	public function index($nama = 'Welcome', $page = 'index')
	{
		if (!is_file(APPPATH . '/Views/home/' . $page . '.php')) {
			// jika halaman tidak ditemukan
			throw new \CodeIgniter\Exceptions\PageNotFoundException($page . ' Gagal Diakses ');
		}

		$data['title'] = 'Home';
		$data['nama'] = $nama;
		return view('home/' . $page, $data);
	}
}
