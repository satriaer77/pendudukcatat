<?php

namespace App\Models;

use CodeIgniter\Model;

use CodeIgniter\HTTP\Request;
use Config\Services;

class SuratModel extends Model
{
    protected $table      = 'rt';
    protected $primaryKey = 'id_rt';
    protected $allowedFields = ['no_rt']; 

    public function getUser($dataEmail)
	{
        return $this->where('email',$data['email'])->get()->getRowArray();
	}

    public function insertUser($data)
    {
        $this->insert($data);
        return $this->getInsertID();
    }

    

}
