<?php

namespace App\Controllers\Ortu;

use App\Controllers\BaseController;
use App\Models\Dokumen;
use App\Models\Pembayaran;

class PembayaranController extends BaseController
{
  public function index()
  {
    helper('form');
    $session = session();
    $data['title'] = "Bukti Pembayaran";

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

    // cek data dokumen
    $data['dokumen'] = model(Dokumen::class)->where('id_pengguna', session('id_pengguna'))->first();
    if (!$data['dokumen']) return redirect('logout');
    if (!$data['dokumen']->foto_murid) {
      $session->setFlashdata('msg', 'Anda belum upload berkas persyaratan, silakan upload terlebih dahulu.');
      return redirect()->to('/home');
    }

    $data['pembayaran'] = model(Pembayaran::class)->where('id_pengguna', session('id_pengguna'))->first();

    return view('ortu/pembayaran', $data);
  }

  public function store()
  {
    $db = \Config\Database::connect();
    try {
      $db->transBegin();

      $model = model(Pembayaran::class)->where('id_pengguna', session('id_pengguna'));

      model(Murid::class)->where('id_pengguna', session('id_pengguna'))->set([
        'status_pendaftar' => 'Menunggu konfirmasi pembayaran'
      ])->update();

      if ($this->validate([
        'bukti_transfer'  => 'uploaded[bukti_transfer]|mime_in[bukti_transfer,image/jpg,image/jpeg,image/png,image/gif,application/pdf]',
      ])) {
        $bukti_transfer = $this->request->getFile('bukti_transfer');

        $folderName = rtrim($folderName ?? date('Ymd'), '/') . '/';

        if (!$bukti_transfer->hasMoved()) {
          $bukti_transfer_filename = $bukti_transfer->getRandomName();
          $bukti_transfer_tipe = $bukti_transfer->getMimeType();
          $bukti_transfer->move(ROOTPATH . 'public/uploads/' . $folderName, $bukti_transfer_filename);
        }

        $model->set([
          'nama_bank' => $this->request->getPost('nama_bank'),
          'nama_pengirim' => $this->request->getPost('nama_pengirim'),
          'bukti_transfer' => $folderName . $bukti_transfer_filename,
          'bukti_transfer_tipe' => $bukti_transfer_tipe,
          'status' => 'Lapor bayar',
        ])->update();

        $db->transCommit();

        session()->setFlashdata('success', 'Pengisian bukti pembayaran berhasil. Silahkan tunggu konfirmasi dari Administrator');
        return redirect('home');
      } else {
        session()->setFlashdata('msg', 'Input data gagal. Silahkan ulangi kembali.');
        return $this->index();
      }
    } catch (\Throwable $th) {
      //throw $th;
      $db->transRollback();
    }
  }
}
