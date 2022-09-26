<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelTa extends Model
{
    protected $table = 'tb_ta';
    protected $allowedFields = ['id_ta','tahun', 'ta', 'status'];

    public function getAllData()
    {
        return $this->db->table('tb_ta')
            ->orderBy('tahun', 'ASC')
            ->get()
            ->getResultArray();
    }

    public function insertData($data)
    {
        $this->db->table('tb_ta')
            ->insert($data);
    }

    public function editData($data)
    {
        $this->db->table('tb_ta')
            ->where('id_ta', $data['id_ta'])
            ->update($data);
    }

    public function deteleData($data)
    {
        $this->db->table('tb_ta')
            ->where('id_ta', $data['id_ta'])
            ->delete($data);
    }
}
