<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TbDokumen extends Migration
{
  public function up()
  {
    $this->forge->addField([
      'id_dokumen' => [
        'type' => 'INT',
        'constraint' => 11,
        'unsigned' => true,
        'auto_increment' => true
      ],
      'id_pengguna' => [
        'type' => 'INT',
        'constraint' => 11,
        'unsigned' => true,
        'null' => true
      ],
      'foto_murid' => [
        'type' => 'VARCHAR',
        'constraint' => 255,
        'null' => true
      ],
      'foto_murid_tipe' => [
        'type' => 'VARCHAR',
        'constraint' => 50,
        'null' => true
      ],
      'akta_lahir' => [
        'type' => 'VARCHAR',
        'constraint' => 255,
        'null' => true
      ],
      'akta_lahir_tipe' => [
        'type' => 'VARCHAR',
        'constraint' => 50,
        'null' => true
      ],
      'kk' => [
        'type' => 'VARCHAR',
        'constraint' => 255,
        'null' => true
      ],
      'kk_tipe' => [
        'type' => 'VARCHAR',
        'constraint' => 50,
        'null' => true
      ],
      'created_at' => [
        'type' => 'DATETIME',
        'null' => true
      ],
      'updated_at' => [
        'type' => 'DATETIME',
        'null' => true
      ],
      'deleted_at' => [
        'type' => 'DATETIME',
        'null' => true
      ]
    ]);
    $this->forge->addKey('id_dokumen', true);
    $this->forge->addForeignKey('id_pengguna', 'tb_pengguna', 'id_pengguna', 'CASCADE', 'CASCADE');
    $this->forge->createTable('tb_dokumen');
  }

  public function down()
  {
    $this->forge->dropTable('tb_dokumen');
  }
}
