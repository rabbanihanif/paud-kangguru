<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TbPengguna extends Migration
{
  public function up()
  {
    $this->forge->addField([
      'id_pengguna' => [
        'type' => 'INT',
        'constraint' => 11,
        'unsigned' => true,
        'auto_increment' => true,
      ],
      'email' => [
        'type' => 'VARCHAR',
        'constraint' => '100',
        'null' => true,
      ],
      'password' => [
        'type' => 'VARCHAR',
        'constraint' => '100',
      ],
      'nik' => [
        'type' => 'VARCHAR',
        'constraint' => '100',
        'null' => true,
      ],
      'nama' => [
        'type' => 'VARCHAR',
        'constraint' => '100',
        'null' => true,
      ],
      'level' => [
        'type' => 'VARCHAR',
        'constraint' => '100',
        'null' => true,
      ],
      'created_at' => [
        'type' => 'DATETIME',
        'null' => true,
      ],
      'updated_at' => [
        'type' => 'DATETIME',
        'null' => true,
      ],
      'deleted_at' => [
        'type' => 'DATETIME',
        'null' => true,
      ]
    ]);
    $this->forge->addKey('id_pengguna', true);
    $this->forge->createTable('tb_pengguna');
  }

  public function down()
  {
    $this->forge->dropTable('tb_pengguna');
  }
}
