<?php

namespace App\Controllers\Auth;

use App\Controllers\BaseController;
use App\Models\Pengguna;
use App\Models\ModelTa;

class LoginController extends BaseController
{
  public function index()
  {
    return view('auth/login', [
      'title' => 'Login'
    ]);
  }

  public function auth()
  {
    $session = session();
    $model = new Pengguna();
    $email = $this->request->getVar('email');
    $password = $this->request->getVar('password');
    $data = $model->where('email', $email)->first();
    if ($data) {
      $pass = $data->password;
      $verify_pass = password_verify($password, $pass);
      if ($verify_pass) {
        $ses_data = [
          'id_pengguna'       => $data->id_pengguna,
          'nama'     => $data->nama,
          'email'    => $data->email,
          'level'    => $data->level,
          'logged_in'     => TRUE
        ];
        $session->set($ses_data);
        return redirect()->to('/home');
      } else {
        $session->setFlashdata('msg', 'Password salah');
        return redirect()->to('/login');
      }
    } else {
      $session->setFlashdata('msg', 'Pengguna Tidak Ditemukan');
      return redirect()->to('/login');
    }
  }

  public function logout()
  {
    $session = session();
    $session->destroy();
    return redirect()->to('/login');
  }
}
