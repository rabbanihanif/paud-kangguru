<?php

namespace App\Controllers\Ortu;

use App\Controllers\BaseController;
use App\Models\Dokumen;
use App\Models\Murid;

class BerkasMuridController extends BaseController
{
  public function index()
  {
    helper('form');
    $session = session();
    $data['title'] = "Upload Berkas Murid";

    // cek data murid
    $data['murid'] = model(Murid::class)->where('id_pengguna', session('id_pengguna'))->first();
    if (!$data['murid']) return redirect('logout');
    if (!$data['murid']->nama_lengkap) {
      $session->setFlashdata('msg', 'Anda belum mengisi formulir pendaftaran.');
      return redirect()->to('/home');
    }

    // cek data ortu
    // $data['ortu'] = model(Ortu::class)->where('id_pengguna', session('id_pengguna'))->first();
    // if (!$data['ortu']) return redirect('logout');
    // if (!$data['ortu']->nik) {
    //   $session->setFlashdata('msg', 'Anda belum mengisi formulir pendaftaran data orang tua.');
    //   return redirect()->to('/home');
    // }

    $data['dokumen'] = model(Dokumen::class)->where('id_pengguna', session('id_pengguna'))->first();

    return view('ortu/data_berkas', $data);
  }

  public function store()
  {
    $model = model(Dokumen::class)->where('id_pengguna', session('id_pengguna'));
    model(Murid::class)->where('id_pengguna', session('id_pengguna'))->set([
      'status_pendaftar' => 'Menunggu pembayaran'
    ])->update();

    if ($this->validate([
      'foto_murid'  => 'uploaded[foto_murid]|mime_in[foto_murid,image/jpg,image/jpeg,image/png,image/gif,application/pdf]',
      'akta_lahir'  => 'uploaded[akta_lahir]|mime_in[akta_lahir,image/jpg,image/jpeg,image/png,image/gif,application/pdf]',
      'kk'  => 'uploaded[kk]|mime_in[kk,image/jpg,image/jpeg,image/png,image/gif,application/pdf]',
    ])) {
      $foto_murid = $this->request->getFile('foto_murid');
      $akta_lahir = $this->request->getFile('akta_lahir');
      $kk = $this->request->getFile('kk');

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


      $model->set([
        'foto_murid' => $folderName . $foto_murid_filename,
        'foto_murid_tipe' => $foto_murid_tipe,
        'akta_lahir' => $folderName . $akta_lahir_filename,
        'akta_lahir_tipe' => $akta_lahir_tipe,
        'kk' => $folderName . $kk_filename,
        'kk_tipe' => $kk_tipe,
      ])->update();

      session()->setFlashdata('success', 'Pengisian formulir berkas murid berhasil.');
      return redirect('home');
    } else {
      session()->setFlashdata('msg', 'Input data gagal. Silahkan ulangi kembali.');
      return $this->index();
    }
  }
}
