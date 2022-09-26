<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TbRiwayatMurid extends Migration
{
  public function up()
  {
    $fields = [
      'id_riwayat_murid' => [
        'type' => 'INT',
        'constraint' => 11,
        'unsigned' => true,
        'auto_increment' => true
      ],
      'id_murid' => [
        'type' => 'INT',
        'constraint' => 11,
        'unsigned' => true,
        'null' => true
      ],
      'lama_kandungan' => [
        'type' => 'VARCHAR',
        'constraint' => 255,
        'null' => true,
      ],
      'jenis_kelahiran' => [
        'type' => 'VARCHAR',
        'constraint' => 255,
        'null' => true,
      ],
      'berat_lahir' => [
        'type' => 'DECIMAL',
        'constraint' => '5,2',
        'null' => true,
      ],
      'tinggi_lahir' => [
        'type' => 'INT',
        'constraint' => 3,
        'null' => true,
      ],
      'panas_tinggi' => [
        'type' => 'ENUM',
        'constraint' => ['Ya', 'Tidak'],
        'default' => 'Ya',
      ],
      'pingsan' => [
        'type' => 'ENUM',
        'constraint' => ['Ya', 'Tidak'],
        'default' => 'Ya',
      ],
      'kejang' => [
        'type' => 'ENUM',
        'constraint' => ['Ya', 'Tidak'],
        'default' => 'Ya',
      ],
      'infeksi_telinga' => [
        'type' => 'ENUM',
        'constraint' => ['Ya', 'Tidak'],
        'default' => 'Ya',
      ],
      'alergi' => [
        'type' => 'ENUM',
        'constraint' => ['Ya', 'Tidak'],
        'default' => 'Ya',
      ],
      'kecelakaan' => [
        'type' => 'ENUM',
        'constraint' => ['Ya', 'Tidak'],
        'default' => 'Ya',
      ],
      'hal_penglihatan' => [
        'type' => 'ENUM',
        'constraint' => ['Ya', 'Tidak'],
        'default' => 'Ya',
      ],
      'hal_pendengaran' => [
        'type' => 'ENUM',
        'constraint' => ['Ya', 'Tidak'],
        'default' => 'Ya',
      ],
      'hal_bicara' => [
        'type' => 'ENUM',
        'constraint' => ['Ya', 'Tidak'],
        'default' => 'Ya',
      ],
      'hal_kemandirian' => [
        'type' => 'VARCHAR',
        'constraint' => 255,
        'null' => true,
      ],
      'hal_sifat' => [
        'type' => 'VARCHAR',
        'constraint' => 255,
        'null' => true,
      ],
      'hal_disukai' => [
        'type' => 'VARCHAR',
        'constraint' => 255,
        'null' => true,
      ],
      'hal_tidak_disukai' => [
        'type' => 'VARCHAR',
        'constraint' => 255,
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
      ],
    ];
    $this->forge->addField($fields);
    $this->forge->addKey('id_riwayat_murid', true);
    $this->forge->addForeignKey('id_murid', 'tb_murid', 'id_murid', 'CASCADE', 'CASCADE');
    $this->forge->createTable('tb_riwayat_murid');
  }

  public function down()
  {
    $this->forge->dropTable('tb_riwayat_murid');
  }
}
