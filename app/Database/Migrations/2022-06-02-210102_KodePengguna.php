<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class KodePengguna extends Migration
{
  public function up()
  {
    $fields = [
      'kode_pengguna' => ['type' => 'VARCHAR', 'constraint' => 255, 'after' => 'id_pengguna', 'null' => true],
    ];

    $this->forge->addColumn('tb_pengguna', $fields);
  }

  public function down()
  {
    $this->forge->dropColumn('tb_pengguna', 'kode_pengguna');
  }
}
