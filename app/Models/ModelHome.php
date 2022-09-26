<?php

namespace App\Models;

use CodeIgniter\Model;


class ModelHome extends Model
{

    public function tot_pendaftar()
    {
        return $this->db->table('tb_murid')->countAll();
    }

    

    public function tot_pengguna()
    {
        return $this->db->table('tb_pengguna')->countAll();
    }

    // public function pendaftar_laki()
    // {
    //     return $this->db->table('tb_murid')->select('id_murid')->where('jenis_kelamin', 'Laki-laki')->countAllResults();
    // }
}
