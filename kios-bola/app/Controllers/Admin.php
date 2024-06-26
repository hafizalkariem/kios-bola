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


    // ini untuk AdminJersey


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

    public function search_jersey()
    {
        $keyword = $this->request->getVar('keyword');
        $data = $this->JerseyModel->search($keyword)->findAll();

        return $this->response->setJSON($data);
    }

    // Ini Untuk adminklub

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
    public function search_klub()
    {
        $keyword = $this->request->getVar('keyword');
        $data = $this->KlubModel->search($keyword)->findAll();

        return $this->response->setJSON($data);
    }



    // ini untuk admin apparel





    public function add_apparel()
    {
        $current_page = $this->request->getVar('page_apparel') ? (int)$this->request->getVar('page_apparel') : 1;
        $keyword = $this->request->getGet('keyword');

        // Lakukan pencarian jika ada kata kunci
        if ($keyword) {
            $apparel = $this->ApparelModel->search($keyword)->paginate(5, 'apparel');
        } else {
            // Ambil semua data jika tidak ada kata kunci
            $apparel = $this->ApparelModel->paginate(5, 'apparel');
        }

        $data = [
            'title' => 'Admin | Apparel',
            'activePage' => 'Jersey',
            'keyword' => $keyword,
            'Apparel' => $apparel,
            'pager' => $this->ApparelModel->pager,
            'current_page' => $current_page
        ];

        return view('admin/AdminApparel', $data);
    }
    public function search_apparel()
    {
        $keyword = $this->request->getVar('keyword');
        $data = $this->ApparelModel->search($keyword)->findAll();

        return $this->response->setJSON($data);
    }
}
