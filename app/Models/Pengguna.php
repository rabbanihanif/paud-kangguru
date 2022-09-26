<?php

namespace App\Models;

use CodeIgniter\Model;

class Pengguna extends Model
{
  protected $DBGroup          = 'default';
  protected $table            = 'tb_pengguna';
  protected $primaryKey       = 'id_pengguna';
  protected $useAutoIncrement = true;
  protected $insertID         = 0;
  protected $returnType       = 'object';
  protected $useSoftDeletes   = true;
  protected $protectFields    = true;
  protected $allowedFields    = ['email', 'password', 'level', 'nik', 'nama', 'kode_pengguna'];

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
