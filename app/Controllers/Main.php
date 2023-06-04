<?php

namespace App\Controllers;
use App\Models\UserModel;

class Main extends BaseController
{
    protected $UserModel;

    public function __construct()
    {
        $this->UserModel = new UserModel();

    }
    public function index()
    {
        $data = [
            'title' => "Login"
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

    public function loginValidation()
    {

    }
    
    public function addUser()
    {
        $postData = [
            'nama_pengguna' => $this->request->getVar('nama'),
            'email' => $this->request->getVar('email'),
            'no_hp' => $this->request->getVar('nomor'),
            'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT),
        ];
        $this->UserModel->insertUser($postData);

        return redirect()->to(base_url());
    }


}
