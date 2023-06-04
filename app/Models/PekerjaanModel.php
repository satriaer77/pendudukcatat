<?php

namespace App\Models;

use CodeIgniter\Model;

use CodeIgniter\HTTP\Request;
use Config\Services;

class PekerjaanModel extends Model
{
    protected $table      = 'pekerjaan';
    protected $primaryKey = 'id_pekerjaan';
    protected $allowedFields = ['nama_pekerjaan']; 

    public function getAllPekerjaan()
    {
        return $this->findAll();
    }

    public function getPekerjaanById($idPekerjaan)
	{
        return $this->where('id_pekerjaan',$idPekerjaan)->get()->getRowArray();
	}

    public function insertUser($data)
    {
        $this->insert($data);
        return $this->getInsertID();
    }

    

}
