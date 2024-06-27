<?php

namespace App\Helpers;

class AuthHelper
{
    public static function isLoggedIn()
    {
        // Contoh implementasi menggunakan Myth/Auth
        $authentication = \Config\Services::authentication();
        return $authentication->check();
    }

    public static function getUserId()
    {
        // Mengambil user_id jika pengguna sudah login
        if (self::isLoggedIn()) {
            $authentication = \Config\Services::authentication();
            $user = $authentication->user();
            return $user->id;
        }
        return null;
    }
}
