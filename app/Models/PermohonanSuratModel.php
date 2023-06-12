<?php

namespace App\Models;

use CodeIgniter\Model;

use CodeIgniter\HTTP\Request;
use Config\Services;

class PermohonanSuratModel extends Model
{
    protected $table      = 'permohonan_surat';
    protected $primaryKey = 'id_permohonan';
    protected $allowedFields = ['id_surat', 'tanggal_permohonan', 'status', 'tanggal_disetujui', 'nik', 'tujuan', 'info']; 

 
    //Status
    // 0 -> Reject
    // 1 -> Pending
    // 2 -> Accept 

    public function getAllPermohonanSurat()
    {
        return $this->findAll();
    }

    public function getAllPendingPermohonanSurat()
    {
        return $this->join('surat', 'surat.id_surat = permohonan_surat.id_surat')
        ->join('jenis_surat', 'surat.id_jenis_surat = jenis_surat.id_jenis_surat')
        ->select('permohonan_surat.*, jenis_surat.nama_surat')
        ->where('status',1)->get()->getResultArray();
    }
    public function getAllPendingPermohonanByNik($nik)
    {
        return $this->join('surat', 'surat.id_surat = permohonan_surat.id_surat')
        ->join('jenis_surat', 'surat.id_jenis_surat = jenis_surat.id_jenis_surat')
        ->select('permohonan_surat.*, jenis_surat.nama_surat')
        ->where('status',1)->where('surat.nik', $nik)->get()->getResultArray();
    }
    
    
    public function getAllAcceptPermohonanSurat()
    {
        return $this->join('surat', 'surat.id_surat = permohonan_surat.id_surat')
        ->join('jenis_surat', 'surat.id_jenis_surat = jenis_surat.id_jenis_surat')
        ->select('permohonan_surat.*, jenis_surat.nama_surat')
        ->where('status',2)->get()->getResultArray();
    }
    public function getAllAcceptPermohonanSuratByNik($nik)
    {
        return $this->join('surat', 'surat.id_surat = permohonan_surat.id_surat')
        ->join('jenis_surat', 'surat.id_jenis_surat = jenis_surat.id_jenis_surat')
        ->select('permohonan_surat.*, jenis_surat.nama_surat')
        ->where('status',2)->where('nik', $nik)->get()->getResultArray();
    }

    public function getAllRejectPermohonanSurat()
    {
        return $this->join('surat', 'surat.id_surat = permohonan_surat.id_surat')
        ->join('jenis_surat', 'surat.id_jenis_surat = jenis_surat.id_jenis_surat')
        ->select('permohonan_surat.*, jenis_surat.nama_surat')
        ->where('status',0)->get()->getResultArray();
    }
    public function getAllRejectPermohonanSuratByNik($nik)
    {
        return $this->join('surat', 'surat.id_surat = permohonan_surat.id_surat')
        ->join('jenis_surat', 'surat.id_jenis_surat = jenis_surat.id_jenis_surat')
        ->select('permohonan_surat.*, jenis_surat.nama_surat')
        ->where('status',0)->where('nik', $nik)->get()->getResultArray();
    }

    public function getAllPendingPermohonanSuratByJenis($idJenisSurat)
    {
        return $this->join('surat', 'surat.id_surat = permohonan_surat.id_surat')
        ->join('jenis_surat', 'surat.id_jenis_surat = jenis_surat.id_jenis_surat')
        ->select('permohonan_surat.*, jenis_surat.nama_surat')
        ->where('status',0)->where('surat.id_jenis_surat' , $idJenisSurat)->get()->getResultArray();
    }

    public function getAllPendingPermohonanSuratByJenisSlug($slugName)
    {
        return $this->join('surat', 'surat.id_surat = permohonan_surat.id_surat')
        ->join('jenis_surat', 'surat.id_jenis_surat = jenis_surat.id_jenis_surat')
        ->select('permohonan_surat.*, jenis_surat.nama_surat')
        ->where('status',0)->where('slug_name' , $slugName)->get()->getResultArray();
    }

    //Surat Kematian//
    public function getAllPendingPermohonanSuratKematian()
    {
        return $this->join('surat', 'surat.id_surat = permohonan_surat.id_surat')
        ->join('jenis_surat', 'surat.id_jenis_surat = jenis_surat.id_jenis_surat')
        ->select('permohonan_surat.*, jenis_surat.nama_surat')
        ->where('status',0)->where('id_surat' , 1)->get()->getResultArray();
    }

    public function getAllAcceptPermohonanSuratKematian()
    {
        return $this->join('surat', 'surat.id_surat = permohonan_surat.id_surat')
        ->join('jenis_surat', 'surat.id_jenis_surat = jenis_surat.id_jenis_surat')
        ->select('permohonan_surat.*, jenis_surat.nama_surat')
        ->where('status',1)->where('id_surat' , 1)->get()->getResultArray();
    }

    public function getAllRejectPermohonanSuratKematian()
    {
        return $this->join('surat', 'surat.id_surat = permohonan_surat.id_surat')
        ->join('jenis_surat', 'surat.id_jenis_surat = jenis_surat.id_jenis_surat')
        ->select('permohonan_surat.*, jenis_surat.nama_surat')
        ->where('status',2)->where('id_surat' , 1)->get()->getResultArray();
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

    public function insertPermohonan($data)
    {
        $this->insert($data);
        return $this->getInsertID();
    }

    public function updatePermohonanById($idPermohonan, $status)
    {
        return$this->where('id_permohonan', $idPermohonan)->set(['status' => $status])->update();
    }


}
