<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table            = 'users';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'object'; // Mengembalikan objek
    protected $useSoftDeletes   = true; // Menggunakan soft deletes;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'username', 
        'password', 
        'role', 
        'name', 
        'phone', 
        'email', 
        'created_by', 
        'created_at', 
        'updated_at', 
        'deleted_at'
    ];

    protected bool $allowEmptyInserts = false;
    protected bool $updateOnlyChanged = true;

    protected array $casts = [];
    protected array $castHandlers = [];

    // Dates
    protected $useTimestamps = true; // Menggunakan timestamps;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules = [
        'username' => 'required|alpha_numeric|min_length[3]|max_length[150]|is_unique[users.username]',
        'password' => 'required|min_length[8]|max_length[255]',
        'role'     => 'permit_empty|in_list[admin,user]',
        'name'     => 'required|alpha_space|min_length[3]|max_length[150]',
        'phone'    => 'required|numeric|min_length[10]|max_length[20]',
        'email'    => 'permit_empty|valid_email|max_length[150]',
    ];

    protected $validationMessages = [
        'username' => [
            'required' => 'Username wajib diisi',
            'alpha_numeric' => 'Username hanya boleh mengandung karakter alfanumerik',
            'min_length' => 'Username harus terdiri dari minimal 3 karakter',
            'max_length' => 'Username tidak boleh lebih dari 150 karakter',
            'is_unique' => 'Username sudah terdaftar',
        ],
        'password' => [
            'required' => 'Password wajib diisi',
            'min_length' => 'Password harus terdiri dari minimal 8 karakter',
            'max_length' => 'Password tidak boleh lebih dari 255 karakter',
        ],
        'role' => [
            'in_list' => 'Role harus berupa admin atau user',
        ],
        'name' => [
            'required' => 'Nama wajib diisi',
            'alpha_space' => 'Nama hanya boleh mengandung karakter alfabet dan spasi',
            'min_length' => 'Nama harus terdiri dari minimal 3 karakter',
            'max_length' => 'Nama tidak boleh lebih dari 150 karakter',
        ],
        'phone' => [
            'required' => 'Nomor telepon wajib diisi',
            'numeric' => 'Nomor telepon harus berupa angka',
            'min_length' => 'Nomor telepon harus terdiri dari minimal 10 karakter',
            'max_length' => 'Nomor telepon tidak boleh lebih dari 20 karakter',
        ],
        'email' => [
            'valid_email' => 'Email harus berupa alamat email yang valid',
            'max_length' => 'Email tidak boleh lebih dari 150 karakter',
        ],
    ];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];

    public function checkDataLogin($username, $password)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('users');
        return $builder->getWhere([
            'username' => $username,
            'password' => $password
        ])->getRow();
    }
}
