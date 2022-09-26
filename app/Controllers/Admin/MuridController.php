<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\Dokumen;
use App\Models\Murid;
use App\Models\Ortu;
use App\Models\Pengguna;

class MuridController extends BaseController
{
  public function __construct()
  {
    $this->modelMurid = new Murid();
    helper('form');
  }

  public function index()
  {
    $beritaModel = new Murid();
    $data['title'] = "Data Murid";
    // $data['data'] = $beritaModel->findAll();
    $data['data'] = $beritaModel->findAll();
    return view('admin/murid/list', $data);
  }

  public function listpg()
  {
    $data = [
      'title' => 'Murid Playgroup',
      // 'subtitle' => 'Playgroup',
      'pg' => $this->modelMurid->getPlaygroupData(),
    ];
    return view('admin/murid/pg-list', $data);
  }

  public function listtka()
  {
    $data = [
      'title' => 'Murid TK A',
      // 'subtitle' => 'Playgroup',
      'tka' => $this->modelMurid->getTkAData(),
    ];
    return view('admin/murid/tka-list', $data);
  }

  public function listtkb()
  {
    $data = [
      'title' => 'Murid TK B',
      // 'subtitle' => 'Playgroup',
      'tkb' => $this->modelMurid->getTkBData(),
    ];
    return view('admin/murid/tkb-list', $data);
  }


  public function view($id)
  {
    helper('form');
    $data['title'] = "Lihat Data Murid";

    $db = db_connect();

    $data['murid'] = model(Murid::class)->find($id);
    if (!$data['murid']) return redirect('logout');
    $data['riwayat'] = model(RiwayatMurid::class)->where('id_murid', $data['murid']->id_murid)->first();
    $data['ortu'] = model(Ortu::class)->where('id_pengguna', $data['murid']->id_pengguna)->first();
    $data['dokumen'] = model(Dokumen::class)->where('id_pengguna', $data['murid']->id_pengguna)->first();

    return view('admin/murid/view', $data);
  }

  public function edit($id)
  {
    helper('form');
    $data['title'] = "Edit Data Murid";
    $data['murid'] = model(Murid::class)->find($id);
    if (!$data['murid']) return redirect('logout');
    $data['riwayat'] = model(RiwayatMurid::class)->where('id_murid', $data['murid']->id_murid)->first();

    return view('admin/murid/edit', $data);
  }

