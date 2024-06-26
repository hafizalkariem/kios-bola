<?php

namespace App\Models;

use CodeIgniter\Model;

class ApparelModel extends Model
{
    protected $table = 'apparel';
    protected $primaryKey = 'id';
    protected $allowedFields = ['nama', 'sampul', 'slug'];

    public function getApparel($slug = false)
    {
        if ($slug === false) {
            return $this->findAll();
        }

        return $this->where(['slug' => $slug])->first();
    }

    public function saveApparel($data)
    {
        return $this->insert($data);
    }

    public function updateApparel($id, $data)
    {
        return $this->update($id, $data);
    }

    public function deleteApparel($id)
    {
        return $this->delete($id);
    }

    public function search($keyword)
    {
        return $this->like('nama', $keyword)
            ->orLike('slug', $keyword)
            ->orLike('id', $keyword);
    }
    public function getCount()
    {
        return $this->countAllResults();
    }
}
