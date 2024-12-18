<?php

namespace App\Controllers;

use App\Models\QueueModel;

class Home extends BaseController
{
    public function index()
    {
        // return view('welcome_message');
        helper(['date', 'form']);
        $model = new QueueModel();
        $data = [
            'title' => 'Data Antrian',
            'getData' => $model->getAllData(),
        ];
        return view('home', $data);
    }

    public function landingPage()
    {
        // return view('welcome_message');
        helper(['date', 'form']);
        $model = new QueueModel();
        $data = [
            'title' => 'Landing Page',
            'getData' => $model->getAllData(),
        ];
        return view('landing_page', $data);
    }
}
