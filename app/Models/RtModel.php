<?php

namespace App\Models;

use CodeIgniter\Model;

use CodeIgniter\HTTP\Request;
use Config\Services;

class RtModel extends Model
{
    protected $table      = 'rt';
    protected $primaryKey = 'id_rt';
    protected $allowedFields = ['no_rt', 'tanggal_dibuat', 'id_rw']; 

    public function getAllRt()
	{
        return $this->findAll();
	}
    public function getAllRtByRw($idRw)
	{
        return $this->where('id_rw',$idRw)->get()->getResultArray();
	}

    public function insertRt($data)
    {
        return $this->insert($data);
    }
    public function deleteRt($idRt)
    {
        return $this->where('id_rt', $idRt)->delete();
    }

    

}
