<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\Pengguna;

class AdminController extends BaseController
{
  public function index()
  {
    $data['title'] = "Data Admin";
    $data['data'] = model(Pengguna::class)->where('level', 'admin')->findAll();
    // $data['data'] = model(Pengguna::class)->findAll();
    return view('admin/admin/list', $data);
  }

  public function create()
  {
    helper('form');
    $data['title'] = "Admin Baru";
    return view('admin/admin/create', $data);
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
        'level' => 'admin',
        'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
      ]);

      return redirect('admin.index');
    } else {
      $data['validation'] = $this->validator;
      $data['title'] = "Admin Baru";
      return view('admin/admin/create', $data);
    }
  }

  public function edit($id)
  {
    helper('form');
    $data['title'] = "Edit Admin";
    $data['data'] = model(Pengguna::class)->find($id);

    return view('admin/admin/edit', $data);
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

      return redirect('admin.index');
    } else {
      $data['validation'] = $this->validator;
      $data['title'] = "Edit Admin";
      $data['data'] = model(Pengguna::class)->find($id);
      return view('admin/admin/edit', $data);
    }
  }

  public function destroy()
  {
    $model = model(Pengguna::class);
    $model->delete($this->request->getPost('id_pengguna'));
    return redirect('admin.index');
  }
}
