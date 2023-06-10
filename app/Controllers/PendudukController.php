<?php

namespace App\Controllers;
use App\Models\UserModel;
use App\Models\AdminModel;
use App\Models\PendudukModel;
use App\Models\PesanModel;

class PendudukController extends BaseController
{
    protected $AdminModel, $PendudukModel, $PesanModel;

    public function __construct()
    {
        $this->AdminModel    = new AdminModel();
        $this->PendudukModel = new PendudukModel();
        $this->PesanModel = new PesanModel();

    }

    //-- PAGE --//
    public function index()
    {
        $data = [
            'title' => "Login",
            'validation' => \Config\Services::validation(),
        ];
 
        return view('penduduk/login', $data);
    }

    public function beranda()
    {
        $data = [
            'title' => "Beranda"
        ];
        return view('penduduk/beranda', $data);
    }
    public function dataDiri()
    {
        $data = [
            'title' => "Data Diri",
            'page'  => "profile",
            'diri'  => $this->PendudukModel->getDetailPendudukByNik(session()->get('nik'))
        ];
        return view('penduduk/data_diri', $data);
    }


    public function pesan()
    {
        $data = [
            'title' => "Pesan",
            'page'  => "profile",
            'diri'  => $this->PendudukModel->getDetailPendudukByNik(session()->get('nik')),
            'messages'  => $this->PesanModel->getAllPesanByNik(session()->get('nik'))
        ];

        // dd($data);
        return view('penduduk/pesan', $data);
    }

    //-- END PAGE --//






    //-- DATABASE INTERACTION & FUNCTION --//

    public function loginValidation()
    {
        
        if(!$this->validate([
            'nik' => 'required',
            'password' => 'required'
        ]) )
        {
            $validation = \Config\Services::validation(); 
            // dd($validation);
            return redirect()->to(base_url('admin'))->withInput()->with('validation', $validation);
        }
        else
        {
            $postData = [
                'nik' => $this->request->getVar('nik'),
                'password' => $this->request->getVar('password')
            ];
            $penduduk = $this->PendudukModel->getPendudukByNik($postData["nik"]);
            if(count($penduduk) > 0)
            {
                if (password_verify($postData["password"], $penduduk["password"])) {
                    $ses_data = [
                        'nik' => $penduduk['nik'],
                        'nama' => $penduduk['nama_penduduk'],
                        'foto' => $penduduk['foto'],
                        'logged_in' => TRUE
                    ];
    
                    session()->set($ses_data);
                    return redirect()->to(base_url("penduduk/beranda"));
                }
                else
                {
                    return redirect()->to(base_url());
                }
            }
            else
            {
                return redirect()->to(base_url());
            }
        }

    }


    public function kirimPesan()
    {
        $postData = [
            'nik' => $this->request->getVar('nik'),
            'isi_pesan' => $this->request->getVar('pesan'),
            'status' => 0,
            'pengirim' => 1,
        ];

        $this->PesanModel->insertPesan($postData);
        return redirect()->to(base_url("penduduk/pesan"));
    }



}
