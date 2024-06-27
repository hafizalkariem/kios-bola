<?php

namespace App\Models;

use CodeIgniter\Model;

class CartModel extends Model
{
    protected $table = 'carts';
    protected $primaryKey = 'id';
    protected $allowedFields = ['user_id', 'created_at', 'updated_at'];

    public function getCartByUserId($userId)
    {
        return $this->where('user_id', $userId)->first();
    }
    public function createCart($userId)
    {
        $this->save([
            'user_id' => $userId,
            'created_at' => date('Y-m-d H:i:s'),
        ]);
        return $this->getInsertID();
    }
    public function calculateTotal($userId)
    {
        return $this->selectSum('price')
            ->where('user_id', $userId)
            ->findAll();
    }
}
