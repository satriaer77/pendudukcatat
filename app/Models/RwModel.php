<?php

namespace App\Models;

use CodeIgniter\Model;

use CodeIgniter\HTTP\Request;
use Config\Services;

class RwModel extends Model
{
    protected $table      = 'rw';
    protected $primaryKey = 'id_rw';
    protected $allowedFields = ['no_rw', 'tanggal_dibuat']; 

    public function getAllRw()
	{
        return $this->findAll();
	}

    public function getRwById($idRw)
    {
        return $this->find($idRw);
    }

    public function getAllRtById($idRw)
	{
        return $this->where('id_rw',$idRw)->get()->getResultArray();
	}

    public function insertRw($data)
    {
        return $this->insert($data);
    }
    public function updateRw($data)
    {
        return $this->update($data['id_rw'], [
            'no_rw' => $data["no_rw"]
        ]);
    }
    public function deletetRw($idRw)
    {
        return $this->where("id_rw", $idRw)->delete();
    }

    

}
