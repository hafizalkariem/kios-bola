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
            $Jerseys = $this->JerseyModel->findByClub($clubId);
        } else {
            $Jerseys = $this->JerseyModel->findAllWithClub();
        }

        $data = [
            'title' => 'Jersey | Kios Bola',
            'activePage' => 'pricing',
            'Jerseys' => $Jerseys,
            'klub' => $this->KlubModel->findAll()
        ];

        return view('jersey/jersey', $data);
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

            $validation = \config\Services::validation();
            return redirect()->to('admin/jersey/create')->withInput()->with('validation', $validation);
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
        // kita ambil id dari data yang ingin kita hapus
        $Jersey = $this->JerseyModel->find($id);

        // kita periksa file/gambar yang ada di patch nya
        $imagePath = 'asset/img/jersey/' . $Jersey['sampul'];
        // kita periksa apakah ada atau tdk
        if (file_exists($imagePath)) {
            unlink($imagePath);
        }
        // hapus data jerseynya
        $this->JerseyModel->delete($id);
        session()->setFlashdata('pesan', 'Data berhasil dihapus.');
        return redirect()->to('/admin/jersey');
    }
    public function edit($slug)
    {
        $jersey = $this->JerseyModel->getJersey($slug);

        // Check if jersey data exists
        if (!$jersey) {
            // Handle if jersey is not found, e.g., redirect or show error message
            return redirect()->to('admin/jersey')->with('error', 'Jersey not found.');
        }

        // Retrieve klub and apparel data
        $Klub = $this->KlubModel->findAll();
        $Apparel = $this->ApparelModel->findAll();

        // Prepare data to pass to view
        $data = [
            'title' => 'Edit Jersey',
            'activePage' => 'jersey',
            'Klub' => $Klub,
            'Apparel' => $Apparel,
            'validation' => \Config\Services::validation(),
            'jersey' => $jersey, // Pass jersey data to view
        ];

        // Load view with data
        return view('jersey/edit', $data);
    }
    public function update($id)
    {
        $jerseyLama = $this->JerseyModel->getJersey($this->request->getVar('slug'));
        if ($jerseyLama['judul'] == $this->request->getVar('judul')) {
            $rule_judul = 'required';
        } else {
            $rule_judul = 'required|is_unique[jersey.judul]';
        }

        $validate = $this->validate([
            'sampul' => [
                'rules' => 'max_size[sampul,2048]|is_image[sampul]|mime_in[sampul,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'max_size' => 'ukuran {field} terlalu besar.',
                    'is_image' => '{field} harus berupa gambar.',
                    'mime_in' => '{field} harus berupa gambar yang valid.'
                ]
            ],
            'judul' => [
                'rules' => $rule_judul,
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
            $validation = \config\Services::validation();
            return redirect()->to('/jersey/edit/' . $this->request->getVar('slug'))->withInput()->with('validation', $validation);
        }

        $sampul = $this->request->getFile('sampul');
        if ($sampul->getError() == 4) {
            // Jika tidak ada gambar baru yang diunggah, gunakan sampul lama
            $sampulName = $this->request->getPost('sampul_lama');
        } else {
            // Jika ada gambar baru, upload dan ganti sampul lama
            $sampulName = $sampul->getRandomName();
            $sampul->move('asset/img/jersey', $sampulName);
            // Hapus file sampul lama
            if (file_exists('asset/img/jersey/' . $this->request->getPost('sampul_lama'))) {
                unlink('asset/img/jersey/' . $this->request->getPost('sampul_lama'));
            }
        }

        $judul = $this->request->getPost('judul');
        $id_klub = $this->request->getPost('id_klub');
        $apparel_sampul = $this->request->getPost('apparel_sampul');
        $harga = $this->request->getPost('harga');
        $ketersediaan = $this->request->getPost('ketersediaan');
        $slug = url_title($this->request->getVar('judul'), '-', true);

        $this->JerseyModel->save([
            'id' => $id,
            'sampul' => $sampulName,
            'apparel' => $apparel_sampul,
            'judul' => $judul,
            'slug' => $slug,
            'ketersediaan' => $ketersediaan,
            'harga' => $harga,
            'id_klub' => $id_klub
        ]);

        session()->setFlashdata('pesan', 'Data berhasil diubah.');
        return redirect()->to('/admin/jersey');
    }
}
