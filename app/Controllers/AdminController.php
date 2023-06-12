<?php

namespace App\Controllers;
use App\Models\UserModel;
use App\Models\AdminModel;
use App\Models\PendudukModel;
use App\Models\RwModel;
use App\Models\RtModel;
use App\Models\PekerjaanModel;
use App\Models\PesanModel;
use App\Models\JenisSuratModel;
use App\Models\SuratModel;
use App\Models\PermohonanSuratModel;

class AdminController extends BaseController
{
    protected $AdminModel, $PendudukModel, $RwModel, $RtModel, $PekerjaanModel, $PesanModel, $JenisSuratModel, $SuratModel, $PermohonanSuratModel;

    public function __construct()
    {
        $this->AdminModel = new AdminModel();
        $this->PendudukModel = new PendudukModel();
        $this->RwModel = new RwModel();
        $this->RtModel = new RtModel();
        $this->PekerjaanModel = new PekerjaanModel();
        $this->PesanModel = new PesanModel();
        $this->JenisSuratModel = new JenisSuratModel();
        $this->SuratModel = new SuratModel();
        $this->PermohonanSuratModel = new PermohonanSuratModel();

    }

    //-- PAGE --//
    public function index()
    {
        session();
        $data = [
            'title' => "Login",
            'validation' => \Config\Services::validation(),
        ];

        return view('login', $data);
    }

    public function register()
    {
        $data = [
            'title' => "Register"
        ];
        return view('register', $data);
    }
    
    public function daerah()
    {
        $data = [
            'title' => "Mengelola Daerah",
            'page'  => "daerah",
            'listRw' => $this->RwModel->getAllRw()
        ];
        return view('admin/daerah', $data);
    }

    public function daerahRw($idRw)
    {
        $data = [
            'title' => "Mengelola Daerah RW",
            'page'  => "daerah",
            'rw'    => $this->RwModel->getRwById($idRw),
            'listRt' => $this->RtModel->getAllRtByRw($idRw)
        ];
        return view('admin/daerah_rw', $data);
    }

    public function daerahRt($idRt)
    {
        $data = [
            'title' => "Mengelola Daerah RT"
        ];
        return view('admin/daerah_rt', $data);
    }
    
    public function penduduk()
    {
        $data = [
            'title' => "Mengelola Penduduk",
            'page'  => "penduduk",
            'listPenduduk' => $this->PendudukModel->getAllPenduduk(),
            'listRw' => $this->RwModel->getAllRw(),
            'listRt' => $this->RtModel->getAllRt(),
            'listPekerjaan' => $this->PekerjaanModel->getAllPekerjaan()

        ];
        // dd($data);
        return view('admin/penduduk', $data);
    }

    public function detailPenduduk($nik)
    {
        
        $data = [
            'title' => "Detail Penduduk",
            'page'  => "penduduk",
            'penduduk' => $this->PendudukModel->getDetailPendudukByNik($nik),
            'listRw' => $this->RwModel->getAllRw(),
            'listRt' => $this->RtModel->getAllRt(),
            'listPekerjaan' => $this->PekerjaanModel->getAllPekerjaan()
        ];
        // dd($data);
        return view('admin/detail_penduduk', $data);
    }

    public function permohonan()
    {
        $data = [
            'title' => "Mengelola Permohonan",
            'page' => "permohonan"
        ];
        return view('admin/permohonan', $data);
    }
    public function permohonanSurat($slugName)
    {
        $data = [
            'title' => "Mengelola Permohonan",
            'page' => "permohonan",
            'suratPermohonan' => $this->PermohonanSuratModel->getAllPendingPermohonanSuratByJenisSlug($slugName),
        ];
        return view('admin/permohonan_surat', $data);
    }

    public function detailPermohonan($idPermohonan)
    {
        $data = [
            'title' => "Detail Permohonan"
        ];
        return view('admin/detail_permohonan', $data);
    }

    public function perpindahan()
    {
        $data = [
            'title' => "Mengelola Perpindahan Penduduk"
        ];
        return view('admin/perpindahan', $data);
    }

    public function detailPerpindahan()
    {
        $data = [
            'title' => "Mengelola Perpindahan Penduduk"
        ];
        return view('admin/detail_erpindahan', $data);
    }


    public function pesan()
    {
        $data = [
            'title' => "Pesan Penduduk",
            'page' => "pesan",
            'messages' => $this->PesanModel->getAllPesanNotReadPriority(),
        ];
        // dd($data);
        return view('admin/pesan', $data);
    }
    public function pesanPenduduk($nik)
    {
        $this->PesanModel->readPesanByNikForAdmin($nik);
        $data = [
            'title' => "Detail Pesan Penduduk",
            'page' => "pesan",
            'messages' => $this->PesanModel->getAllPesanByNik($nik),
            'penduduk' => $this->PendudukModel->getPendudukByNik($nik),
        ];
        return view('admin/pesan_penduduk', $data);
    }
    
