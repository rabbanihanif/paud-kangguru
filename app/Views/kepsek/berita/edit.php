<?= $this->extend('layout/kepsek') ?>

<?= $this->section('content') ?>
<?php

use Carbon\Carbon;
?>
<section class="section">
  <div class="section-header">
    <h1><?= $title ?? ""; ?></h1>
  </div>

  <div class="section-body">
    <div class="card">
      <div class="card-header text-right">
        <a name="" id="" class="btn btn-dark btn-sm" href="<?= route_to('kepsek.berita.index'); ?>" role="button">
          <i class="fa fa-arrow-left" aria-hidden="true"></i>
          Kembali
        </a>
      </div>

      <div class="card-body">
        <?= session()->getFlashdata('error') ?>
        <div class="text-danger">
          <?= service('validation')->listErrors() ?>
        </div>
        <form action="<?= route_to('kepsek.berita.update', $data->id_berita); ?>" method="post" enctype="multipart/form-data">
          <?= csrf_field() ?>
          <input type="hidden" name="_method" value="PUT">

          <div class="row">
            <div class="col-md-9">
              <div class="form-group">
                <label for="judul">Judul Berita</label>
                <input type="text" class="form-control" name="judul" id="judul" aria-describedby="judul" placeholder="Judul Berita" value="<?= $data->judul; ?>">
              </div>

              <div class="form-group">
                <label for="deskripsi">Deskripsi</label>
                <textarea class="form-control summernote" name="deskripsi" id="deskripsi" rows="3"><?= $data->deskripsi; ?></textarea>
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-group">
                <label for="gambar">Gambar</label>
                <input type="file" class="form-control" name="gambar" id="gambar" aria-describedby="gambar" placeholder="Gambar">
              </div>

              <div class="form-group">
                <label for="gambar">&nbsp;</label>
                <img src="<?= base_url('uploads/' . $data->gambar); ?>" class="img-fluid">
              </div>
            </div>
          </div>



          <button type="submit" class="btn btn-primary btn-block">Simpan</button>
        </form>
      </div>
    </div>
  </div>
</section>
<?= $this->endSection() ?>

<?= $this->section('js') ?>
<?= $this->include('includes/summernote/js') ?>
<?= $this->endSection() ?>

<?= $this->section('css') ?>
<?= $this->include('includes/summernote/css') ?>
<?= $this->endSection() ?>