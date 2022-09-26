<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class KodeOrtu extends Migration
{
  public function up()
  {
    $fields = [
      'kode_ortu' => ['type' => 'VARCHAR', 'constraint' => 255, 'after' => 'id_ortu', 'null' => true],
    ];

    $this->forge->addColumn('tb_ortu', $fields);
  }

  public function down()
  {
    $this->forge->dropColumn('tb_ortu', 'kode_ortu');
  }
}
