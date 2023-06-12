<?php

namespace App\Models;

use CodeIgniter\Model;

use CodeIgniter\HTTP\Request;
use Config\Services;

class SuratModel extends Model
{
    protected $table      = 'surat';
    protected $primaryKey = 'id_surat';
    protected $allowedFields = ['id_jenis_surat', 'nik', 'foto_surat']; 

    public function getAllSuratByNik($nik)
	{
        return $this->join('jenis_surat','jenis_surat.id_jenis_surat = surat.id_jenis_surat')
        ->where('nik', $nik)->findAll();
	}
    public function getAllSuratById($id_surat)
	{
        return $this->join('jenis_surat','jenis_surat.id_jenis_surat = surat.id_jenis_surat')
        ->where('id_surat', $id_surat)->get()->getRowArray();
	}

    public function getAllSuratWajibByNik($nik)
	{
        return $this->join('jenis_surat','jenis_surat.id_jenis_surat = surat.id_jenis_surat')
        ->where('jenis_status', 1)
        ->where('nik', $nik)
        ->findAll();
	}
    public function getAllSuratOpsionalByNik($nik)
	{
        return $this->join('jenis_surat','jenis_surat.id_jenis_surat = surat.id_jenis_surat')
        ->where('jenis_status', 0)
        ->where('nik', $nik)
        ->findAll();
	}

    public function insertSurat($data)
    {
        $this->insert($data);
        return $this->getInsertID();
    }
    public function updateSuratById($id_surat, $namaFile)
    {
        return $this->where('id_surat', $id_surat)->set(['foto_surat' => $namaFile ])->update();
    }

    public function deleteSurat($id_surat)
	{
        return $this->where('id_surat', $id_surat)->delete();
	}
    public function deleteSuratByNik($nik)
	{
        return $this->where('nik', $nik)->delete();
	}

    

}
