<?php

namespace App\Controllers;

use App\Models\JerseyModel;

class jersey extends BaseController
{

    protected $JerseyModel;
    public function __construct()
    {
        $this->JerseyModel = new JerseyModel();
    }
    public function index()
    { {
            $Jersey = $this->JerseyModel->findAll();
            $data = [
                'title' => 'Jersey | Kios Bola',
                'activePage' => 'pricing',
                'Jersey' => $Jersey

            ];

            // $JerseyModel = new JerseyModel();
            return view('jersey/jersey', $data);
        }
    }
}