    public function report()
    {
        $data = [
            'title' => "Mengelola Permohonan",
        ];
        return view('admin/permohonan', $data);
    }





    //-- FUNCTION --//

    public function loginValidation()
    {
        
        if(!$this->validate([
            'email' => 'required',
            'password' => 'required'
        ]) )
        {
            $validation = \Config\Services::validation(); 
            return redirect()->to(base_url('admin'))->withInput()->with('validation', $validation);
        }
        else
        {
            $postData = [
                'email' => $this->request->getVar('email'),
                'password' => $this->request->getVar('password')
            ];
            return redirect()->to(base_url("admin/daerah"));
        }

    }
    
   
    public function addRw()
    {
        if(!$this->validate([
            'no-rw' => [
                'rules' => 'required|is_unique[rw.no_rw]',
                'errors' => [
                    'required' => "Anda Harus Mengisi Form No RW",
                    'is_unique' => "No RW yang anda isi sudah terdaftar",
                ]
            ],
        ]) )
        {
            $validation = \Config\Services::validation();
            return redirect()->to(base_url('admin/daerah'))->withInput()->with('validation', $validation);
        }
        else
        {
            // dd("sa");
            $postData = [
                'no_rw' => $this->request->getVar('no-rw'),
                'tanggal_dibuat' => date("Y-m-d")
            ];
            $this->RwModel->insertRw($postData);
            return redirect()->to(base_url('admin/daerah'));

        }

    }
    public function addRt()
    {
        if(!$this->validate([
            'no-rt' => [
                'rules' => 'required',
                'errors' => [
                    'required' => "Anda Harus Mengisi Form No RT",
                    'is_unique' => "No RT yang anda isi sudah terdaftar di RW",
                ]
            ],
        ]) )
        {
            $validation = \Config\Services::validation();
            return redirect()->to(base_url('admin/daerah/rw/'.$this->request->getVar('id-rw')))->withInput()->with('validation', $validation);
        }
        else
        {
            $postData = [
                'no_rt' => $this->request->getVar('no-rt'),
                'tanggal_dibuat' => date("Y-m-d"),
                'id_rw' => $this->request->getVar('id-rw')
            ];
            $this->RtModel->insertRt($postData);
            return redirect()->to(base_url('admin/daerah/rw/'.$this->request->getVar('id-rw')));

        }
    }

    public function editRw()
    {
        if(!$this->validate([
            'no-rw' => [
                'rules' => 'required|is_unique[rw.no_rw]',
                'errors' => [
                    'required' => "Anda Harus Mengisi Form No RW",
                    'is_unique' => "No RW yang anda isi sudah terdaftar",
                ]
            ],
        ]) )
        {
            $validation = \Config\Services::validation();
            return redirect()->to(base_url('admin/daerah/rw/'.$this->request->getVar('id-rw')))->withInput()->with('validation', $validation);
        }
        else
        {
            // dd("sa");
            $postData = [
                'id_rw' => $this->request->getVar('id-rw'),
                'no_rw' => $this->request->getVar('no-rw'),
                'tanggal_dibuat' => $this->request->getVar('tanggal-rw')
            ];
            $this->RwModel->insertRw($postData);
            return redirect()->to(base_url('admin/daerah/rw/'.$this->request->getVar('id-rw')));

        }

    }

    public function deleteRt($idRw, $idRt)
    {
    //    dd($idRw);
        $this->RtModel->deleteRt($idRt);
        return redirect()->to(base_url('admin/daerah/rw/'.$idRw));

    }

