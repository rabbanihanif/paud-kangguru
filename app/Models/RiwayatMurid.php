<?php

namespace App\Models;

use CodeIgniter\Model;

class RiwayatMurid extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'tb_riwayat_murid';
    protected $primaryKey       = 'id_riwayat_murid';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'object';
    protected $useSoftDeletes   = true;
    protected $protectFields    = true;
    protected $allowedFields    = ['id_murid', 'lama_kandungan', 'jenis_kelahiran', 'berat_lahir', 'tinggi_lahir', 'panas_tinggi', 'pingsan', 'kejang', 'infeksi_telinga', 'alergi', 'kecelakaan', 'hal_penglihatan', 'hal_pendengaran', 'hal_bicara', 'hal_kemandirian', 'hal_sifat', 'hal_disukai', 'hal_tidak_disukai'];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];
}
