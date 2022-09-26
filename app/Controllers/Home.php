<?php

namespace App\Controllers;

use App\Models\Berita;
use App\Models\ModelTa;

class Home extends BaseController
{

  public function __construct()
  {
    $this->ModelTa = new ModelTa();
    helper('form');
  }

  public function index()
  {
    // $data['title'] = "Beranda";
    $data = [
      'title' => 'Beranda'
    ];
    echo view('homepage/header', $data);
    echo view('homepage/index');
    echo view('homepage/footer');
  }

  public function kegiatan()
  {
    $data['title'] = "Kegiatan";

    helper('text');
    $data['data'] = model(Berita::class)->findAll();
    echo view('homepage/header', $data);
    echo view('homepage/kegiatan');
    echo view('homepage/footer');
  }

  public function kegiatanDetail($id)
  {
    $data['title'] = "Detail";

    $data['data'] = model(Berita::class)->find($id);
    echo view('homepage/header', $data);
    echo view('homepage/kegiatan_detail');
    echo view('homepage/footer');
  }

  public function tentang()
  {
    $data['title'] = "Tentang";

    echo view('homepage/header', $data);
    echo view('homepage/tentang');
    echo view('homepage/footer');
  }

  public function info()
  {
    $data['title'] = "Info";

    echo view('homepage/header', $data);
    echo view('homepage/info');
    echo view('homepage/footer');
  }

  public function programsekolah()
  {
    $data['title'] = "Program Unggulan Sekolah";

    echo view('homepage/header', $data);
    echo view('homepage/programsekolah');
    echo view('homepage/footer');
  }
}
