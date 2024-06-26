<?php

namespace App\Controllers;

use App\Models\ApparelModel;

class ApparelController extends BaseController
{
    protected $helpers = ['form', 'session', 'validation'];
    protected $ApparelModel;

    public function __construct()
    {
        $this->ApparelModel = new ApparelModel();
    }

    public function index()
    {
        $apparel = $this->ApparelModel->findAll();

        $data = [
            'title' => 'Create Apparel',
            'activePage' => 'apparel',
            'apparel' => $apparel,
            'validation' => \Config\Services::validation()
        ];

        return view('apparel/create', $data); // Sesuaikan dengan path template yang sesuai
    }

    public function save()
    {
        $validate = $this->validate([
            'nama' => [
                'rules' => 'required|is_unique[apparel.nama]',
                'errors' => [
                    'required' => '{field} wajib diisi',
                    'is_unique' => '{field} sudah terdaftar'
                ]
            ],
            'sampul' => [
                'rules' => 'uploaded[sampul]|max_size[sampul,2048]|is_image[sampul]|mime_in[sampul,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'uploaded' => '{field} harus diisi',
                    'max_size' => 'Ukuran {field} terlalu besar.',
                    'is_image' => '{field} harus berupa gambar.',
                    'mime_in' => '{field} harus berupa gambar yang valid.'
                ]
            ]
        ]);

        if (!$validate) {
            $validation = \Config\Services::validation();
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

        session()->setFlashdata('pesan', "Data berhasil ditambahkan");
        return redirect()->to('/admin/apparel');
    }

    public function delete($id)
    {
        // Cari apparel berdasarkan ID
        $apparel = $this->ApparelModel->find($id);

        if ($apparel) {
            // Hapus file sampul jika ada
            $sampulPath = 'asset/img/apparel/' . $apparel['sampul'];
            if (file_exists($sampulPath)) {
                unlink($sampulPath);
            }

            // Hapus data dari database
            $this->ApparelModel->delete($id);
            session()->setFlashdata('pesan', 'Data berhasil dihapus.');
        } else {
            session()->setFlashdata('pesan', 'Data tidak ditemukan.');
        }

        return redirect()->to('/admin/apparel'); // Redirect ke halaman daftar apparel
    }


    public function edit($slug)
    {
        $apparel = $this->ApparelModel->where('slug', $slug)->first();

        $data = [
            'title' => 'Edit Apparel',
            'activePage' => 'apparel',
            'apparel' => $apparel,
            'validation' => \Config\Services::validation()
        ];

        return view('apparel/edit', $data); // Sesuaikan dengan path template yang sesuai
    }

    public function update($id)
    {
        $apparelLama = $this->ApparelModel->find($id);

        if (!$apparelLama) {
            throw new \Exception('Apparel tidak ditemukan');
        }

        if ($apparelLama['nama'] == $this->request->getVar('nama')) {
            $rule_nama = 'required';
        } else {
            $rule_nama = 'required|is_unique[apparel.nama]';
        }

        $validate = $this->validate([
            'sampul' => [
                'rules' => 'max_size[sampul,2048]|is_image[sampul]|mime_in[sampul,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'max_size' => 'Ukuran {field} terlalu besar.',
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
            $validation = \Config\Services::validation();
            return redirect()->to('/admin/apparel/edit/' . $apparelLama['slug'])->withInput()->with('validation', $validation);
        }

        $sampul = $this->request->getFile('sampul');

        if ($sampul->getError() == 4) {
            $sampulName = $this->request->getVar('sampul_lama');
        } else {
            $sampulName = $sampul->getRandomName();
            $sampul->move('asset/img/apparel', $sampulName);

            $oldSampulPath = 'asset/img/apparel/' . $this->request->getVar('sampul_lama');
            if (file_exists($oldSampulPath)) {
                unlink($oldSampulPath);
            }
        }

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
