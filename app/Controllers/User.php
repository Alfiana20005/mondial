<?php

namespace App\Controllers;

use App\Models\User_Models;

class User extends BaseController
{
    protected $helpers = ['form'];
    protected $User_Models;
    public function __construct() {
        helper('form');
        $this -> User_Models = new User_Models();
    }

    public function index(): string
    {
        $data_user = $this->User_Models->findAll();
        $data =[

            'data_user' => $data_user
        ];
        return view('admin/tambahUser', $data);
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
            return redirect()->to('/tambahUser') ->withInput() -> with('errors', $this->validator->listErrors());
        }

       
        $this->User_Models->save([
            
            'nama' => $this->request->getVar('nama'),
            'username' => $this->request->getVar('username'),
            'email' => $this->request->getVar('email'),
            'password' => $this->request->getVar('password'),
            'user_type' => $this->request->getVar('user_type'),
            
        ]);

        //alert
        session()->setFlashdata('pesan', 'Data Berhasil Ditambahkan.');

        return redirect()-> to('/user');

        // return view('admin/v_masterpetugas');
    }
    public function delete($id_user) 
    {
        // Saring masukan untuk mencegah SQL injection atau serangan lainnya
        $id_user = filter_var($id_user, FILTER_SANITIZE_NUMBER_INT);
    
        // Panggil metode delete pada model atau apapun yang diperlukan
        $this->User_Models->delete($id_user);
        session()->setFlashdata('pesan', 'Data Berhasil Dihapus.');
    
        // Redirect ke halaman yang sesuai
        return redirect()->to('/user');
    }





}
