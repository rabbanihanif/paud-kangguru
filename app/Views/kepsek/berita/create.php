<?= $this->extend('layout/kepsek') ?>

<?= $this->section('content') ?>
<?php

use Carbon\Carbon;
?>

<h1 class="h3 mb-4 text-gray-800"><?= $title ?? ""; ?></h1>

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
    <form action="<?= route_to('kepsek.berita.store'); ?>" method="post" enctype="multipart/form-data">
      <?= csrf_field() ?>

      <div class="form-group">
        <label for="judul">Judul Berita</label>
        <input type="text" class="form-control" name="judul" id="judul" aria-describedby="judul" placeholder="Judul Berita">
      </div>

      <div class="form-group">
        <label for="deskripsi">Deskripsi</label>
        <textarea class="form-control summernote" name="deskripsi" id="deskripsi" rows="3"></textarea>
      </div>

      <div class="form-group">
        <label for="gambar">Gambar</label>
        <input type="file" class="form-control" name="gambar" id="gambar" aria-describedby="gambar" placeholder="Gambar">
      </div>

      <button type="submit" class="btn btn-primary btn-block">Simpan</button>
    </form>
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