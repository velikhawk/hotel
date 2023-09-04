<?php

namespace App\Models;

use CodeIgniter\Model;

class TipekamarModel extends Model
{

    protected $table            = 'tbl_tipekamar';
    protected $allowedFields    = ['kodekamar', 'namatipe', 'ukuran'];
    protected $primaryKey = 'idtipekamar';



    public function getAllTipekamar()
    {
        return $this->db->table('tbl_tipekamar')->get()->getResultArray();
    }
    public function getTipekamarById($idtipekamar = false)
    {
        if ($idtipekamar == false) {
            return $this->findAll();
        }

        return $this->where(['idtipekamar' => $idtipekamar])->first();
    }
}
