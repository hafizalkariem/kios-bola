<?php

namespace App\Controllers;

use App\Models\ApparelModel;
use App\Models\JerseyModel;
use App\Models\KlubModel;

class klubController extends BaseController
{
    protected $helpers = ['form'];
    protected $JerseyModel;
    protected $KlubModel;
    protected $ApparelModel;
    public function __construct()
    {
        $this->JerseyModel = new JerseyModel();
        $this->KlubModel = new KlubModel();
        $this->ApparelModel = new ApparelModel();
        // / menentukan rules untuk validasi

        // menjalankan validasi
    }
    public function index()
    {
        $Klub = $this->KlubModel->findAll();
        session();
        $data = [
            'title' => 'Create Jersey',
            'activePage' => 'jersey',
            'Klub' => $Klub,
            'validation' => \config\Services::validation()
        ];
        return view('klub/create', $data);
    }
    public function save()
    {
        $validate = $this->validate([
            'nama' => [
                'rules' => 'required|is_unique[klub.nama]',
                'errors' => [
                    'required' => '{field} wajib diisi',
                    'is_unique' => '{field} sudah terdaftar'
                ]


            ],
            'logo' => [
                'rules' => 'uploaded[logo]|max_size[logo,2048]|is_image[logo]|mime_in[logo,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'uploaded' => '{field} harus diisi',
                    'max_size' => 'ukuran {field} terlalu besar.',
                    'is_image' => '{field} harus berupa gambar.',
                    'mime_in' => '{field} harus berupa gambar yang valid.'
                ]
            ]
        ]);



        if (!$validate) {

            $validation = \config\Services::validation();

            return redirect()->back()->withInput()->with('validation', $validation);
        }

        $logo = $this->request->getFile('logo');
        $logoName = $logo->getRandomName();
        $logo->move('asset/img/klub', $logoName);

        $nama = $this->request->getVar('nama');

        $this->KlubModel->save([
            'logo' => $logoName,
            'nama' => $nama

        ]);

        session()->setFlashdata('pesan' . "data berhasil ditambahkan");
        return redirect()->to('/admin/klub');
    }
}
