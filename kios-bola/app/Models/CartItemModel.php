<?php

namespace App\Models;

use CodeIgniter\Model;

class CartItemModel extends Model
{
    protected $table = 'cart_items';
    protected $primaryKey = 'id';
    protected $allowedFields = ['cart_id', 'jersey_id', 'quantity'];
    protected $useTimestamps = false;


    public function addItem($data)
    {
        return $this->save($data);
    }

    public function updateItem($itemId, $data)
    {
        return $this->update($itemId, $data);
    }

    public function deleteItem($itemId)
    {
        return $this->delete($itemId);
    }
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Calculate total price of all items in the cart.
     *
     * @param int $cartId The ID of the cart.
     * @return float Total price of items in the cart.
     */
    public function calculateTotal($cartId)
    {
        $query = $this->selectSum('price')
            ->where('cart_id', $cartId)
            ->get();

        $row = $query->getRow();
        return ($row ? $row->price : 0);
    }
    public function getItemsByCartId($cartId)
    {
        return $this->select('cart_items.*, jersey.judul, jersey.harga')
            ->join('jersey', 'jersey.id = cart_items.jersey_id')
            ->where('cart_items.cart_id', $cartId)
            ->findAll();
    }
    public function getTotalItemsInCart($userId)
    {
        return $this->selectSum('quantity')
            ->join('carts', 'carts.id = cart_items.cart_id')
            ->where('carts.user_id', $userId)
            ->get()
            ->getRowArray()['quantity'] ?? 0;
    }
}
