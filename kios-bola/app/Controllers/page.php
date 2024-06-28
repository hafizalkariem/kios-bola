<?php

namespace App\Controllers;

use App\Models\JerseyModel;
use \Myth\Auth\Models\UserModel;
use App\Models\CartModel;
use App\Models\CartItemModel;
use App\Models\ApparelModel;
use App\Models\KlubModel;
use App\Config\Services;



class page extends BaseController
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
        if (!logged_in()) {
            $Apparel = $this->ApparelModel->findAll();
            $data = [
                'title' => 'kios bola',
                'activePage' => 'home',
                'Apparel' => $Apparel,
                'totalItemsInCart' => 0
                // 'totalItemsInCart' => $this->CartItemModel->getTotalItemsInCart($userId)
            ];
        } else {
            $Apparel = $this->ApparelModel->findAll();
            $data = [
                'title' => 'kios bola',
                'activePage' => 'home',
                'Apparel' => $Apparel,
                'totalItemsInCart' => $this->CartItemModel->getTotalItemsInCart($userId)
                // 'totalItemsInCart' => $this->CartItemModel->getTotalItemsInCart($userId)
            ];
        }
        return view('pages/index', $data);
    }
    public function about()
    {
        $userId = user_id(); // Ambil user_id dari sesi atau cara Anda yang sesuai
        if (!logged_in()) {
            $Jersey = new JerseyModel();
            $Klub = new KlubModel();
            $Apparel = new ApparelModel();
            $Users = new UserModel();
            $data = [
                'title' => 'About us',
                'activePage' => 'about',
                'totalApparels' => $Apparel->getCount(),
                'totalklub' => $Klub->getCount(),
                'totalJersey' => $Jersey->getCount(),
                'totalUser' => $Users->getCount(),
                'totalItemsInCart' => 0
            ];
        } else {
            $Jersey = new JerseyModel();
            $Klub = new KlubModel();
            $Apparel = new ApparelModel();
            $Users = new UserModel();
            $data = [
                'title' => 'About us',
                'activePage' => 'about',
                'totalApparels' => $Apparel->getCount(),
                'totalklub' => $Klub->getCount(),
                'totalJersey' => $Jersey->getCount(),
                'totalUser' => $Users->getCount(),
                'totalItemsInCart' => $this->CartItemModel->getTotalItemsInCart($userId)
            ];
        }
        return view('pages/about', $data);
    }
    public function contact()
    {
        $userId = user_id(); // Ambil user_id dari sesi atau cara Anda yang sesuai
        if (!logged_in()) {
            $data = [
                'title' => 'contact us',
                'activePage' => 'contact',
                'totalItemsInCart' => 0
            ];
        } else {
            $data = [
                'title' => 'contact us',
                'activePage' => 'contact',
                'totalItemsInCart' => $this->CartItemModel->getTotalItemsInCart($userId)
            ];
        }


        return view('pages/contact', $data);
    }
    public function pricing()
    { //  template
        $userId = user_id(); // Ambil user_id dari sesi atau cara Anda yang sesuai
        $cart = $this->CartModel->getCartByUserId($userId);
        if (!$cart) {
            // Jika tidak ada keranjang, buat keranjang baru untuk user
            $cartId = $this->CartModel->createCart($userId);
            $cart = $this->CartModel->find($cartId);
        }
        // template
        helper(['form', 'url']);
        $keyword = $this->request->getGet('keyword');
        if ($keyword) {
            $this->KlubModel->search($keyword);
        }

        $data = [
            'title' => 'Daftar Klub | Kios Bola',
            'activePage' => 'pricing',
            'Klub' => $this->KlubModel->paginate(8, 'klub'),
            'pager' => $this->KlubModel->pager,
            'keyword' => $keyword,
            'totalItemsInCart' => $this->CartItemModel->getTotalItemsInCart($userId)


        ];

        return view('pages/pricing', $data);
    }
}
