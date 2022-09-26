<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\Pembayaran;

class PembayaranController extends BaseController
{
  public function index()
  {
    $db      = \Config\Database::connect();
    $builder = $db->table('tb_pembayaran');
    $builder->select('tb_pembayaran.*, tb_murid.nama_lengkap, tb_murid.nomor_pendaftaran');
    $builder->join('tb_pengguna', 'tb_pengguna.id_pengguna = tb_pembayaran.id_pengguna');
    $builder->join('tb_murid', 'tb_murid.id_pengguna = tb_pengguna.id_pengguna');
    $builder->where('tb_pembayaran.deleted_at', null);
    // $data['title'] = "Data Konfirmasi Pembayaran";
    $data['title'] = "Data Pembayaran";
    $data['data'] = $builder->get();

    return view('admin/pembayaran/list', $data);
  }

  public function terima($id)
  {
    // update status pembayaran
    model(Pembayaran::class)->where('status', 'Lapor bayar')->where('id_pembayaran', $id)->set([
      'status' => 'Sudah bayar'
    ])->update();

    // update status murid
    $pembayaran = model(Pembayaran::class)->where('id_pembayaran', $id)->first();
    model(Murid::class)->where('id_pengguna', $pembayaran->id_pengguna)->set([
      'status_pendaftar' => 'Sudah melengkapi data dan pembayaran'
    ])->update();
    session()->setFlashdata('success', 'Pembayaran berhasil diterima');
    return redirect('pembayaran.index');
  }

  public function tolak($id)
  {
    model(Pembayaran::class)->where('id_pembayaran', $id)->set([
      'status' => 'Belum bayar',
      'nama_bank' => null,
      'nama_pengirim' => null,
      'bukti_transfer' => null,
      'bukti_transfer_tipe' => null,
    ])->update();
    session()->setFlashdata('success', 'Pembayaran berhasil ditolak');
    return redirect('pembayaran.index');
  }
}
