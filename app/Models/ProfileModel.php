<?php

namespace App\Models;

use CodeIgniter\Model;

class ProfileModel extends Model
{

    protected $table            = 'profile';
    protected $allowedFields    = ['nama', 'alamat', 'email', 'telp', 'gambar'];


    public function getAllProfile()
    {
        return $this->db->table('profile')->get()->getResultArray();
    }
    public function getProfileById($id = false)
    {
        if ($id == false) {
            return $this->findAll();
        }

        return $this->where(['id' => $id])->first();
    }
}
