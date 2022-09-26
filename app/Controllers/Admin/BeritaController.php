<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\Berita as ModelsBerita;
use CodeIgniter\Files\File;

class BeritaController extends BaseController
{
  public function index()
  {
    $beritaModel = new ModelsBerita();
    $data['title'] = "Data Berita";
    $data['data'] = $beritaModel->findAll();
    return view('admin/berita/list', $data);
  }

  public function create()
  {
    helper('form');
    $data['title'] = "Tambah Berita Baru";
    return view('admin/berita/create', $data);
  }

  public function store()
  {
    $model = model(ModelsBerita::class);

    if ($this->validate([
      'judul' => 'required|min_length[3]|max_length[255]',
      'deskripsi'  => 'required',
      'gambar'  => 'uploaded[gambar]|is_image[gambar]|mime_in[gambar,image/jpg,image/jpeg,image/png,image/gif]',
    ])) {
      $img = $this->request->getFile('gambar');

      if (!$img->hasMoved()) {
        $fileName = $img->getRandomName();
        $folderName = rtrim($folderName ?? date('Ymd'), '/') . '/';
        $img->move(ROOTPATH . 'public/uploads/' . $folderName, $fileName);
      }


      $model->save([
        'id_pengguna' => session('id_pengguna'),
        'judul' => $this->request->getPost('judul'),
        'deskripsi' => $this->request->getPost('deskripsi'),
        'gambar' => $folderName . $fileName
      ]);

      return redirect('berita.index');
    } else {
      $data['validation'] = $this->validator;
      $data['title'] = "Berita Baru";
      return view('admin/berita/create', $data);
    }
  }

  public function edit($id)
  {
    helper('form');
    $data['title'] = "Edit Berita";
    $data['data'] = model(ModelsBerita::class)->find($id);

    return view('admin/berita/edit', $data);
  }

  public function update($id)
  {
    $model = model(ModelsBerita::class);

    if ($this->request->getFile('gambar') != '') {

      if ($this->validate([
        'gambar'  => 'uploaded[gambar]|is_image[gambar]|mime_in[gambar,image/jpg,image/jpeg,image/png,image/gif]',
      ])) {
        $img = $this->request->getFile('gambar');

        if (!$img->hasMoved()) {
          $fileName = $img->getRandomName();
          $folderName = rtrim($folderName ?? date('Ymd'), '/') . '/';
          $img->move(ROOTPATH . 'public/uploads/' . $folderName, $fileName);
        }

        $model->update($id, [
          'gambar' => $folderName . $fileName
        ]);
      } else {
        $data['validation'] = $this->validator;
        $data['title'] = "Edit Berita";
        $data['data'] = model(ModelsBerita::class)->find($id);
        return view('admin/berita/edit', $data);
      }
    }

    if ($this->validate([
      'judul' => 'required|min_length[3]|max_length[255]',
      'deskripsi'  => 'required',
    ])) {
      $model->update($id, [
        'id_pengguna' => session('id_pengguna'),
        'judul' => $this->request->getPost('judul'),
        'deskripsi' => $this->request->getPost('deskripsi'),
      ]);

      return redirect('berita.index');
    } else {
      $data['validation'] = $this->validator;
      $data['title'] = "Edit Berita";
      $data['data'] = model(ModelsBerita::class)->find($id);
      return view('admin/berita/edit', $data);
    }
  }

  //hapus data
  public function destroy()
  {
    $model = model(ModelsBerita::class);
    $model->delete($this->request->getPost('id_berita'));
    return redirect('berita.index');
  }
}
