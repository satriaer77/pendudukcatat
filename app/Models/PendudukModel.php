<?php

namespace App\Models;

use CodeIgniter\Model;

use CodeIgniter\HTTP\Request;
use Config\Services;

class PendudukModel extends Model
{
    protected $table      = 'penduduk';
    protected $primaryKey = 'nik';
    protected $allowedFields = ['nik', 'nama_penduduk', 'tanggal_lahir', 'jenis_kelamin', 'agama', 'golongan_darah', 'kewarganegaraan', 'alamat_detail', 'password', 'id_rt', 'id_rw', 'id_pekerjaan']; 

    public function getAllPenduduk()
    {
        return $this->join('rt', 'penduduk.id_rt = rt.id_rt')
        ->join('rw', 'penduduk.id_rw = rw.id_rw')
        ->join('pekerjaan', 'penduduk.id_pekerjaan = pekerjaan.id_pekerjaan')
        ->get()->getResultArray();
    }

    public function getDetailPendudukByNik($nik)
    {
        return $this->join('rt', 'penduduk.id_rt = rt.id_rt')
        ->join('rw', 'penduduk.id_rw = rw.id_rw')
        ->join('pekerjaan', 'penduduk.id_pekerjaan = pekerjaan.id_pekerjaan')
        ->where('nik', $nik)->get()->getRowArray();
    }
    public function getPendudukByNik($nik)
    {
        return $this->where('nik', $nik)->get()->getRowArray();
    }

    public function findPendudukByKeyword($keyword)
    {
        return $this->join('rt', 'penduduk.id_rt = rt.id_rt')
        ->join('rw', 'penduduk.id_rw = rw.id_rw')
        ->join('pekerjaan', 'penduduk.id_pekerjaan = pekerjaan.id_pekerjaan')
        ->like('nik', $nik)->get()->getRowArray();
    }


    public function insertPenduduk($data)
    {
        return $this->insert($data);
    }

    public function updatePenduduk($data)
    {
        return $this->update($data['nik'], [
            'nik' => $data['nik'],
            'nama_penduduk' => $data['nama_penduduk'],
            'tanggal_lahir' => $data['tanggal_lahir'],
            'jenis_kelamin' => $data['jenis_kelamin'],
            'agama' => $data['agama'],
            'golongan_darah' => $data['golongan_darah'],
            'kewarganegaraan' => $data['kewarganegaraan'],
            'alamat_detail' => $data['alamat_detail'],
            'id_rt' => $data['id_rt'],
            'id_rw' => $data['id_rw'],
            'id_pekerjaan' => $data['id_pekerjaan']
        ]);
    }
    public function deletePendudukByNik($nik)
    {
        return $this->where('nik', $nik)->delete();
    }

    

}
