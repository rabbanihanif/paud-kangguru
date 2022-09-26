<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class KepsekController extends BaseController
{
  public function index()
  {
    $data['title'] = "Data Kepala Sekolah";
    $data['data'] = model(Pengguna::class)->where('level', 'kepsek')->findAll();
    return view('admin/kepsek/list', $data);
  }

  public function create()
  {
    helper('form');
    $data['title'] = "Kepala Sekolah Baru";
    return view('admin/kepsek/create', $data);
  }

  public function store()
  {
    $model = model(Pengguna::class);

    if ($this->validate([
      'nama' => 'required|min_length[3]|max_length[255]',
      'email' => 'required|min_length[3]|max_length[255]|valid_email',
      'password' => 'required|min_length[3]|max_length[255]',
    ])) {
      $model->save([
        'nama' => $this->request->getPost('nama'),
        'email' => $this->request->getPost('email'),
        'level' => 'kepsek',
        'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
      ]);

      return redirect('kepsek.index');
    } else {
      $data['validation'] = $this->validator;
      $data['title'] = "Kepala Sekolah Baru";
      return view('admin/kepsek/create', $data);
    }
  }

  public function edit($id)
  {
    helper('form');
    $data['title'] = "Edit Kepala Sekolah";
    $data['data'] = model(Pengguna::class)->find($id);

    return view('admin/kepsek/edit', $data);
  }

  public function update($id)
  {
    $model = model(Pengguna::class);

    if ($this->request->getPost('password') != '') {
      if ($this->validate([
        'password' => 'min_length[3]|max_length[255]',
      ])) {
        $model->update($id, [
          'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
        ]);
      }
    }

    if ($this->validate([
      'nama' => 'required|min_length[3]|max_length[255]',
      'email' => 'required|min_length[3]|max_length[255]|valid_email',
    ])) {
      $model->update($id, [
        'nama' => $this->request->getPost('nama'),
        'email' => $this->request->getPost('email'),
      ]);

      return redirect('kepsek.index');
    } else {
      $data['validation'] = $this->validator;
      $data['title'] = "Edit Kepala Sekolah";
      $data['data'] = model(Pengguna::class)->find($id);
      return view('admin/kepsek/edit', $data);
    }
  }

  public function destroy()
  {
    $model = model(Pengguna::class);
    $model->delete($this->request->getPost('id_pengguna'));
    return redirect('kepsek.index');
  }
}
