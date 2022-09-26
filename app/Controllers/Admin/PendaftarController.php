<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\Murid;
use App\Models\Pembayaran;



class PendaftarController extends BaseController
{
  public function index()
  {
    $data['title'] = "Data Pendaftar";
    $data['data'] = model(Murid::class)->findAll();

    // $data['kelompok'] = $this->db->group_by('kelompok')->get('tb_murid')->result();

    return view('admin/pendaftar/list', $data);
  }

  public function view($id)
  {
    helper('form');
    $data['title'] = "Lihat Data Pendaftar";
    $data['murid'] = model(Murid::class)->find($id);
    if (!$data['murid']) return redirect('logout');
    $data['riwayat'] = model(RiwayatMurid::class)->where('id_murid', $data['murid']->id_murid)->first();
    // $data['ortu'] = model(Ortu::class)->where('id_pengguna', $data['murid']->id_pengguna)->first();
    $data['dokumen'] = model(Dokumen::class)->where('id_pengguna', $data['murid']->id_pengguna)->first();

    return view('admin/pendaftar/view', $data);
  }

  public function choose($id)
  {
    $murid = model(Murid::class)->where('id_murid', $id)->first();

    // generate tanggal lahir menjadi tahun 
    $birthDate = $murid->tanggal_lahir;

    $currentDate = date("d-m-Y");

    $age = date_diff(date_create($birthDate), date_create($currentDate));

    if ($age->format('%y') == 3) {
      $kelompok = 'Playgroup';
    } elseif ($age->format('%y') == 4) {
      $kelompok = 'TK A';
    } elseif ($age->format('%y') == 5) {
      $kelompok = 'TK B';
    } else {
      $kelompok = '-';
    }

    // var_dump ($kelompok);
    // die();

    model(Murid::class)->where('id_murid', $id)->set([
      'kelompok' => $kelompok
    ])->update();

    session()->setFlashdata('success', 'Kelompok telah berhasil dipilih');
    return redirect('pendaftar.index');
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

    return view('cetak', $data);
  }

  public function printall()
  {
    $data['title'] = "Laporan Pendaftaran";
    helper('form');
    $data['murid'] = model(Murid::class)->findAll();
    // $data['title'] = $data['murid']->nama_lengkap;
    if (!$data['murid']) return redirect('logout');
    // $data['riwayat'] = model(RiwayatMurid::class)->where('id_murid', $data['murid']->id_murid)->first();
    // $data['ortu'] = model(Ortu::class)->where('id_pengguna', $data['murid']->id_pengguna)->first();
    // $data['dokumen'] = model(Dokumen::class)->where('id_pengguna', $data['murid']->id_pengguna)->first();

    return view('cetaksemua', $data);
  }

  public function excel()
  {
    $data['murid'] = model(Murid::class)->findAll();

    echo view('admin/excel', $data);
  }
  

  // public function destroy()
  // {
  //   $model = model(Murid::class);
  //   $model->delete($this->request->getPost('id_murid'));
  //   session()->setFlashdata('msg', 'Berhasil menghapus data');
  //   return redirect('murid.index');
  // }
}
