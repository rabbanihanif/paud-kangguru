<?php

namespace App\Controllers\Auth;

use App\Controllers\BaseController;
use App\Models\Dokumen;
use App\Models\Murid;

use App\Models\Pembayaran;
use App\Models\Pengguna;
use App\Models\RiwayatMurid;

class RegisterController extends BaseController
{
  public function index()
  {
    helper('form');
    return view('auth/register', [
      'title' => 'Form Register Akun'
    ]);
  }

  public function auth()
  {
    helper('form');
    $session = session();
    $db = \Config\Database::connect();
    try {
      if (!$this->validate([
        'nama_anak' => 'required|min_length[3]|max_length[255]',
        'nik_anak' => 'required|integer|max_length[50]',
        'email' => 'required|max_length[255]|is_unique[tb_pengguna.email]',
        'password' => 'required|min_length[8]|max_length[255]',
      ])) {
        $data['validation'] = $this->validator;
        $data['title'] = "Form Register Akun";
        return view('auth/register', $data);
      }
      $db->transBegin();
      $pengguna = new Pengguna();
      $nama_anak = $this->request->getVar('nama_anak');
      $nik_anak = $this->request->getVar('nik_anak');
      $email = $this->request->getVar('email');
      $password = $this->request->getVar('password');
      $data = $pengguna->where('email', $email)->first();

      if ($data) {
        $session->setFlashdata('msg', 'Pendaftaran gagal: Email telah terdaftar.');
        return redirect()->to('/register');
      }

      $builder = $db->table('tb_pengguna');
      $total = $builder->countAllResults() + 1;

      $pengguna->save([
        // 'id_pengguna' => date('Ymd') . str_pad($total, 3, '0', STR_PAD_LEFT),
        'kode_pengguna' => "" . date('Ymd') . str_pad($total, 3, '0', STR_PAD_LEFT),
        'nik' => $nik_anak,
        'nama' => $nama_anak,
        'email' => $email,
        'password' => password_hash($password, PASSWORD_DEFAULT),
        'level' => 'ortu'
      ]);

      $newPengguna = model(Pengguna::class)->where('email', $email)->first();

      $db      = \Config\Database::connect();
      $builder = $db->table('tb_murid');
      $total = $builder->countAllResults() + 1;
      $nomor_pendaftaran = date('Y') . str_pad($total, 3, '0', STR_PAD_LEFT);

      $murid = new Murid();
      $murid->save([
        'nama_lengkap' => $nama_anak,
        'nomor_pendaftaran' => $nomor_pendaftaran,
        'nik' => $nik_anak,
        'id_pengguna' => $newPengguna->id_pengguna,
        'status_pendaftar' => 'Menunggu kelengkapan data'
      ]);

      $newMurid = model(Murid::class)->where('nomor_pendaftaran', $nomor_pendaftaran)->first();

      $riwayat_murid = new RiwayatMurid();
      $riwayat_murid->save([
        'id_murid' => $newMurid->id_murid
      ]);

      $builder = $db->table('tb_dokumen');
      $total = $builder->countAllResults() + 1;
      $dokumen = new Dokumen();
      $dokumen->save([
        'kode_dokumen' => str_pad($total, 3, '0', STR_PAD_LEFT),
        'id_pengguna' => $newPengguna->id_pengguna
      ]);

      $builder = $db->table('tb_pembayaran');
      $total = $builder->countAllResults() + 1;
      $kode_pembayaran = 'P' . str_pad($total, 5, '0', STR_PAD_LEFT);

      $pembayaran = new Pembayaran();
      $pembayaran->save([
        'id_pengguna' => $newPengguna->id_pengguna,
        'kode_pembayaran' => $kode_pembayaran
      ]);

      // $builder = $db->table('tb_ortu');
      // $total = $builder->countAllResults() + 1;
      // $ortu = new Ortu();
      // $ortu->save([
      //   'kode_ortu' => str_pad($total, 3, '0', STR_PAD_LEFT),
      //   'id_pengguna' => $newPengguna->id_pengguna
      // ]);

      $db->transCommit();
      $session->setFlashdata('success', 'Registrasi Akun berhasil. Silahkan login untuk melengkapi data yang diperlukan');
      return redirect()->to('/login');
    } catch (\Throwable $th) {
      $db->transRollback();
      $session->setFlashdata('msg', 'Registrasi Akun gagal: ' . $th->getMessage());
      return redirect()->to('/register');
    }
  }
}
