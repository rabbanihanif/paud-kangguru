<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TbPembayaran extends Migration
{
  public function up()
  {
    // id_pembayaran, id_pengguna, kode_pembayaran, nama_bank, nama_pengirim, bukti_transfer, bukti_transfer_tipe, status, created_at, updated_at, deleted_at
    $this->forge->addField([
      'id_pembayaran' => [
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
      'kode_pembayaran' => [
        'type' => 'VARCHAR',
        'constraint' => 30,
        'null' => true,
      ],
      'nama_bank' => [
        'type' => 'VARCHAR',
        'constraint' => 255,
        'null' => true,
      ],
      'nama_pengirim' => [
        'type' => 'VARCHAR',
        'constraint' => 255,
        'null' => true,
      ],
      'bukti_transfer' => [
        'type' => 'VARCHAR',
        'constraint' => 100,
        'null' => true,
      ],
      'bukti_transfer_tipe' => [
        'type' => 'VARCHAR',
        'constraint' => 30,
        'null' => true,
      ],
      'status' => [
        'type' => 'VARCHAR',
        'constraint' => 255,
        'default' => 'Belum bayar',
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
    $this->forge->addKey('id_pembayaran', true);
    $this->forge->addForeignKey('id_pengguna', 'tb_pengguna', 'id_pengguna', 'CASCADE', 'CASCADE');
    $this->forge->createTable('tb_pembayaran');
  }

  public function down()
  {
    $this->forge->dropTable('tb_pembayaran');
  }
}
