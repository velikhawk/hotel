<?php

namespace App\Models;

use CodeIgniter\Model;

class CheckinModel extends Model
{

    protected $table            = 'tbl_checkin';
    protected $allowedFields    = ['idtamu','idkamar', 'checkin', 'duration', 'status'];
    protected $primaryKey = 'id';


    public function getAllCheckin()
    {
        return $this->db->table('tbl_checkin')->get()->getResultArray();
    }
    public function getCheckinById($id = false)
    {
        if ($id == false) {
            return $this->findAll();
        }

        return $this->where(['id' => $id])->first();
    }
}
