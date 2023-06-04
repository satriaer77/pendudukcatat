<?php

namespace App\Controllers;
use App\Models\UserModel;
use App\Models\AdminModel;
use App\Models\PendudukModel;

class PendudukController extends BaseController
{
    protected $AdminModel, $PenduduModel;

    public function __construct()
    {
        $this->AdminModel    = new AdminModel();
        $this->PendudukModel = new PendudukModel();

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

    public function register()
    {
        $data = [
            'title' => "Register"
        ];
        return view('register', $data);
    }

    public function beranda()
    {
        $data = [
            'title' => "Beranda"
        ];
        return view('beranda', $data);
    }
    public function dataDiri()
    {
        $data = [
            'title' => "Data Diri"
        ];
        return view('data_diri', $data);
    }

    //-- END PAGE --//



    //-- DATABASE INTERACTION & FUNCTION --//

    public function loginValidation()
    {
        
        if(!$this->validate([
            'email' => 'required',
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
                if($penduduk['password'] === $postData["password"])
                {
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



}
