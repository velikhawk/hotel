<?php

namespace App\Models;

use CodeIgniter\Model;

class TamuModel extends Model
{

    protected $table            = 'tbl_tamu';
    protected $allowedFields    = ['idtamu', 'nama', 'alamat', 'email', 'telp'];
    protected $primaryKey = 'idtamu';


    public function getAllTamu()
    {
        return $this->db->table('tbl_tamu')->get()->getResultArray();
    }
    public function getTamuById($idtamu = false)
    {
        if ($idtamu == false) {
            return $this->findAll();
        }

        return $this->where(['idtamu' => $idtamu])->first();
    }
}
