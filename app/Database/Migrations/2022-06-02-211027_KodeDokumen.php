<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class KodeDokumen extends Migration
{
  public function up()
  {
    $fields = [
      'kode_dokumen' => ['type' => 'VARCHAR', 'constraint' => 255, 'after' => 'id_dokumen', 'null' => true],
    ];

    $this->forge->addColumn('tb_dokumen', $fields);
  }

  public function down()
  {
    $this->forge->dropColumn('tb_dokumen', 'kode_dokumen');
  }
}
