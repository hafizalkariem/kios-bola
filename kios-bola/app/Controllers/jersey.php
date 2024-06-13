<?php

namespace App\Controllers;

use App\Models\JerseyModel;
use App\Models\KlubModel;

class jersey extends BaseController
{

    protected $KlubModel;
    protected $JerseyModel;
    public function __construct()
    {
        $this->JerseyModel = new JerseyModel();
        $this->KlubModel = new KlubModel();
    }
    public function index()
    {
        $clubId = $this->request->getGet('club_id');

        // Validasi ID klub
        if (!empty($clubId)) {
            // Mengambil jersey berdasarkan ID klub
            $JerseyModel = new JerseyModel();
            $Jerseys = $JerseyModel->findByClub($clubId);
            $data = [
                'title' => 'Jersey | Kios Bola',
                'activePage' => 'pricing',
                'Jerseys' => $Jerseys,
            ];
            return view('jersey/jersey', $data);
        } else {
            // Tampilkan semua jersey jika tidak ada ID klub yang diberikan
            $JerseyModel = new JerseyModel();
            $Jerseys = $JerseyModel->findAllWithClub();
            $data = [
                'title' => 'Jersey | Kios Bola',
                'activePage' => 'pricing',
                'Jerseys' => $Jerseys,
            ];
            return view('jersey/jersey', $data);
        }
    }
    public function create()
    {

        $Klub = $this->KlubModel->findAll();
        $data = [
            'title' => 'create jersey',
            'activePage' => 'jersey',
            'Klub' => $Klub
        ];
        return view('jersey/create', $data);
    }
    public function save()
    {

        $this->JerseyModel->findAllWithClub('club_id');
        $slug = url_title($this->request->getVar('judul', '-', true));
        $this->JerseyModel->save([
            'judul' => $this->request->getVar('judul'),
            'slug' => $slug,
            'klub' => $this->request->getVar('id_klub'),
            'harga' => $this->request->getVar('harga'),
            'ketersedi0aan' => $this->request->getVar('ketersediaan'),
        ]);
        return redirect()->to('jersey/AdminJersey');
    }
}
