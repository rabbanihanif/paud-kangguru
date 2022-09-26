<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TbOrtu extends Migration
{
  public function up()
  {
    // id_ortu, id_pengguna, nama, jenis_kelamin, tempat_lahir, tanggal_lahir, agama, alamat, anak_ke, jumlah_saudara, gol_darah, penghasilan_ortu, created_at, updated_at, deleted_at
    $this->forge->addField([
      'id_ortu' => [
        'type' => 'INT',
        'constraint' => 11,
        'unsigned' => true,
        'auto_increment' => true,
      ],
      'id_pengguna' => [
        'type' => 'INT',
        'constraint' => 11,
        'unsigned' => true,
        'null' => true,
      ],
      'nama' => [
        'type' => 'VARCHAR',
        'constraint' => 255,
        'null' => true,
      ],
      'nik' => [
        'type' => 'VARCHAR',
        'constraint' => 255,
        'null' => true,
      ],
      'pendidikan' => [
        'type' => 'VARCHAR',
        'constraint' => 255,
        'null' => true,
      ],
      'pekerjaan' => [
        'type' => 'VARCHAR',
        'constraint' => 255,
        'null' => true,
      ],
      'telepon' => [
        'type' => 'VARCHAR',
        'constraint' => 255,
        'null' => true,
      ],
      'nama_ibu' => [
        'type' => 'VARCHAR',
        'constraint' => 255,
        'null' => true,
      ],
      'nik_ibu' => [
        'type' => 'VARCHAR',
        'constraint' => 255,
        'null' => true,
      ],
      'pendidikan_ibu' => [
        'type' => 'VARCHAR',
        'constraint' => 255,
        'null' => true,
      ],
      'pekerjaan_ibu' => [
        'type' => 'VARCHAR',
        'constraint' => 255,
        'null' => true,
      ],
      'telepon_ibu' => [
        'type' => 'VARCHAR',
        'constraint' => 255,
        'null' => true,
      ],
      'penghasilan_ortu' => [
        'type' => 'VARCHAR',
        'constraint' => 30,
        'default' => '0',
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
    ]);
    $this->forge->addKey('id_ortu', true);
    $this->forge->addForeignKey('id_pengguna', 'tb_pengguna', 'id_pengguna', 'CASCADE', 'CASCADE');
    $this->forge->createTable('tb_ortu');
  }

  public function down()
  {
    $this->forge->dropTable('tb_ortu');
  }
}
