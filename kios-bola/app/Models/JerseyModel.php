<?php

namespace App\Models;

use CodeIgniter\Model;

class JerseyModel extends Model
{
    protected $table = 'jersey';
    protected $useTimestamps = true;

    // Di dalam model Anda, misalnya JerseyModel.php
    public function getJerseys()
    {
        $builder = $this->db->table('jersey');
        $builder->select('jersey.*, klub.nama as nama_klub');
        $builder->join('klub', 'klub.id = jersey.id_klub');
        $query = $builder->get();
        return $query->getResultArray();
    }

    // ...
}
