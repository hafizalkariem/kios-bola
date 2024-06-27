<?php

namespace App\Controllers;

use App\Models\JerseyModel;
use \Myth\Auth\Models\UserModel;
use App\Models\CartModel;
use App\Models\CartItemModel;
use App\Models\ApparelModel;
use App\Models\KlubModel;

class Profile extends BaseController
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
        $user = user(); // Assuming user() fetches logged-in user data
        //  template
        $userId = user_id(); // Ambil user_id dari sesi atau cara Anda yang sesuai
        $cart = $this->CartModel->getCartByUserId($userId);
        if (!$cart) {
            // Jika tidak ada keranjang, buat keranjang baru untuk user
            $cartId = $this->CartModel->createCart($userId);
            $cart = $this->CartModel->find($cartId);
        }
        // template
        $data = [
            'title' => 'Profile',
            'activePage' => 'jersey',
            'user' => $user,
            'totalItemsInCart' => $this->CartItemModel->getTotalItemsInCart($userId)
        ];

        return view('profile/index', $data);
    }

    public function update()
    {
        if ($this->request->getMethod() !== 'post') {
            return $this->response->setJSON(['success' => false, 'message' => 'Invalid request method.']);
        }

        // Validate incoming data
        $validationRules = [
            'fullname' => 'required',
            'username' => 'required',
            'birthplace' => 'required',
            'birthdate' => 'required|valid_date',
            'address' => 'required',
            'phone_number' => 'required'
        ];

        if (!$this->validate($validationRules)) {
            return $this->response->setJSON(['success' => false, 'message' => $this->validator->getErrors()]);
        }

        // Process the update
        $userId = user()->id; // Assuming user() fetches logged-in user data

        $userData = [
            'fullname' => $this->request->getPost('fullname'),
            'username' => $this->request->getPost('username'),
            'birthplace' => $this->request->getPost('birthplace'),
            'birthdate' => $this->request->getPost('birthdate'),
            'address' => $this->request->getPost('address'),
            'phone_number' => $this->request->getPost('phone_number')
        ];

        // Handle profile image upload if provided
        $userImage = $this->request->getFile('user_image');
        if ($userImage && $userImage->isValid() && !$userImage->hasMoved()) {
            $imageName = $userImage->getRandomName();
            $userImage->move(ROOTPATH . 'public/asset/img/user_image', $imageName);
            $userData['user_image'] = $imageName;
        }

        // Update user data based on user ID
        if ($this->UserModel->update($userId, $userData)) {
            return $this->response->setJSON(['success' => true, 'message' => 'Profile updated successfully.']);
        }

        return $this->response->setJSON(['success' => false, 'message' => 'Failed to update profile.']);
    }
}
