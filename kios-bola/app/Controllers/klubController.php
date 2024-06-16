<?php

namespace App\Controllers;

use App\Models\ApparelModel;
use App\Models\JerseyModel;
use App\Models\KlubModel;

class klubController extends BaseController
{

    protected $JerseyModel;
    protected $KlubModel;
    protected $ApparelModel;
    public function __construct()
    {
        $this->JerseyModel = new JerseyModel();
        $this->KlubModel = new KlubModel();
        $this->ApparelModel = new ApparelModel();
    }
    public function create()
    {
        $Klub = $this->KlubModel->findAll();
        session();
        $data = [
            'title' => 'Create Jersey',
            'activePage' => 'jersey',
            'Klub' => $Klub
        ];
        return view('klub/create', $data);
    }
}
