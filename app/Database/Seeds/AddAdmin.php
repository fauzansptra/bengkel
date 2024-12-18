<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class AddAdmin extends Seeder
{
    public function run()
    {
        $data = [
            'username' => 'fauzan',
            'password' => sha1('admin'), // Hash the password
            'name' => 'Fauzan Saputra',
            'role' => 'admin'
        ];

        // Using Query Builder
        $this->db->table('users')->insert($data);
    }
}
