<?php

namespace App\Controllers;

use App\Models\JerseyModel;

class Admin extends BaseController
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
                'title' => 'Admin | Jersey',
                'activePage' => 'AdminJersey',
                'Jersey' => $Jersey

            ];

            // $JerseyModel = new JerseyModel();
            return view('admin/AdminJersey', $data);
        }
    }
}
