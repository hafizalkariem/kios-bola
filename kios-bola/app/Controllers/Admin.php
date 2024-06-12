<?php

namespace App\Controllers;

use App\Models\JerseyModel;
use App\Models\KlubModel;

class Admin extends BaseController
{

    protected $JerseyModel;
    protected $KlubModel;
    public function __construct()
    {
        $this->JerseyModel = new JerseyModel();
        $this->KlubModel = new KlubModel();
    }
    public function index()
    { {
            $Jersey = $this->JerseyModel->findAll();
            $data = [
                'title' => 'Admin | Jersey',
                'activePage' => 'Jersey',
                'Jersey' => $Jersey

            ];

            // $JerseyModel = new JerseyModel();
            return view('admin/AdminJersey', $data);
        }
    }
    public function add_klub()
    {
        $Klub = $this->KlubModel->findAll();
        $data = [
            'title' => 'Admin | Klub',
            'activePage' => 'Jersey',
            'Klub' => $Klub
        ];
        return view('admin/AdminKlub', $data);
    }
}
