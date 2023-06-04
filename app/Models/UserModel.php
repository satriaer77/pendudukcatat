<?php

namespace App\Models;

use CodeIgniter\Model;

use CodeIgniter\HTTP\Request;
use Config\Services;

class UserModel extends Model
{
    protected $table      = 'user';
    protected $primaryKey = 'id_user';
    protected $allowedFields = ['nama', 'password', 'email', 'no_hp', 'foto_profil']; 

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
