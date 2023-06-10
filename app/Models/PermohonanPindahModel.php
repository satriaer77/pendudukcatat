<?php

namespace App\Models;

use CodeIgniter\Model;

use CodeIgniter\HTTP\Request;
use Config\Services;

class PermohonanPindahModel extends Model
{
    protected $table      = 'permohonan_pindah';
    protected $primaryKey = 'id_permohonan_pindah';
    protected $allowedFields = ['id_surat', 'tanggal_permohonan', 'status', 'tanggal_disetujui', 'nik']; 


    public function getAllPermohonanSurat()
    {
        return $this->findAll();
    }

    public function getAllPendingPermohonanSurat()
    {
        return $this->where('status',0)->get()->getResultArray();
    }

    public function getAllAcceptPermohonanSurat()
    {
        return $this->where('status',1)->get()->getResultArray();
    }

    public function getAllRejectPermohonanSurat()
    {
        return $this->where('status',2)->get()->getResultArray();
    }

    public function acceptPermohonanSurat($idPermohonan)
    {
        return $this->update($idPermohonan, ['status', 1]);
    }

    public function rejectPermohonanSurat($idPermohonan)
    {
        return $this->update($idPermohonan, ['status', 2]);
    }
    
    public function getDetailPermohonanSurat($idPermohonan)
	{
        return $this->join('penduduk', 'penduduk.nik = surat_permohonan.nik')
        ->join('surat', 'surat.id_surat = surat_permohonan.id_surat')
        ->where('id_permohonan', $idPermohonan)->get()->getRowArray();
	}

    public function insertUser($data)
    {
        $this->insert($data);
        return $this->getInsertID();
    }


}
