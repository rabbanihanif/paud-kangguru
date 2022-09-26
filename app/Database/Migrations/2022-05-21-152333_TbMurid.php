<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TbMurid extends Migration
{
  public function up()
  {
    $this->forge->addField([
      'id_murid' => [
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
      'nomor_pendaftaran' => [
        'type' => 'VARCHAR',
        'constraint' => 255,
        'null' => true
      ],
      'kelompok' => [
        'type' => 'VARCHAR',
        'constraint' => 255,
        'null' => true
      ],
      'nama_lengkap' => [
        'type' => 'VARCHAR',
        'constraint' => 255,
        'null' => true
      ],
      'nama_panggilan' => [
        'type' => 'VARCHAR',
        'constraint' => 255,
        'null' => true
      ],
      'nik' => [
        'type' => 'VARCHAR',
        'constraint' => 255,
        'null' => true
      ],
      'jenis_kelamin' => [
        'type' => 'VARCHAR',
        'constraint' => 255,
        'null' => true
      ],
      'tempat_lahir' => [
        'type' => 'VARCHAR',
        'constraint' => 255,
        'null' => true
      ],
      'tanggal_lahir' => [
        'type' => 'DATE',
        'null' => true
      ],
      'anak_ke' => [
        'type' => 'INT',
        'constraint' => 11,
        'null' => true
      ],
      'jumlah_saudara' => [
        'type' => 'INT',
        'constraint' => 11,
        'null' => true
      ],
      'gol_darah' => [
        'type' => 'VARCHAR',
        'constraint' => 255,
        'null' => true
      ],
      'berat_badan' => [
        'type' => 'DECIMAL',
        'constraint' => '5,2',
        'null' => true
      ],
      'tinggi_badan' => [
        'type' => 'INT',
        'constraint' => 3,
        'null' => true
      ],
      'agama' => [
        'type' => 'VARCHAR',
        'constraint' => 255,
        'null' => true
      ],
      'alamat' => [
        'type' => 'VARCHAR',
        'constraint' => 255,
        'null' => true
      ],
      'status_pendaftar' => [
        'type' => 'VARCHAR',
        'constraint' => 255,
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
    $this->forge->addKey('id_murid', true);
    $this->forge->addForeignKey('id_pengguna', 'tb_pengguna', 'id_pengguna', 'CASCADE', 'CASCADE');
    $this->forge->createTable('tb_murid');
  }

  public function down()
  {
    $this->forge->dropTable('tb_murid');
  }
}
