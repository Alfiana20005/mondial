<?php

namespace App\Controllers;

use App\Models\User_Models;

class Login extends BaseController
{
    protected $helpers = ['form'];
    protected $User;
    public function __construct() {
        helper('form');
        $this -> User = new User_Models();
    }
    public function index(): string
    {
        return view('login/login');
    }
    public function register(): string
    {
        return view('login/register');
    } 
    public function saveData(): string
    {
        return view('login/register');
    }
    public function login()
    {
        // Validasi form
        $rules = [
            'username' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Username tidak boleh kosong'
                ]
            ],
            'password' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Password tidak boleh kosong'
                ]
            ]
        ];
    
        if (!$this->validate($rules)) {
            // Validasi tidak berhasil
            return redirect()->to('/')->withInput()->with('errors', $this->validator->listErrors());
        }
    
        // Jika validasi berhasil
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');
        $cek = $this->User->login($username, $password);
        
        if ($cek) {
            // Jika data cocok
            session()->set('log', true);
            session()->set('nama', $cek['nama']);
            session()->set('user_type', $cek['user_type']);
            session()->set('email', $cek['email']);
            session()->set('password', $cek['password']);
            session()->set('username', $cek['username']);
            session()->set('foto', $cek['foto']);
            session()->set('status_approve', $cek['status_approve']);
    
            return redirect()->to(base_url('/dashboard2'));
        } else {
            // Jika data tidak cocok
            session()->setFlashdata('pesanlogin', 'Login Gagal, data yang Anda masukkan tidak cocok');
            return redirect()->to(base_url('/login'));
        }
    }
    
    

    public function profile(): string
    {
        return view('login/profile');
    }

}
