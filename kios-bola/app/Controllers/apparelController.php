<?php

namespace App\Controllers;

use App\Models\ApparelModel;
use App\Models\JerseyModel;
use App\Models\KlubModel;

class apparelController extends BaseController
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
        $Apparel = $this->ApparelModel->findAll();
        session();
        $data = [
            'title' => 'Create Jersey',
            'activePage' => 'jersey',
            'Apparel' => $Apparel,
            'validation' => \config\Services::validation()
        ];
        return view('apparel/create', $data);
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
            'sampul' => [
                'rules' => 'uploaded[sampul]|max_size[sampul,2048]|is_image[sampul]|mime_in[sampul,image/jpg,image/jpeg,image/png]',
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

        $sampul = $this->request->getFile('sampul');
        $sampulName = $sampul->getRandomName();
        $sampul->move('asset/img/apparel', $sampulName);

        $nama = $this->request->getVar('nama');
        $slug = url_title($this->request->getVar('nama'), '-', true);

        $this->ApparelModel->save([
            'sampul' => $sampulName,
            'nama' => $nama,
            'slug' => $slug

        ]);


        session()->setFlashdata('pesan', "data berhasil ditambahkan");

        return redirect()->to('/admin/apparel');
    }
    public function delete($id)
    {
        $Apparel = $this->ApparelModel->find($id);

        unlink('asset/img/apparel/' . $Apparel['sampul']);
        $this->ApparelModel->delete($id);
        session()->setFlashdata('pesan', 'Data berhasil dihapus.');
        return redirect()->to('/admin/apparel');
    }
    public function edit($slug)
    {
        $apparel = $this->ApparelModel->getApparel($slug);


        session();
        $data = [
            'title' => 'Edit Apparel',
            'activePage' => 'jersey',
            'apparel' => $apparel,
            'validation' => \Config\Services::validation()
        ];
        return view('apparel/edit', $data);
    }
    public function update($id)
    {


        $apparelLama = $this->ApparelModel->find($id);

        // Pastikan $apparelLama tidak null sebelum mengakses elemen array
        if ($apparelLama && $apparelLama['nama'] == $this->request->getVar('nama')) {
            $rule_nama = 'required';
        } else {
            $rule_nama = 'required|is_unique[apparel.nama]';
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
            return redirect()->to('/apparel/edit/' . $this->request->getVar('slug'))->withInput()->with('validation', $validation);
        }

        $sampul = $this->request->getFile('sampul');
        $sampulName = $sampul->getRandomName();
        $sampul->move('asset/img/apparel', $sampulName);

        $nama = $this->request->getVar('nama');
        $slug = url_title($this->request->getVar('nama'), '-', true);

        $this->ApparelModel->save([
            'sampul' => $sampulName,
            'nama' => $nama,
            'slug' => $slug,
            'id' => $id

        ]);


        session()->setFlashdata('pesan', 'Data berhasil diubah.');
        return redirect()->to('/admin/apparel');
    }
}
