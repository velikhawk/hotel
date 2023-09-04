<?php

namespace App\Models;

use CodeIgniter\Model;

class HotelModel extends Model
{

    protected $table            = 'hotel';
    protected $allowedFields    = ['nama_hotel','bintang', 'alamat', 'email', 'telp', 'email'];


    public function getAllHotel()
    {
        return $this->db->table('hotel')->get()->getResultArray();
    }
    public function getHotelById($id = false)
    {
        if ($id == false) {
            return $this->findAll();
        }

        return $this->where(['id' => $id])->first();
    }
}
