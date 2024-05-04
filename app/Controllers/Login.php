<?php

namespace App\Controllers;

use App\Models\User_Models;

class Login extends BaseController
{
    protected $helpers = ['form'];
    protected $User_Models;
    public function __construct() {
        helper('form');
        $this -> User_Models = new User_Models();
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
        $cek = $this->User_Models->login($username, $password);
        
        if ($cek) {
            // Jika data cocok
            session()->set('log', true);
            session()->set('id_user', $cek['id_user']);
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
    
    
    

    


    public function logout() {
        session()->remove('log');
        session()->remove('nama');
        session()->remove('username');
        session()->remove('email');
        session()->remove('user_type');
        session()->remove('password');
        session()->remove('foto');
        session()->remove('status_approve');
        
        session()->setFlashdata('pesanlogout', 'Logout Berhasil');
            return redirect()->to(base_url('/login'));
    }

    public function save()
    {
        
        $rules= [
            'nama' => [
                'rules' => 'required|max_length[30]|is_unique[user.nama]',
                'errors' => ['required'=>'Nama harus diisi']
            ],
            'username' => [
                'rules' => 'required|max_length[10]|is_unique[user.username]',
                'errors' => [
                    'required'=>'Username tidak boleh kosong',
                    'max_length' => 'username maximal 10 huruf',
                    'is_unique' => 'username tidak boleh sama'
    
                ]
            ],
            'password' => [
                'rules' => 'required|max_length[10]',
                'errors' => [
                    'required'=>'password tidak boleh kosong',
                    'max_length' => 'password maximal 10 huruf',
                ]
            ],
            'email' => [
                'rules' => 'required',
                'errors' => [
                    'required'=>'email tidak boleh kosong',
                ]
            ],
            'user_type' => [
                'rules' => 'required',
                'errors' => [
                    'required'=>'user type tidak boleh kosong',
                ]
            ],
        ];

        if(!$this->validate($rules)){
            // session()->setFlashdata('errors', $this->validator->listErrors());
            return redirect()->to('/register') ->withInput() -> with('errors', $this->validator->listErrors());
        }

       
        $this->User_Models->save([
            
            'nama' => $this->request->getVar('nama'),
            'username' => $this->request->getVar('username'),
            'email' => $this->request->getVar('email'),
            'password' => $this->request->getVar('password'),
            'user_type' => $this->request->getVar('user_type'),
            'status_approve' => $this->request->getVar('status_approve'),
            
        ]);

        //alert
        session()->setFlashdata('pesan', 'Data Berhasil Ditambahkan.');

        return redirect()-> to('/register');

        // return view('admin/v_masterpetugas');
    }

}
