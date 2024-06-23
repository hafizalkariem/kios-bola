<?php

namespace App\Controllers;

use App\Models\ApparelModel;
use App\Models\JerseyModel;
use App\Models\KlubModel;

class Admin extends BaseController
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
    public function index()
    {
        helper(['form', 'url']);
        $current_page = $this->request->getVar('page_jersey') ? $this->request->getVar('page_jersey') : 1;
        $keyword = $this->request->getGet('keyword');

        if ($keyword) {
            $this->JerseyModel->search($keyword);
        }

        $data = [
            'title' => 'Admin | Jersey',
            'activePage' => 'Jersey',
            'keyword' => $keyword,
            'Jersey' => $this->JerseyModel->paginate(5, 'jersey'),
            'pager' => $this->JerseyModel->pager,
            'current_page' => $current_page
        ];

        return view('admin/AdminJersey', $data);
    }
    public function add_klub()
    {
        helper(['form', 'url']);
        $current_page = $this->request->getVar('page_klub') ? $this->request->getVar('page_klub') : 1;
        $keyword = $this->request->getGet('keyword');
        if ($keyword) {
            $this->KlubModel->search($keyword);
        }
        $data = [
            'title' => 'Admin | Klub',
            'activePage' => 'Jersey',
            'keyword' => $keyword,
            'Klub' => $this->KlubModel->paginate(5, 'klub'),
            'pager' => $this->KlubModel->pager,
            'current_page' => $current_page
        ];
        return view('admin/AdminKlub', $data);
    }
    public function add_apparel()
    {
        helper(['form', 'url']);
        $current_page = $this->request->getVar('page_apparel') ? $this->request->getVar('page_apparel') : 1;
        $keyword = $this->request->getGet('keyword');
        if ($keyword) {
            $this->ApparelModel->search($keyword);
        }
        $data = [
            'title' => 'Admin | Apparel',
            'activePage' => 'Jersey',
            'keyword' => $keyword,
            'Apparel' => $this->ApparelModel->paginate(5, 'klub'),
            'pager' => $this->ApparelModel->pager,
            'current_page' => $current_page
        ];
        return view('admin/AdminApparel', $data);
    }
}
