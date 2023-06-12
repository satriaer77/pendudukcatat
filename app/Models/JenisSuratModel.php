<?php

namespace App\Models;

use CodeIgniter\Model;

use CodeIgniter\HTTP\Request;
use Config\Services;

class JenisSuratModel extends Model
{
    protected $table      = 'jenis_surat';
    protected $primaryKey = 'id_jenis_surat';
    protected $allowedFields = ['nama_surat', 'jenis_status']; 

    public function getAllJenisSurat()
    {
        return $this->findAll();
    }
    public function getJenisSurat($idSurat)
	{
        return $this->where('id_surat',$idSurat)->get()->getRowArray();
	}

    public function insertUser($data)
    {
        $this->insert($data);
        return $this->getInsertID();
    }

    

}
