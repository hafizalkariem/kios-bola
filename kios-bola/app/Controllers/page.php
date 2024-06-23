<?php

namespace App\Controllers;

use App\Models\KlubModel;
use App\Models\JerseyModel;
use App\Models\ApparelModel;
use App\Config\Services;

class page extends BaseController
{
    protected $JerseyModel;
    protected $KlubModel;
    protected $ApparelModel;
    public function __construct()
    {
        $this->KlubModel = new KlubModel();
        $this->JerseyModel = new JerseyModel();
        $this->ApparelModel = new ApparelModel();
    }


    public function index()
    {

        $Apparel = $this->ApparelModel->findAll();
        $data = [
            'title' => 'kios bola',
            'activePage' => 'home',
            'Apparel' => $Apparel
        ];
        return view('pages/index', $data);
    }
    public function about()
    {
        $Jersey = new JerseyModel();
        $Klub = new KlubModel();
        $Apparel = new ApparelModel();

        $data = [
            'title' => 'About us',
            'activePage' => 'about',
            'totalApparels' => $Apparel->getCount(),
            'totalklub' => $Klub->getCount(),
            'totalJersey' => $Jersey->getCount()
        ];
        return view('pages/about', $data);
    }
    public function contact()
    {
        $data = [
            'title' => 'contact us',
            'activePage' => 'contact'
        ];
        return view('pages/contact', $data);
    }
    public function pricing()
    {
        $keyword = $this->request->getVar('keyword');
        if ($keyword) {
            $Klub = $this->KlubModel->search($keyword);
        } else {
            $Klub = $this->KlubModel->findAll();
        }

        $data = [
            'title' => 'Daftar Klub | Kios Bola',
            'activePage' => 'pricing',
            'Klub' => $Klub

        ];
        return view('pages/pricing', $data);
    }
}
