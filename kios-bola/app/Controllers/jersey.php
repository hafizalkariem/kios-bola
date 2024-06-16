<?php

namespace App\Controllers;

use App\Models\JerseyModel;
use App\Models\KlubModel;
use App\Models\ApparelModel;

class Jersey extends BaseController
{
    protected $KlubModel;
    protected $JerseyModel;
    protected $ApparelModel;

    public function __construct()
    {
        $this->JerseyModel = new JerseyModel();
        $this->KlubModel = new KlubModel();
        $this->ApparelModel = new ApparelModel();
    }

    public function index()
    {
        $clubId = $this->request->getGet('club_id');

        if (!empty($clubId)) {
            $JerseyModel = new JerseyModel();
            $Jerseys = $JerseyModel->findByClub($clubId);
            $data = [
                'title' => 'Jersey | Kios Bola',
                'activePage' => 'pricing',
                'Jerseys' => $Jerseys,
            ];
            return view('jersey/jersey', $data);
        } else {
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
        $Apparel = $this->ApparelModel->findAll();
        session();
        $data = [
            'title' => 'Create Jersey',
            'activePage' => 'jersey',
            'Klub' => $Klub,
            'Apparel' => $Apparel,
            'validation' => \Config\Services::validation()
        ];
        return view('jersey/create', $data);
    }

    public function save()
    {
        $validate = $this->validate([
            'sampul' => [
                'rules' => 'uploaded[sampul]|max_size[sampul,2048]|is_image[sampul]|mime_in[sampul,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'uploaded' => '{field} harus diisi',
                    'max_size' => 'ukuran {field} terlalu besar.',
                    'is_image' => '{field} harus berupa gambar.',
                    'mime_in' => '{field} harus berupa gambar yang valid.'
                ]
            ],
            'judul' => [
                'rules' => 'required|is_unique[jersey.judul]',
                'errors' => [
                    'required' => '{field} harus diisi.',
                    'is_unique' => '{field} sudah terdaftar.'
                ]
            ],
            'harga' => [
                'label' => 'Harga',
                'rules' => 'required|numeric|greater_than_equal_to[0]',
                'errors' => [
                    'required' => '{field} harus diisi.',
                    'numeric' => '{field} harus berisi angka.',
                    'greater_than_equal_to' => '{field} harus bernilai positif atau nol.'
                ]
            ],
            'ketersediaan' => [
                'rules' => 'required|numeric',
                'errors' => [
                    'required' => '{field} harus diisi.',
                    'numeric' => '{field} harus berisi angka.'
                ]
            ],
            'id_klub' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi.'
                ]
            ]
        ]);

        if (!$validate) {

            return redirect()->back()->withInput()->with('validation', $this->validator);
        }

        $sampul = $this->request->getFile('sampul');
        $sampulName = $sampul->getRandomName();
        $sampul->move('asset/img/jersey', $sampulName);

        $judul = $this->request->getPost('judul');
        $id_klub = $this->request->getPost('id_klub');
        $apparel_sampul = $this->request->getPost('apparel_sampul');
        $harga = $this->request->getPost('harga');
        $ketersediaan = $this->request->getPost('ketersediaan');
        $slug = url_title($this->request->getVar('judul'), '-', true);

        $this->JerseyModel->save([
            'sampul' => $sampulName,
            'apparel' => $apparel_sampul,
            'judul' => $judul,
            'slug' => $slug,
            'ketersediaan' => $ketersediaan,
            'harga' => $harga,
            'id_klub' => $id_klub
        ]);

        session()->setFlashdata('pesan', 'Data berhasil ditambahkan.');
        return redirect()->to('/admin/jersey');
    }

    public function delete($id)
    {
        $this->JerseyModel->delete($id);
        return redirect()->to('/admin/jersey');
    }
}
