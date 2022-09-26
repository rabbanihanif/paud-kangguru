<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class AdminSeeder extends Seeder
{
  public function run()
  {
    $data = [
      [
        'kode_pengguna' => date('Ymd') . '001',
        'nama' => 'Admin',
        'email' => 'admin@gmail.com',
        'password' => password_hash('admin', PASSWORD_DEFAULT),
        'level' => 'admin',
        'created_at' => date('Y-m-d H:i:s'),
        'updated_at' => date('Y-m-d H:i:s')
      ]
    ];
    foreach($data as $d) {
      $this->db->table('tb_pengguna')->insert($d);
    }
  }
}
