<?= $this->extend('layout/admin') ?>

<?= $this->section('content') ?>
<?php

use Carbon\Carbon;
?>

<h1 class="h3 mb-4 text-gray-800"><?= $title ?? ""; ?></h1>

<div class="card">
  <div class="card-header text-right">
    <a name="" id="" class="btn btn-dark btn-sm" href="<?= route_to('admin.index'); ?>" role="button">
      <i class="fa fa-arrow-left" aria-hidden="true"></i>
      Kembali
    </a>
  </div>
  <div class="card-body">

    <?= session()->getFlashdata('error') ?>
    <div class="text-danger">
      <?= service('validation')->listErrors() ?>
    </div>
    <form action="<?= route_to('admin.update', $data->id_pengguna); ?>" method="post" enctype="multipart/form-data">
      <?= csrf_field() ?>
      <input type="hidden" name="_method" value="PUT">

      <div class="form-group">
        <label for="nama">Nama</label>
        <input type="text" class="form-control" name="nama" id="nama" aria-describedby="nama" placeholder="Nama" value="<?= $data->nama; ?>">
      </div>

      <div class="form-group">
        <label for="email">Email</label>
        <input type="text" class="form-control" name="email" id="email" aria-describedby="email" placeholder="email" value="<?= $data->email; ?>">
      </div>

      <div class="form-group">
        <label for="password">Password</label>
        <input type="password" class="form-control" name="password" id="password" aria-describedby="password" placeholder="Password">
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
