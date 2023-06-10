<?php

namespace App\Models;

use CodeIgniter\Model;

use CodeIgniter\HTTP\Request;
use Config\Services;

class PesanModel extends Model
{
    protected $table      = 'pesan';
    protected $primaryKey = 'id_pesan';
    protected $allowedFields = ['isi_pesan', 'nik', 'tanggal_kirim', 'status', 'pengirim']; 

    public function getAllPesan()
	{
        return $this->findAll();
	}

    public function getAllPesanByNik($nik)
	{
        return $this->join('penduduk', 'penduduk.nik = pesan.nik')
        ->where("pesan.nik", $nik)->findAll();
	}
    public function getAllPesanNotReadPriority()
	{
        return $this->join('penduduk', 'penduduk.nik = pesan.nik')
        ->groupBy('penduduk.nik')
        ->orderBy('status', 'DESC')->findAll();
	}

    public function insertPesan($data)
    {
        return $this->insert($data);
    }
    public function deletePesan($idPesan)
    {
        return $this->where('id_pesan', $idPesan)->delete();
    }

    

}
