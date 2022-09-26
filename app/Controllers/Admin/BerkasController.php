<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\Dokumen;
use CodeIgniter\Model;

class BerkasController extends BaseController
{
  public function index()
  {
    $db      = \Config\Database::connect();
    $builder = $db->table('tb_dokumen');
    $builder->select('tb_dokumen.*, tb_murid.nama_lengkap, tb_murid.nomor_pendaftaran');
    $builder->join('tb_pengguna', 'tb_pengguna.id_pengguna = tb_dokumen.id_pengguna');
    $builder->join('tb_murid', 'tb_murid.id_pengguna = tb_pengguna.id_pengguna');
    $builder->where('tb_dokumen.deleted_at', null);
    $data['title'] = "Data Dokumen Murid";
    $data['data'] = $builder->get();

    return view('admin/berkas/list', $data);
  }

  public function edit($id)
  {
    helper('form');
    $data['dokumen'] = model(Dokumen::class)->find($id);

    $db      = \Config\Database::connect();
    $builder = $db->table('tb_dokumen');
    $builder->select('tb_dokumen.*, tb_murid.nama_lengkap, tb_murid.nomor_pendaftaran');
    $builder->join('tb_pengguna', 'tb_pengguna.id_pengguna = tb_dokumen.id_pengguna');
    $builder->join('tb_murid', 'tb_murid.id_pengguna = tb_pengguna.id_pengguna');
    $builder->where('tb_dokumen.deleted_at', null);
    $builder->where('tb_dokumen.id_dokumen', $id);
    $data['title'] = "Edit Dokumen Murid";
    $data['data'] = $builder->get();

    return view('admin/berkas/edit', $data);
  }

  public function update($id)
  {
    $model = model(Dokumen::class)->find($id);

    if ($this->validate([
      'foto_murid'  => 'uploaded[foto_murid]|mime_in[foto_murid,image/jpg,image/jpeg,image/png,image/gif,application/pdf]',
      'akta_lahir'  => 'uploaded[akta_lahir]|mime_in[akta_lahir,image/jpg,image/jpeg,image/png,image/gif,application/pdf]',
      'kk'  => 'uploaded[kk]|mime_in[kk,image/jpg,image/jpeg,image/png,image/gif,application/pdf]',
    ])) {
      $foto_murid = $this->request->getFile('foto_murid');
      $akta_lahir = $this->request->getFile('akta_lahir');
      $kk = $this->request->getFile('kk');
      // $fileLama = $this->request->getVar('fileLama');

      $folderName = rtrim($folderName ?? date('Ymd'), '/') . '/';

      if (!$foto_murid->hasMoved()) {
        $foto_murid_filename = $foto_murid->getRandomName();
        $foto_murid_tipe = $foto_murid->getMimeType();
        $foto_murid->move(ROOTPATH . 'public/uploads/' . $folderName, $foto_murid_filename);
      }

      if (!$akta_lahir->hasMoved()) {
        $akta_lahir_filename = $akta_lahir->getRandomName();
        $akta_lahir_tipe = $akta_lahir->getMimeType();
        $akta_lahir->move(ROOTPATH . 'public/uploads/' . $folderName, $akta_lahir_filename);
      }

      if (!$kk->hasMoved()) {
        $kk_filename = $kk->getRandomName();
        $kk_tipe = $kk->getMimeType();
        $kk->move(ROOTPATH . 'public/uploads/' . $folderName, $kk_filename);
      }


      $model->set($id, [
        'foto_murid' => $folderName . $foto_murid_filename,
        'foto_murid_tipe' => $foto_murid_tipe,
        'akta_lahir' => $folderName . $akta_lahir_filename,
        'akta_lahir_tipe' => $akta_lahir_tipe,
        'kk' => $folderName . $kk_filename,
        'kk_tipe' => $kk_tipe,
      ])->update();

      session()->setFlashdata('success', 'Pengisian formulir berkas murid berhasil.');
      return redirect()->to('dokumen.edit');
    } else {
      session()->setFlashdata('msg', 'Input data gagal. Silahkan ulangi kembali.');
      return $this->index('dokumen.edit');
    }
  }

  public function destroy()
  {
    $model = model(Dokumen::class);
    $model->delete($this->request->getPost('id_dokumen'));
    session()->setFlashdata('msg', 'Berhasil menghapus data');
    return redirect('dokumen.index');
  }
}
