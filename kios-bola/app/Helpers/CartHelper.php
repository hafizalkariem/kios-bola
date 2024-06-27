<?php

namespace App\Helpers;

use App\Models\CartItemModel;
use Myth\Auth\Models\UserModel;
use Myth\Auth\Entities\User;

class CartHelper
{
    public static function getTotalItemsInCart()
    {
        // Mengambil user ID dari Myth/Auth
        $authentication = service('authentication');
        $user = $authentication->user();
        $userId = $user ? $user->id : null;

        // Jika user belum login, kembalikan 0
        if (!$userId) {
            return 0;
        }

        // Menggunakan CartItemModel untuk mendapatkan total item berdasarkan user ID
        $cartItemModel = new CartItemModel();
        return $cartItemModel->getTotalItemsInCart($userId);
    }
}
    // Tambahkan fungsi-fungsi lain untuk operasi keranjang belanja di sini