  public function update($id)
  {
    // return $id;
    helper('form');
    $model = model(Murid::class);
    $riwayat_murid = model(RiwayatMurid::class);

    if ($this->validate([
      'nik' => 'required|max_length[255]',
      // 'kelompok' => 'required|in_list[Playgroup,TK A,TK B]',
      'nama_lengkap' => 'required|max_length[255]',
      'nama_panggilan' => 'required|max_length[255]',
      'tempat_lahir' => 'required|max_length[255]',
      'tanggal_lahir' => 'required|valid_date[Y-m-d]',
      // 'umur_murid' => 'required|in_list[3,4,5]',
      'jenis_kelamin' => 'required|in_list[Laki-laki,Perempuan]',
      'agama' => 'required|max_length[255]',
      'alamat' => 'required|max_length[255]',
      'anak_ke' => 'required|integer',
      'jumlah_saudara' => 'required|integer',
      'berat_badan' => 'required',
      'tinggi_badan' => 'required|integer',
      'gol_darah' => 'required|in_list[A,B,AB,O]',
      'lama_kandungan' => 'required|max_length[255]',
      'jenis_kelahiran' => 'required|max_length[255]',
      'jenis_kelahiran' => 'required|max_length[255]',
      'berat_lahir' => 'required',
      'tinggi_lahir' => 'required|integer',
      'panas_tinggi' => 'required|in_list[Ya,Tidak]',
      'pingsan' => 'required|in_list[Ya,Tidak]',
      'kejang' => 'required|in_list[Ya,Tidak]',
      'infeksi_telinga' => 'required|in_list[Ya,Tidak]',
      'alergi' => 'required|in_list[Ya,Tidak]',
      'kecelakaan' => 'required|in_list[Ya,Tidak]',
      'hal_penglihatan' => 'required|in_list[Ya,Tidak]',
      'hal_pendengaran' => 'required|in_list[Ya,Tidak]',
      'hal_bicara' => 'required|in_list[Ya,Tidak]',
      'hal_kemandirian' => 'required|max_length[255]',
      'hal_sifat' => 'required|max_length[255]',
      'hal_disukai' => 'required|max_length[255]',
      'hal_tidak_disukai' => 'required|max_length[255]',
      'nama_ayah' => 'required|max_length[255]',
      'nik_ayah' => 'required|integer|max_length[255]',
      'pendidikan_ayah' => 'required|max_length[255]',
      'pekerjaan_ayah' => 'required|max_length[255]',
      'telepon_ayah' => 'required|integer|max_length[255]',
      'nama_ibu' => 'required|max_length[255]',
      'nik_ibu' => 'required|integer|max_length[255]',
      'pendidikan_ibu' => 'required|max_length[255]',
      'pekerjaan_ibu' => 'required|max_length[255]',
      'telepon_ibu' => 'required|integer|max_length[255]',
      'penghasilan_ortu'  => 'required|integer',
    ])) {
      $model->update($id, [
        // 'kelompok' => $this->request->getPost('kelompok'),
        'nama_lengkap' => $this->request->getPost('nama_lengkap'),
        'nama_panggilan' => $this->request->getPost('nama_panggilan'),
        'nik' => $this->request->getPost('nik'),
        'jenis_kelamin' => $this->request->getPost('jenis_kelamin'),
        'tempat_lahir' => $this->request->getPost('tempat_lahir'),
        'tanggal_lahir' => $this->request->getPost('tanggal_lahir'),
        // 'umur_murid' => $this->request->getPost('umur_murid'),
        'anak_ke' => $this->request->getPost('anak_ke'),
        'jumlah_saudara' => $this->request->getPost('jumlah_saudara'),
        'gol_darah' => $this->request->getPost('gol_darah'),
        'berat_badan' => $this->request->getPost('berat_badan'),
        'tinggi_badan' => $this->request->getPost('tinggi_badan'),
        'agama' => $this->request->getPost('agama'),
        'alamat' => $this->request->getPost('alamat'),
        'nama_ayah' => $this->request->getPost('nama_ayah'),
        'nik_ayah' => $this->request->getPost('nik_ayah'),
        'pendidikan_ayah' => $this->request->getPost('pendidikan_ayah'),
        'pekerjaan_ayah' => $this->request->getPost('pekerjaan_ayah'),
        'telepon_ayah' => $this->request->getPost('telepon_ayah'),
        'nama_ibu' => $this->request->getPost('nama_ibu'),
        'nik_ibu' => $this->request->getPost('nik_ibu'),
        'pendidikan_ibu' => $this->request->getPost('pendidikan_ibu'),
        'pekerjaan_ibu' => $this->request->getPost('pekerjaan_ibu'),
        'telepon_ibu' => $this->request->getPost('telepon_ibu'),
        'penghasilan_ortu' => $this->request->getPost('penghasilan_ortu'),
      ]);

      $riwayat_murid->where('id_murid', $id)->set([
        'lama_kandungan' => $this->request->getPost('lama_kandungan'),
        'jenis_kelahiran' => $this->request->getPost('jenis_kelahiran'),
        'berat_lahir' => $this->request->getPost('berat_lahir'),
        'tinggi_lahir' => $this->request->getPost('tinggi_lahir'),
        'panas_tinggi' => $this->request->getPost('panas_tinggi'),
        'pingsan' => $this->request->getPost('pingsan'),
        'kejang' => $this->request->getPost('kejang'),
        'infeksi_telinga' => $this->request->getPost('infeksi_telinga'),
        'alergi' => $this->request->getPost('alergi'),
        'kecelakaan' => $this->request->getPost('kecelakaan'),
        'hal_penglihatan' => $this->request->getPost('hal_penglihatan'),
        'hal_pendengaran' => $this->request->getPost('hal_pendengaran'),
        'hal_bicara' => $this->request->getPost('hal_bicara'),
        'hal_kemandirian' => $this->request->getPost('hal_kemandirian'),
        'hal_sifat' => $this->request->getPost('hal_sifat'),
        'hal_disukai' => $this->request->getPost('hal_disukai'),
        'hal_tidak_disukai' => $this->request->getPost('hal_tidak_disukai'),
      ])->update();

      session()->setFlashdata('success', 'Berhasil memperbarui data');
      return redirect('murid.index');
    } else {
      session()->setFlashdata('msg', 'Gagal memperbarui data');
      return $this->index();
    }
  }

  public function destroy()
  {
    // $model = model(Murid::class);
    // $model->delete($this->request->getPost('id_murid'));
    // session()->setFlashdata('msg', 'Berhasil menghapus data');
    // return redirect('murid.index');

    $data = model(Murid::class)->where('id_murid', $this->request->getPost('id_murid'))->first();
    $id_pengguna = $data->id_pengguna;

    model(RiwayatMurid::class)->where('id_murid', $this->request->getPost('id_murid'))->delete();

    model(Pengguna::class)->where('id_pengguna', $id_pengguna)->delete();
    model(Murid::class)->where('id_pengguna', $id_pengguna)->delete();
    model(Dokumen::class)->where('id_pengguna', $id_pengguna)->delete();
    model(Pembayaran::class)->where('id_pengguna', $id_pengguna)->delete();

    session()->setFlashdata('success', 'Data berhasil dihapus');
    return redirect('murid.index');
  }
}
