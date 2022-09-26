<?php

namespace App\Models;

use CodeIgniter\Model;

class Murid extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'tb_murid';
    protected $primaryKey       = 'id_murid';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'object';
    protected $useSoftDeletes   = true;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'id_pengguna', 'nomor_pendaftaran', 'kelompok', 'nama_lengkap', 'nama_panggilan', 'nik', 'jenis_kelamin', 'tempat_lahir', 'tanggal_lahir', 'umur_murid', 'anak_ke', 'jumlah_saudara', 'gol_darah', 'berat_badan', 'tinggi_badan', 'agama', 'alamat', 'status_pendaftar', 'nama_ayah', 'nik_ayah', 'telepon_ayah', 'pendidikan_ayah', 'pekerjaan_ayah', 'nama_ibu', 'nik_ibu', 'telepon_ibu', 'pendidikan_ibu', 'pekerjaan_ibu',
        'penghasilan_ortu'
    ];

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



    public function getPlaygroupData()
    {
        return $this->db->table('tb_murid')
            ->where('kelompok', 'Playgroup')
            ->get()
            ->getResultArray();
    }
    public function getTkAData()
    {
        return $this->db->table('tb_murid')
            ->where('kelompok', 'TK A')
            ->get()
            ->getResultArray();
    }
    public function getTkBData()
    {
        return $this->db->table('tb_murid')
            ->where('kelompok', 'TK B')
            ->get()
            ->getResultArray();
    }
}
