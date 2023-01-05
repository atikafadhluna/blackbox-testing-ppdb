<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class User extends Seeder
{
    public function run()
    {
        $data = [
            'nama_user' => 'Admin',
            'email' => 'atikaafadhluna@gmail.com',
            'telepon' => '081260741115',
            'password' => password_hash('admin', PASSWORD_DEFAULT),
        ];

        $this->db->table('tbl_user')->insert($data);
    }
}