    public function tambahPenduduk()
    {
        if(!$this->validate([
            'nik' => 'required',
            'password' => 'required'
        ]) )
        {
            $validation = \Config\Services::validation(); 
            // dd($validation);
            return redirect()->to(base_url('admin/penduduk'))->withInput()->with('validation', $validation);
        }
        else
        {
            $jenisSurat = $this->JenisSuratModel->getAllJenisSurat();
        
            $postData = [
                'nik' => $this->request->getVar('nik'),
                'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT),
                'nama_penduduk' => $this->request->getVar('nama-penduduk'),
                'tanggal_lahir' => $this->request->getVar('tanggal-lahir'),
                'jenis_kelamin' => $this->request->getVar('jenis-kelamin'),
                'agama' => $this->request->getVar('agama'),
                'golongan_darah' => $this->request->getVar('golongan-darah'),
                'kewarganegaraan' => $this->request->getVar('kewarganegaraan'),
                'id_rw' => $this->request->getVar('id-rw'),
                'id_rt' => $this->request->getVar('id-rt'),
                'alamat_detail' => $this->request->getVar('alamat-detail'),
                'id_pekerjaan' => $this->request->getVar('pekerjaan'),
            ];
            // dd($postData);
            $penduduk = $this->PendudukModel->insertPenduduk($postData);
            foreach($jenisSurat as $js) 
            {
                $this->SuratModel->insertSurat([
                    'nik' => $postData["nik"], 
                    'id_jenis_surat' => $js["id_jenis_surat"]]);
            }
            $this->PesanModel->insertBatchPesan([
                [
                    'nik' => $postData["nik"],
                    'pengirim' => 0,
                    'isi_pesan' => "Selamat Akun anda telah dibuat dan selamat datang Di Penduduk Catat ".$postData["nama_penduduk"]
                ],
                [
                    'nik' => $postData["nik"],
                    'pengirim' => 0,
                    'isi_pesan' => "Silahkan mengupload surat kelengkapan anda!"
                ],


            ]);

            return redirect()->to(base_url('admin/penduduk'));
            
        }
    }
    public function editPenduduk($nik)
    {

        if(!$this->validate([
            'nik' => 'required',
        ]) )
        {
            $validation = \Config\Services::validation(); 
            // dd($validation);
            return redirect()->to(base_url('admin/penduduk/'.$nik))->withInput()->with('validation', $validation);
        }
        else
        {
            
            $penduduk = $this->PendudukModel->getDetailPendudukByNik($nik);
            $fotoPenduduk = $this->request->getFile('foto');
            // dd($fotoPenduduk);
            if($fotoPenduduk->getError() == 4)
            {
                $namaFile   = $penduduk["foto"];
            }
            else 
            {
                $namaFile   = $nik.'.jpg';
                if($penduduk["foto"] != "default.png")
                {
                    unlink('resources/uploads/images/profile/'.$namaFile);
                    $fotoPenduduk->move('resources/uploads/images/profile/', $namaFile);
                }
                else
                {
                    $fotoPenduduk->move('resources/uploads/images/profile/', $namaFile);
                }
            }

            $postData = [
                'nik' => $nik,
                'nama_penduduk' => $this->request->getVar('nama-penduduk'),
                'tanggal_lahir' => $this->request->getVar('tanggal-lahir'),
                'jenis_kelamin' => $this->request->getVar('jenis-kelamin'),
                'agama' => $this->request->getVar('agama'),
                'golongan_darah' => $this->request->getVar('golongan-darah'),
                'kewarganegaraan' => $this->request->getVar('kewarganegaraan'),
                'id_rw' => $this->request->getVar('id-rw'),
                'id_rt' => $this->request->getVar('id-rt'),
                'alamat_detail' => $this->request->getVar('alamat-detail'),
                'id_pekerjaan' => $this->request->getVar('pekerjaan'),
                'foto' => $namaFile
            ];
            // dd($postData);
            $this->PesanModel->insertPesan(
                [
                    'nik' => $postData["nik"],
                    'pengirim' => 0,
                    'isi_pesan' => "Hai ".$postData["nama_penduduk"]." data anda sudah diperbarui"
                ]);
            $penduduk = $this->PendudukModel->updatePenduduk($postData);
            return redirect()->to(base_url('admin/penduduk'));
            
        }
    }

    public function hapusPenduduk($nik)
    {
        $penduduk = $this->PendudukModel->getDetailPendudukByNik($nik);
        
        if($penduduk["foto"] != "default.png")
        {
            unlink('resources/uploads/images/profile/'.$penduduk["foto"]);
        }

        $surat = $this->SuratModel->getAllSuratByNik($nik);

        foreach($surat as $s)
        {
            if($s['foto_surat'] != NULL)
            {
                unlink('resources/uploads/documents/'.$s["foto_surat"]);
            }
        }

        $this->PesanModel->deletePesanByNik($nik);
        $this->SuratModel->deleteSuratByNik($nik);
        $this->PendudukModel->deletePendudukByNik($nik);
        return redirect()->to(base_url('admin/penduduk'));
    }

    public function kirimPesan($nik)
    {
        $postData = [
            'nik' => $nik,
            'isi_pesan' => $this->request->getVar('pesan'),
            'status' => 0,
            'pengirim' => 0,
        ];

        // dd($postData);
        $this->PesanModel->insertPesan($postData);
        return redirect()->to(base_url("admin/pesan/".$nik));
    }

    // 'email' => $this->request->getVar('email'),
    // 'no_hp' => $this->request->getVar('nomor'),
    // 'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT),

}
