<?php

namespace App\Controllers;
use App\Models\UserModel;
use App\Models\AdminModel;
use App\Models\PendudukModel;
use App\Models\PesanModel;
use App\Models\SuratModel;
use App\Models\JenisSuratModel;
use App\Models\PermohonanSuratModel;

class PendudukController extends BaseController
{
    protected $AdminModel, $PendudukModel, $PesanModel, $SuratModel, $JenisSuratModel, $PermohonanSuratModel;

    public function __construct()
    {
        $this->AdminModel    = new AdminModel();
        $this->PendudukModel = new PendudukModel();
        $this->PesanModel = new PesanModel();
        $this->SuratModel = new SuratModel();
        $this->JenisSuratModel = new JenisSuratModel();
        $this->PermohonanSuratModel = new PermohonanSuratModel();

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
            'title' => "Beranda",
            'page'  => "beranda",
            'messages' => $this->PesanModel->getAllPesanByNikNotReadLimit5(session()->get('nik')),
            'suratPending'  => $this->PermohonanSuratModel->getAllPendingPermohonanByNik(session()->get('nik'))
        ];

        // dd($data);
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
        $this->PesanModel->readPesanByNikForPenduduk(session()->get('nik'));
        $data = [
            'title' => "Pesan",
            'page'  => "profile",
            'diri'  => $this->PendudukModel->getDetailPendudukByNik(session()->get('nik')),
            'messages'  => $this->PesanModel->getAllPesanByNik(session()->get('nik'))
        ];

        // dd($data);
        return view('penduduk/pesan', $data);
    }


    public function kelengkapanSurat()
    {
        $data = [
            'title' => "Kelengkapan Surat",
            'page'  => "surat",
            'diri'  => $this->PendudukModel->getDetailPendudukByNik(session()->get('nik')),
            'suratWajib'  => $this->SuratModel->getAllSuratWajibByNik(session()->get('nik')),
            'suratOpt'  => $this->SuratModel->getAllSuratOpsionalByNik(session()->get('nik')),
            'jenisSurat'  => $this->JenisSuratModel->getAllJenisSurat()
        ];

        // dd($data);
        return view('penduduk/kelengkapan_surat', $data);
    }

    public function permohonan()
    {
        $data = [
            'title' => "Permohonan",
            'page'  => "permohonan",
            'diri'  => $this->PendudukModel->getDetailPendudukByNik(session()->get('nik')),
            'suratAll'  => $this->SuratModel->getAllSuratByNik(session()->get('nik')),
            'jenisSurat'  => $this->JenisSuratModel->getAllJenisSurat(),
            'suratPending'  => $this->PermohonanSuratModel->getAllPendingPermohonanByNik(session()->get('nik'))
        ];

        // dd($data);
        return view('penduduk/permohonan', $data);
    }

    //-- END PAGE --//






    //-- DATABASE INTERACTION & FUNCTION --//

    public function logout()
    {
        session()->destroy();
        return redirect()->to(base_url("penduduk"));
    }

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

    public function tambahPermohonanSurat()
    {
        $postData = [
            'id_surat' => $this->request->getVar('id-surat'),
            'nik' => session()->get('nik'),
            'tujuan' => $this->request->getVar('tujuan'),
        ];

        $this->PermohonanSuratModel->insertPermohonan($postData);
        return redirect()->to(base_url("penduduk/permohonan"));
    }

    public function batalPermohonanSurat()
    {
        $this->PermohonanSuratModel->updatePermohonanById($this->request->getVar('id-permohonan'), 0);
        return redirect()->to(base_url("penduduk/permohonan"));
    }

    public function uploadSurat()
    {

        if(!$this->validate([
            'foto' => [
                'mime_in[foto,image/jpg,image/jpeg,image/gif,image/png]',
                'max_size[foto,4096]',
            ],
        ]) )
        {
            $validation = \Config\Services::validation(); 
            // dd($validation);
            return redirect()->to(base_url('penduduk/kelengkapan-surat'))->withInput()->with('validation', $validation);
        }
        else
        {
            $idSurat   = $this->request->getVar("id-surat");
            $fotoSurat = $this->request->getFile('foto');
            
            
            $surat = $this->SuratModel->getAllSuratById($idSurat);
            // dd($fotoSurat);
            if($fotoSurat->getError() == 4)
            {
                $namaFile   = $surat["foto_surat"];
            }
            else 
            {
                $namaFile   = session()->get('nik').'_'.$surat["slug_name"].'.jpg';
                if($surat["foto_surat"] != NULL)
                {
                    unlink('resources/uploads/images/documents/'.$namaFile);
                    $fotoSurat->move('resources/uploads/images/documents/', $namaFile);
                }
                else
                {
                    $fotoSurat->move('resources/uploads/images/documents/', $namaFile);
                }
            }

            
            // dd($postData);
            $this->PesanModel->insertPesan(
                [
                    'nik' => session()->get('nik'),
                    'pengirim' => 0,
                    'isi_pesan' => "Hai ".session()->get('nama')." Anda berhasil mengupload ".$surat["nama_surat"]
                ]);
            $this->SuratModel->updateSuratById($idSurat, $namaFile);
            return redirect()->to(base_url('penduduk/kelengkapan-surat'));
            
        }
    }


}
