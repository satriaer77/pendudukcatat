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
        ->where("pesan.nik", $nik)
        ->get()->getResultArray();
    }

    public function getAllPesanByNikNotReadLimit5($nik)
	{
        return $this->join('penduduk', 'penduduk.nik = pesan.nik')
        ->where("pesan.nik", $nik)
        ->where("pesan.status", 0)
        ->where("pesan.pengirim", 0)
        ->limit(5)
        ->get()->getResultArray();
	}

    public function getAllPesanNotReadPriority()
	{
        return $this->select('*')->selectMin('status')->selectMax('tanggal_kirim')
        ->join('penduduk', 'penduduk.nik = pesan.nik')
        ->orderBy('tanggal_kirim', 'DESC')
        ->orderBy('status', 'ASC')
        ->groupBy('penduduk.nik')
        ->findAll();
	}

    public function insertPesan($data)
    {
        return $this->insert($data);
    }
    public function insertBatchPesan($data)
    {
        return $this->insertBatch($data);
    }
    public function readPesanByNikForAdmin($nik)
    {
        return $this->where('nik', $nik)->where('pengirim', 1)->set(['status' => 1 ])->update();
    }
    public function readPesanByNikForPenduduk($nik)
    {
        return $this->where('nik', $nik)->where('pengirim', 0)->set(['status' => 1 ])->update();
    }
    public function deletePesan($idPesan)
    {
        return $this->where('id_pesan', $idPesan)->delete();
    }
    public function deletePesanByNik($nik)
    {
        return $this->where('nik', $nik)->delete();
    }

    

}
