<?php

namespace App\Controllers;

use App\Models\ApparelModel;
use App\Models\JerseyModel;
use App\Models\KlubModel;

class klubController extends BaseController
{
    protected $helpers = ['form', 'session', 'validation'];
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
        $slug = url_title($this->request->getVar('nama'), '-', true);

        $this->KlubModel->save([
            'logo' => $logoName,
            'nama' => $nama,
            'slug' => $slug

        ]);


        session()->setFlashdata('pesan', "data berhasil ditambahkan");

        return redirect()->to('/admin/klub');
    }
    public function delete($id_klub)
    {
        $Klub = $this->KlubModel->find($id_klub);

        unlink('asset/img/klub/' . $Klub['logo']);
        $this->KlubModel->delete($id_klub);
        session()->setFlashdata('pesan', 'Data berhasil dihapus.');
        return redirect()->to('/admin/klub');
    }
    public function edit($slug)
    {
        $klub = $this->KlubModel->getKlub($slug);


        session();
        $data = [
            'title' => 'Edit Klub',
            'activePage' => 'jersey',
            'klub' => $klub,
            'validation' => \Config\Services::validation()
        ];
        return view('klub/edit', $data);
    }
    public function update($id_klub)
    {


        $klubLama = $this->KlubModel->find($id_klub);

        // Pastikan $klubLama tidak null sebelum mengakses elemen array
        if ($klubLama && $klubLama['nama'] == $this->request->getVar('nama')) {
            $rule_nama = 'required';
        } else {
            $rule_nama = 'required|is_unique[klub.nama]';
        }

        $validate = $this->validate([
            'logo' => [
                'rules' => 'uploaded[logo]|max_size[logo,2048]|is_image[logo]|mime_in[logo,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'uploaded' => '{field} harus diisi',
                    'max_size' => 'ukuran {field} terlalu besar.',
                    'is_image' => '{field} harus berupa gambar.',
                    'mime_in' => '{field} harus berupa gambar yang valid.'
                ]
            ],
            'nama' => [
                'rules' => $rule_nama,
                'errors' => [
                    'required' => '{field} harus diisi.',
                    'is_unique' => '{field} sudah terdaftar.'
                ]
            ]
        ]);

        if (!$validate) {

            $validation = \config\Services::validation();
            return redirect()->to('/klub/edit/' . $this->request->getVar('slug'))->withInput()->with('validation', $validation);
        }

        $logo = $this->request->getFile('logo');
        $logoName = $logo->getRandomName();
        $logo->move('asset/img/klub', $logoName);

        $nama = $this->request->getVar('nama');
        $slug = url_title($this->request->getVar('nama'), '-', true);

        $this->KlubModel->save([
            'logo' => $logoName,
            'nama' => $nama,
            'slug' => $slug,
            'id_klub' => $id_klub

        ]);


        session()->setFlashdata('pesan', 'Data berhasil diubah.');
        return redirect()->to('/admin/klub');
    }
}
