<?php

namespace App\Models;

use CodeIgniter\Model;

class User_Models extends Model
{
    protected $table = 'user';
    protected $primaryKey = 'id_user';
    protected $useTimestamps = false;


    // protected $allowedFields = ['foto', 'nama','password','email','username','level'];
    protected $allowedFields = ['nama','user_type', 'email', 'password', 'username', 'foto', 'status_approve'];


    protected $validationRules = [];
    protected $validationMessages = [];
    protected $skipValidation = false;
    protected $cleanValidationRules = true;

    public function getPetugas($id_user)
    {
        return $this->find($id_user);
    }
    public function getDataByLevel($user_type)
    {
        return $this->where('user_type', $user_type)->findAll();
    }
    public function login($username, $password) 
    {
        return $this->db->table('user')
                        ->where([
                            'username' => $username,
                            'password' => $password,
                            'status_approve' => 'Diterima' // Hanya mencocokkan jika status_approve = 1
                        ])->get()->getRowArray();
    }
    
    public function countAnggota()
    {
        // Membuat instansiasi model
        $model = new User_Models();

        // Menghitung jumlah petugas
        $totalAnggota = $model->countAll();

        return $totalAnggota;
    }
  

    
}
    
