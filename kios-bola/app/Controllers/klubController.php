<?php

namespace App\Controllers;

use App\Models\JerseyModel;
use \Myth\Auth\Models\UserModel;
use App\Models\CartModel;
use App\Models\CartItemModel;
use App\Models\ApparelModel;
use App\Models\KlubModel;

class KlubController extends BaseController
{
    protected $helpers = ['form', 'session', 'validation'];
    protected $JerseyModel;
    protected $UserModel;
    protected $CartModel;
    protected $CartItemModel;
    protected $ApparelModel;
    protected $KlubModel;


    public function __construct()
    {
        $this->JerseyModel = new JerseyModel();
        $this->UserModel = new UserModel();
        $this->CartModel = new CartModel();
        $this->CartItemModel = new CartItemModel();
        $this->ApparelModel = new ApparelModel();
        $this->KlubModel = new KlubModel();
    }

    public function index()
    { //  template
        $userId = user_id(); // Ambil user_id dari sesi atau cara Anda yang sesuai
        $cart = $this->CartModel->getCartByUserId($userId);
        if (!$cart) {
            // Jika tidak ada keranjang, buat keranjang baru untuk user
            $cartId = $this->CartModel->createCart($userId);
            $cart = $this->CartModel->find($cartId);
        }
        // template
        $Klub = $this->KlubModel->findAll();
        session();
        $data = [
            'title' => 'Create Jersey',
            'activePage' => 'jersey',
            'Klub' => $Klub,
            'validation' => \Config\Services::validation(),
            'totalItemsInCart' => $this->CartItemModel->getTotalItemsInCart($userId)
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
            $validation = \Config\Services::validation();
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
        $imagePath = 'asset/img/klub/' . $Klub['logo'];

        if (file_exists($imagePath)) {
            unlink($imagePath);
        }

        $this->KlubModel->delete($id_klub);
        session()->setFlashdata('pesan', 'Data berhasil dihapus.');
        return redirect()->to('/admin/klub');
    }

    public function edit($slug)
    {
        $klub = $this->KlubModel->where('slug', $slug)->first();
        //  template
        $userId = user_id(); // Ambil user_id dari sesi atau cara Anda yang sesuai
        $cart = $this->CartModel->getCartByUserId($userId);
        if (!$cart) {
            // Jika tidak ada keranjang, buat keranjang baru untuk user
            $cartId = $this->CartModel->createCart($userId);
            $cart = $this->CartModel->find($cartId);
        }
        // template
        session();
        $data = [
            'title' => 'Edit Klub',
            'activePage' => 'jersey',
            'klub' => $klub,
            'validation' => \Config\Services::validation(),
            'totalItemsInCart' => $this->CartItemModel->getTotalItemsInCart($userId)
        ];
        return view('klub/edit', $data);
    }

    public function update($id_klub)
    {
        $klubLama = $this->KlubModel->find($id_klub);

        // Pastikan $klubLama tidak null sebelum mengakses elemen array
        if (!$klubLama) {
            throw new \Exception('Klub tidak ditemukan');
        }

        // Tentukan aturan validasi untuk nama klub
        if ($klubLama['nama'] == $this->request->getVar('nama')) {
            $rule_nama = 'required';
        } else {
            $rule_nama = 'required|is_unique[klub.nama]';
        }

        // Validasi data
        $validate = $this->validate([
            'logo' => [
                'rules' => 'max_size[logo,2048]|is_image[logo]|mime_in[logo,image/jpg,image/jpeg,image/png]',
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

        // Jika validasi gagal
        if (!$validate) {
            $validation = \Config\Services::validation();
            return redirect()->to('/admin/klub/edit/' . $klubLama['slug'])->withInput()->with('validation', $validation);
        }

        // Ambil file logo yang diunggah
        $logo = $this->request->getFile('logo');

        // Jika tidak ada file logo baru yang diunggah
        if ($logo->getError() == 4) {
            // Gunakan nama logo lama
            $logoName = $this->request->getVar('logo_lama');
        } else {
            // Jika ada file baru yang diunggah, unggah dan ganti nama file
            $logoName = $logo->getRandomName();
            $logo->move('asset/img/klub', $logoName);

            // Hapus file logo lama jika ada
            $oldLogoPath = 'asset/img/klub/' . $this->request->getVar('logo_lama');
            if (file_exists($oldLogoPath)) {
                unlink($oldLogoPath);
            }
        }

        // Simpan data klub yang sudah diubah
        $nama = $this->request->getVar('nama');
        $slug = url_title($this->request->getVar('nama'), '-', true);

        $this->KlubModel->save([
            'id_klub' => $id_klub,
            'logo' => $logoName,
            'nama' => $nama,
            'slug' => $slug
        ]);

        // Set flashdata untuk pesan berhasil
        session()->setFlashdata('pesan', 'Data berhasil diubah.');

        // Redirect ke halaman admin/klub
        return redirect()->to('/admin/klub');
    }
    public function search()
    {
        $keyword = $this->request->getGet('keyword');
        $klubModel = new KlubModel();
        $klub = $klubModel->like('nama', $keyword)->findAll();

        return $this->response->setJSON($klub);
    }
}
