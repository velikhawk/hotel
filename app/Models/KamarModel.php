<?php

namespace App\Models;

use CodeIgniter\Model;

class KamarModel extends Model
{

    protected $table            = 'tbl_kamar';
    protected $allowedFields    = ['nokamar', 'idtipekamar', 'price', 'allotment', 'picture'];
    protected $primaryKey = 'idkamar';


    public function getAllKamar()
    {
        return $this->db->table('tbl_kamar')->get()->getResultArray();
    }
    public function getKamarById($idkamar = false)
    {
        if ($idkamar == false) {
            return $this->findAll();
        }

        return $this->where(['idkamar' => $idkamar])->first();
    }
}
