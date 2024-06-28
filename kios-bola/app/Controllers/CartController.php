<?php

namespace App\Controllers;

use App\Models\JerseyModel;
use \Myth\Auth\Models\UserModel;
use App\Models\CartModel;
use App\Models\CartItemModel;
use App\Models\ApparelModel;
use App\Models\KlubModel;
use CodeIgniterCart\Cart;

use \Config\Services;

class CartController extends BaseController
{
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
    {

        $userId = user_id(); // Ambil user_id dari sesi atau cara Anda yang sesuai
        $cart = $this->CartModel->getCartByUserId($userId);

        if (!$cart) {
            // Jika tidak ada keranjang, buat keranjang baru untuk user
            $cartId = $this->CartModel->createCart($userId);
            $cart = $this->CartModel->find($cartId);
        }

        // Ambil semua item dari keranjang belanja user
        $cartItems = $this->CartItemModel->where('cart_id', $cart['id'])->findAll();

        echo "<pre>";
        var_dump($cartItems);
        echo "</pre>";

        echo "<pre>";
        print_r($cartItems);
        echo "</pre>";

        // Ambil informasi jersey untuk setiap item dalam keranjang
        foreach ($cartItems as &$item) {
            // Ambil informasi jersey dari JerseyModel berdasarkan jersey_id
            $jersey = $this->JerseyModel->find($item['jersey_id']);

            // Tambahkan informasi jersey ke item keranjang
            if ($jersey) {
                $item['name'] = $jersey['judul']; // Misalnya judul jersey dari tabel jersey
                $item['price'] = $jersey['harga']; // Misalnya harga jersey dari tabel jersey
                $item['subtotal'] = $item['quantity'] * $jersey['harga'];
                $item['image'] = $jersey['sampul'];
                // Tambahkan informasi lain yang Anda perlukan
            }
        }

        $data = [
            'cartItems' => $cartItems,
            'title' => 'Keranjang Belanja',
            'activePage' => 'jersey',
            'totalItemsInCart' => $this->CartItemModel->getTotalItemsInCart($userId)
            // Tambahan data lain yang perlu ditampilkan di view
        ];

        return view('cart/index', $data);
    }
    public function addToCart($jerseyId)
    {
        helper('number');
        $userId = user_id();
        $jerseyId = $this->request->getPost('jersey_id');
        $quantity = $this->request->getPost('quantity') ?? 1;
        $price = $this->request->getPost('price');

        // Ambil data jersey berdasarkan ID
        $jersey = $this->JerseyModel->find($jerseyId);
        if (!$jersey) {
            throw new \RuntimeException('Jersey tidak ditemukan.');
        }
        // Debugging: Output data jersey
        // echo '<pre>';
        // print_r($jersey);
        // echo '</pre>';
        // exit;

        $quantity = $this->request->getPost('quantity') ?? 1;

        // Pastikan harga tersedia dalam $jersey sebelum menggunakannya
        $jersey = $this->JerseyModel->findAll();
        // if (isset($jersey['harga'])) {
        //     // Lakukan operasi dengan $jersey['harga']

        //     // ...
        // } else {
        //     throw new \RuntimeException('Harga tidak ditemukan dalam data jersey.');
        // }

        // Cari keranjang user berdasarkan user_id
        $cart = $this->CartModel->getCartByUserId($userId);
        if (!$cart) {
            // Jika tidak ada keranjang, buat keranjang baru untuk user
            $cartId = $this->CartModel->createCart($userId);
            $cart = $this->CartModel->find($cartId);
        }

        // Cek apakah item dengan jersey_id ini sudah ada dalam cartItems
        $existingItem = $this->CartItemModel->where('cart_id', $cart['id'])
            ->where('jersey_id', $jerseyId)
            ->first();

        if ($existingItem) {
            // Jika sudah ada, update jumlahnya
            $newQuantity = $existingItem['quantity'] + 1;
            $this->CartItemModel->update($existingItem['id'], ['quantity' => $newQuantity]);
        } else {
            // Jika belum ada, tambahkan sebagai item baru
            $this->CartItemModel->save([
                'cart_id' => $cart['id'],
                'jersey_id' => $jerseyId,
                'quantity' => $quantity, // Jumlah barang bisa disesuaikan sesuai kebutuhan
                'price' => $price,
                'created_at' => date('Y-m-d H:i:s'),
            ]);
        }

        session()->setFlashdata('pesan', 'Jersey telah ditambahkan ke keranjang.');

        return redirect()->to('/cart');
    }

    public function cek()
    {
        $cart = \Config\Services::cart();
        $response = $cart->contents();
        $data = json_encode($response, JSON_PRETTY_PRINT);
        echo '<pre>';
        print_r($data);
        echo '</pre>';
    }

    public function remove($rowid)
    {
        // load services cart
        $cart = \Config\Services::cart();
        $cart->remove($rowid);
        session()->setFlashdata('pesan', 'Barang berhasil dihapus dari keranjang');
        return redirect()->to('/cart');
    }

    public function updateCart()
    {
        // Update item di cart
        $data = [
            'id' => $this->request->getPost('id'),
            'quantity' => $this->request->getPost('quantity')
        ];

        $this->CartModel->save($data);

        return redirect()->to('/cart');
    }
}
