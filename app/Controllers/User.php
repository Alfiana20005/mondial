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




    public function status_approve()
    {
        // Pastikan metode yang digunakan adalah POST
        if ($this->request->getMethod() == "POST") {
            // Ambil data ID dan status dari permintaan POST
            $id = $this->request->getPost('id_user');
            $status_approve = $this->request->getPost('new_status');

            // Lakukan pembaruan status di database menggunakan model
            $result = $this->User_Models->updateStatus($id, $status_approve);

            // Beri respons berdasarkan hasil pembaruan
            if ($result) {
                return redirect()->back();
                // return $this->response->setJSON(['success' => false, 'message' => 'Berhasil']);
        
            } else {
                return $this->response->setJSON(['success' => false, 'message' => 'Gagal memperbarui status']);
            }
        } else {
            // Jika metode bukan POST, beri respons dengan kesalahan
            return $this->response->setJSON(['success' => false, 'message' => 'Metode yang tidak valid']);
        }
    }
    public function profile($id_user)
    {
        $user_type = session()->get('user_type');

        $user = $this->User_Models->getPetugas($id_user);
        $type = $this->User_Models->getUserType($user_type);
        $data =[
            'title' => 'My Profile',
            'user' => $user,
            'type' => $type,
        ];
        return view('login/profile', $data);
    }

    public function updatePass($id_user){
        // Mengambil data yang akan diupdate dari request
        $dataToUpdate = [
            'password' => $this->request->getVar('passwordBaru'),
            
        ];
    
        
        // Membersihkan data yang mungkin ada dari inputan form
        $dataToUpdate = array_filter($dataToUpdate);
    
        // Memastikan ada data yang akan diupdate
        if (!empty($dataToUpdate)) {
            // Mengeksekusi perintah update
            $this->User_Models->update($id_user, $dataToUpdate);
    
            // Ambil data petugas setelah diubah dari database
            $newPetugasData = $this->User_Models->getPetugas($id_user);
    
            // Perbarui sesi pengguna dengan data baru
            
                session()->set([
                    // 'nama' => $newPetugasData['nama'],
                    // 'nip' => $newPetugasData['nip'],
                    // 'username' => $newPetugasData['username'],
                    // 'email' => $newPetugasData['email'],
                    'password' => $newPetugasData['password'],
                    // 'level' => $newPetugasData['level'],
                    
                ]);
            
            //alert
            session()->setFlashdata('pesan', 'Data Berhasil diubah.');
        } else {
            // Jika tidak ada data yang diupdate, munculkan pesan kesalahan
            session()->setFlashdata('error', 'Tidak ada data yang diupdate.');
        }
        // dd('berhasil');
    
        // Redirect ke halaman sebelumnya atau halaman yang sesuai
        return redirect()->back();
    }
    public function deleteFoto($id_user) 
    {
        // Saring masukan untuk mencegah SQL injection atau serangan lainnya
        $id_user = filter_var($id_user, FILTER_SANITIZE_NUMBER_INT);
    
        // Panggil metode delete pada model atau apapun yang diperlukan
        $this->User_Models->deletePhoto($id_user);
        session()->setFlashdata('pesan', 'Data Berhasil Dihapus.');
    
        // Redirect ke halaman yang sesuai
        return redirect()->back();
    }
    public function updateFoto($id_user) {
       // Mengambil data yang akan diupdate dari request
       $dataToUpdate = [
        
        'nama' => $this->request->getVar('nama'),
        'username' => $this->request->getVar('username'),
        'email' => $this->request->getVar('email'),
        'password' => $this->request->getVar('password'),
        'user_type' => $this->request->getVar('user_type'),
        'status_approve' => $this->request->getVar('status_approve'),
        'foto' => $this->request->getVar('foto'),
        ];

        $foto = $this->request->getFile('foto');

        // Cek apakah file foto diunggah
        if ($foto && $foto->isValid() && !$foto->hasMoved()) {
            // Generate nama unik untuk file foto
            $fotoName = $foto->getRandomName();

            // Pindahkan file foto ke folder yang diinginkan
            $foto->move('image/profile', $fotoName); // Perbarui path sesuai dengan folder yang diinginkan

            // Tambahkan nama file foto ke data yang akan diupdate
            $dataToUpdate['foto'] = $fotoName;
        }

        // Membersihkan data yang mungkin ada dari inputan form
        $dataToUpdate = array_filter($dataToUpdate);

        // Memastikan ada data yang akan diupdate
        if (!empty($dataToUpdate)) {
            // Mengeksekusi perintah update
            $this->User_Models->update($id_user, $dataToUpdate);

            // Ambil data petugas setelah diubah dari database
            $newPetugasData = $this->User_Models->getPetugas($id_user);

            // Perbarui sesi pengguna dengan data baru
            
                session()->set([
                    'nama' => $newPetugasData['nama'],
                    'username' => $newPetugasData['username'],
                    'email' => $newPetugasData['email'],
                    'password' => $newPetugasData['password'],
                    'user_type' => $newPetugasData['user_type'],
                    'status_approve' => $newPetugasData['status_approve'],
                    'foto' => $newPetugasData['foto'],
                ]);
            
            //alert
            session()->setFlashdata('pesan', 'Data Berhasil diubah.');
        } else {
            // Jika tidak ada data yang diupdate, munculkan pesan kesalahan
            session()->setFlashdata('error', 'Tidak ada data yang diupdate.');
        }
        // dd('berhasil');

        // Redirect ke halaman sebelumnya atau halaman yang sesuai
        return redirect()->back();
    }


    










}
