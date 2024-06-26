<?php

namespace App\Controllers;

use App\Models\KlubModel;
use App\Models\JerseyModel;
use App\Models\ApparelModel;
use \Myth\Auth\Models\UserModel;
use App\Config\Services;



class page extends BaseController
{
    protected $JerseyModel;
    protected $KlubModel;
    protected $ApparelModel;
    protected $UserModel;
    public function __construct()
    {
        $this->KlubModel = new KlubModel();
        $this->JerseyModel = new JerseyModel();
        $this->ApparelModel = new ApparelModel();
        $this->UserModel = new UserModel();
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
        $Users = new UserModel();


        $data = [
            'title' => 'About us',
            'activePage' => 'about',
            'totalApparels' => $Apparel->getCount(),
            'totalklub' => $Klub->getCount(),
            'totalJersey' => $Jersey->getCount(),
            'totalUser' => $Users->getCount()
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
        helper(['form', 'url']);
        $keyword = $this->request->getGet('keyword');
        if ($keyword) {
            $this->KlubModel->search($keyword);
        }

        $data = [
            'title' => 'Daftar Klub | Kios Bola',
            'activePage' => 'pricing',
            'Klub' => $this->KlubModel->paginate(8, 'klub'),
            'pager' => $this->KlubModel->pager,
            'keyword' => $keyword,


        ];

        return view('pages/pricing', $data);
    }
}
