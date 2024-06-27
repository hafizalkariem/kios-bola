<?php

namespace App\Models;

use CodeIgniter\Model;

class OrderModel extends Model
{
    protected $table = 'orders'; // Nama tabel di database
    protected $primaryKey = 'id'; // Primary key tabel orders

    protected $allowedFields = [
        'user_id', 'shipping_address', 'payment_method', 'total_amount', 'status'
    ];

    protected $useTimestamps = true; // Aktifkan penggunaan timestamps

    protected $createdField = 'created_at'; // Field untuk created_at
    protected $updatedField = 'updated_at'; // Field untuk updated_at
}
