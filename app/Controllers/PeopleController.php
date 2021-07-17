<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\PeopleModel;

class PeopleController extends Controller
{
    public function __construct()
    {
        $this->model = new PeopleModel();
        helper('form');
    }

    public function index()
    {
        // $faker = \Faker\Factory::create();
        // dd($faker->name);
        $keyword = $this->request->getVar('keyword');
        if ($keyword) {
            $people = $this->model->search($keyword);
        } else {
            $people = $this->model;
        }

        $currentPage = $this->request->getVar('page_bootstrap') ? $this->request->getVar('page_bootstrap') : 1;
        $data = [
            'title' => 'People',
            'rows' =>  $people->paginate(10, 'bootstrap'),
            'pager' => $this->model->pager,
            'currentPage' => $currentPage
        ];

        return view('people/index', $data);
    }
}
