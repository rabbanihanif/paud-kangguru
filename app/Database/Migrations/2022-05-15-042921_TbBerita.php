<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TbBerita extends Migration
{
  public function up()
  {
    $this->forge->addField([
      'id_berita' => [
        'type'           => 'INT',
        'constraint'     => 11,
        'unsigned'       => true,
        'auto_increment' => true,
      ],
      'id_pengguna' => [
        'type' => 'INT',
        'constraint' => 11,
        'unsigned' => true,
        'null' => true,
      ],
      'judul' => [
        'type'       => 'VARCHAR',
        'constraint' => '100',
        'null' => true,
      ],
      'deskripsi' => [
        'type'       => 'TEXT',
        'null' => true,
      ],
      'gambar' => [
        'type'       => 'VARCHAR',
        'constraint' => '100',
        'null' => true,
      ],
      'created_at' => [
        'type'       => 'DATETIME',
        'null'       => true,
      ],
      'updated_at' => [
        'type'       => 'DATETIME',
        'null'       => true,
      ],
      'deleted_at' => [
        'type'       => 'DATETIME',
        'null'       => true,
      ],
    ]);
    $this->forge->addKey('id_berita', true);
    $this->forge->addForeignKey('id_pengguna', 'tb_pengguna', 'id_pengguna', 'CASCADE', 'CASCADE');
    $this->forge->createTable('tb_berita');
  }

  public function down()
  {
    $this->forge->dropTable('tb_berita');
  }
}
