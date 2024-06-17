<?php

namespace App\Models;

use CodeIgniter\Model;

class KlubModel extends Model
{
    protected $table = 'klub';
    protected $id = 'id_klub';
    protected $allowedFields = ['nama', 'logo'];

    public function getCount()
    {
        return $this->countAllResults();
    }
    public function rules()
    {
        return [
            [
                'field' => 'nama',
                'label' => 'nama',
                'rules' => 'required|max_length[32]'
            ],
            [
                'field' => 'logo',
                'label' => 'logo',
                'rules' => 'uploaded[logo]|max_size[logo,2048]|is_image[logo]|mime_in[logo,image/jpg,image/jpeg,image/png]'
            ]
        ];
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
