<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Dokumen;
use App\Models\Murid;
use App\Models\Ortu;
use App\Models\Pembayaran;
use App\Models\Pengguna;
use App\Models\ModelHome;

class DashboardController extends BaseController
{

  public function __construct()
  {
    $this->ModelHome = new ModelHome();
  }


  public function home()
  {

    // $db      = \Config\Database::connect();
    // $builder = $db->table('tb_murid');
    // $count = $builder->countAllResults() - 1;

    // $jk = $builder->selectCount('jenis_kelamin')->get();
    // $laki = $builder->get();

    // $perempuan = $builder->selectCount('Perempuan');

    // dd($dataAllPendaftar);

    // dd($dataAllPendaftar);
    // $data['title'] = "Dashboard";

    $data = [
      'title' => 'Dashboard Admin',
      'title2' => 'Dashboard Pendaftar',
      'tot_pendaftar' => $this->ModelHome->tot_pendaftar(),
      // 'pendaftar_laki' => $this->ModelHome->pendaftar_laki(),
      'tot_pengguna' => $this->ModelHome->tot_pengguna(),
      // 'pendaftar_perempuan' => $this->ModelHome->pendaftar_perempuan()
      // 'count' => $count,
    ];





    if (session('level') == 'admin') {
      return view('admin/dashboard', $data);
    }
    if (session('level') == 'kepsek') {
      return view('kepsek/dashboard', $data);
    }
    if (session('level') == 'ortu') {
      $murid = model(Murid::class)->where('id_pengguna', session('id_pengguna'))->first();
      $pengguna = model(Pengguna::class)->where('id_pengguna', session('id_pengguna'))->first();
      if (!$murid) return redirect('login');
      $data['murid'] = $murid;
      $data['pengguna'] = $pengguna;
      $data['cek_murid'] = ($murid->tempat_lahir) ? true : false;

      // $ortu = model(Ortu::class)->where('id_pengguna', session('id_pengguna'))->first();
      // $data['cek_ortu'] = ($ortu->nama) ? true : false;

      $dokumen = model(Dokumen::class)->where('id_pengguna', session('id_pengguna'))->first();
      $data['cek_dokumen'] = ($dokumen->kk) ? true : false;

      $pembayaran = model(Pembayaran::class)->where('id_pengguna', session('id_pengguna'))->first();
      $data['cek_pembayaran'] = ($pembayaran->bukti_transfer) ? true : false;
      $data['pembayaran'] = $pembayaran;

      return view('ortu/dashboard', $data);
    }
  }

  public function print($id)
  {
    helper('form');
    $data['murid'] = model(Murid::class)->find($id);
    $data['title'] = $data['murid']->nama_lengkap;
    if (!$data['murid']) return redirect('logout');
    $data['riwayat'] = model(RiwayatMurid::class)->where('id_murid', $data['murid']->id_murid)->first();
    // $data['ortu'] = model(Ortu::class)->where('id_pengguna', $data['murid']->id_pengguna)->first();
    $data['dokumen'] = model(Dokumen::class)->where('id_pengguna', $data['murid']->id_pengguna)->first();

    return view('bukti-pendaftaran', $data);
  }
}
