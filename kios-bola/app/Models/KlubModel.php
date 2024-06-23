<?php

namespace App\Models;

use CodeIgniter\Model;

class KlubModel extends Model
{
    protected $table = 'klub';
    protected $primaryKey = 'id_klub';
    protected $id = 'id_klub';
    protected $allowedFields = ['nama', 'logo', 'slug'];

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
    public function getKlub($slug = false)
    {
        if ($slug === false) {
            return $this->findAll();
        }

        return $this->where(['slug' => $slug])->first();
    }


    public function search($keyword)
    {
        return $this->like('nama', $keyword)
            ->orLike('slug', $keyword)
            ->orLike('id_klub', $keyword);
    }
    // Di dalam model Anda, misalnya JerseyModel.php
    // public function getJerseys()
    // {
    //     $builder = $this->db->table('jersey');
    //     $builder->select('jersey.*, klub.nama as nama_klub');
    //     $builder->join('klub', 'klub.id_klub = jersey.id_klub');
    //     $query = $builder->get();
    //     return $query->getResultArray();
    // }

    // ...
}
