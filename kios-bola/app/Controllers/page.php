<?php

namespace App\Controllers;

use App\Models\KlubModel;
use App\Models\JerseyModel;

class page extends BaseController
{
    protected $KlubModel;
    public function __construct()
    {
        $this->KlubModel = new KlubModel();
    }


    public function index()
    {
        $data = [
            'title' => 'kios bola',
            'activePage' => 'home'
        ];
        return view('pages/index', $data);
    }
    public function about()
    {
        $data = [
            'title' => 'About us',
            'activePage' => 'about'
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
        $Klub = $this->KlubModel->findAll();

        $data = [
            'title' => 'Daftar Klub | Kios Bola',
            'activePage' => 'pricing',
            'Klub' => $Klub

        ];
        return view('pages/pricing', $data);
    }
}
