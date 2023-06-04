<?php

namespace App\Controllers;
use App\Models\UserModel;
use App\Models\AdminModel;
use App\Models\PendudukModel;
use App\Models\RwModel;
use App\Models\RtModel;
use App\Models\PekerjaanModel;

class AdminController extends BaseController
{
    protected $AdminModel, $PendudukModel, $RwModel, $RtModel, $PekerjaanModel;

    public function __construct()
    {
        $this->AdminModel = new AdminModel();
        $this->PendudukModel = new PendudukModel();
        $this->RwModel = new RwModel();
        $this->RtModel = new RtModel();
        $this->PekerjaanModel = new PekerjaanModel();

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
            'title' => "Mengelola Permohonan"
        ];
        return view('admin/permohonan', $data);
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


    public function report()
    {
        $data = [
            'title' => "Mengelola Permohonan"
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
            $postData = [
                'nik' => $this->request->getVar('nik'),
                'password' => $this->request->getVar('password'),
                'nama_penduduk' => $this->request->getVar('nama-penduduk'),
                'tanggal_lahir' => $this->request->getVar('tanggal-lahir'),
                'jenis_kelamin' => $this->request->getVar('jenis-kelamin'),
                'agama' => $this->request->getVar('agama'),
                'golongan_darah' => $this->request->getVar('golongan-darah'),
                'kewarganegaraan' => $this->request->getVar('kewarganegaraan'),
                'id_rw' => $this->request->getVar('id-rw'),
                'id_rt' => $this->request->getVar('id-rt'),
                'alamat_detail' => $this->request->getVar('alamat-detail'),
                'pekerjaan' => $this->request->getVar('pekerjaan'),
            ];
            $penduduk = $this->PendudukModel->insertPenduduk($postData);
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
            ];
            
            $penduduk = $this->PendudukModel->updatePenduduk($postData);
            return redirect()->to(base_url('admin/penduduk'));
            
        }
    }

    // 'email' => $this->request->getVar('email'),
    // 'no_hp' => $this->request->getVar('nomor'),
    // 'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT),

}
