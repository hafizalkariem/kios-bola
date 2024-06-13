<?php

namespace App\Models;

use CodeIgniter\Model;

class JerseyModel extends Model
{
    protected $table = 'jersey';
    protected $useTimestamps = true;
    protected $allowedfields = ['judul', 'harga', 'ketersediaan', 'sampul', 'apparel'];

    public function findAllWithClub()
    {
        return $this->select('jersey.*, klub.nama AS club_name, klub.logo AS club_logo')
            ->join('klub', 'klub.id_klub = jersey.id_klub')
            ->findAll();
    }
    public function findByClub($clubId)
    {
        return $this->select('jersey.*, klub.nama AS club_name, klub.logo AS club_logo')
            ->join('klub', 'klub.id_klub = jersey.id_klub')
            ->where('jersey.id_klub', $clubId)
            ->findAll();
    }
}
    // public function getJerseys()
    // {
    //     $builder = $this->db->table('jersey');
    //     $builder->select('jersey.*, klub.nama as nama_klub');
    //     $builder->join('klub', 'klub.id = jersey.id_klub');
    //     $query = $builder->get();
    //     return $query->getResultArray();
    // }

    // ...
