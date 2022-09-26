<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Dokumen;
use App\Models\Murid;
// use App\Models\Ortu;
use App\Models\RiwayatMurid;

class PrintController extends BaseController
{

  public function index()
  {
    $data['title'] = "Data Pendaftar";
    $data['murid'] = model(Murid::class)->findAll();
    if (!$data['murid']) return redirect('logout');
    $data['riwayat'] = model(RiwayatMurid::class)->where('id_murid', $data['murid']->id_murid)->first();
    // $data['ortu'] = model(Ortu::class)->where('id_pengguna', $data['murid']->id_pengguna)->first();
    $data['dokumen'] = model(Dokumen::class)->where('id_pengguna', $data['murid']->id_pengguna)->first();

    return view('cetak', $data);
  }

  public function view($num = 0)
  {
    var_dump($num);
    die;
    return $num;
    $data['title'] = "Data Pendaftar";
    $data['murid'] = model(Murid::class)->find($num);
    if (!$data['murid']) return redirect('logout');
    $data['riwayat'] = model(RiwayatMurid::class)->where('id_murid', $data['murid']->id_murid)->first();
    // $data['ortu'] = model(Ortu::class)->where('id_pengguna', $data['murid']->id_pengguna)->first();
    $data['dokumen'] = model(Dokumen::class)->where('id_pengguna', $data['murid']->id_pengguna)->first();

    return view('cetak', $data);
  }
}
