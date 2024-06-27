<?php

namespace App\Models;

use CodeIgniter\Model;

class OrderItemsModel extends Model
{
    protected $table = 'order_items';
    protected $primaryKey = 'id';
    protected $allowedFields = ['order_id', 'jersey_id', 'quantity', 'price'];

    // Constructor
    public function __construct()
    {
        parent::__construct();
    }

    // Tambahkan method-method tambahan sesuai kebutuhan, misalnya untuk mengambil detail item berdasarkan order_id.
}
