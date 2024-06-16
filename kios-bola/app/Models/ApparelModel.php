<?php

namespace App\Models;

use CodeIgniter\Model;

class ApparelModel extends Model
{
    protected $table = 'apparel';
    protected $useTimestamps = true;
    protected $allowedFields = ['nama', 'sampul' . 'slug'];

    public function getCount()
    {
        return $this->countAllResults();
    }

    // Di dalam model Anda, misalnya JerseyModel.php
    // public function getJerseys()
    // {
    //     $builder = $this->db->table('jersey');
    //     $builder->select('jersey.*, klub.nama as nama_klub');
    //     $builder->join('klub', 'klub.id = jersey.id_klub');
    //     $query = $builder->get();
    //     return $query->getResultArray();
    // }

    // ...
}
