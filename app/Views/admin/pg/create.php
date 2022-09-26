<?= $this->extend('layout/admin') ?>

<?= $this->section('content') ?>
<?php

use Carbon\Carbon;
?>

<h1 class="h3 mb-4 text-gray-800"><?= $title ?? ""; ?></h1>

<div class="card col-5">
  <div class="card-header text-right">
    <a name="" id="" class="btn btn-dark btn-sm" href="<?= route_to('ta.index'); ?>" role="button">
      <i class="fa fa-arrow-left" aria-hidden="true"></i>
      Kembali
    </a>
  </div>
  <div class="card-body">

    <?= session()->getFlashdata('error') ?>
    <div class="text-danger">
      <?= service('validation')->listErrors() ?>
    </div>
    <form action="<?= route_to('ta.insert') ?>" method="post" enctype="multipart/form-data">
      <?= csrf_field() ?>

      <div class=" form-group">
        <label for="tahun">Tahun</label>
        <select name="tahun" id="tahun" class="form-control">
          <?php $now = date('Y');
          for ($i = 2021; $i <= $now; $i++) { ?>

            <option value="<?= $i; ?>" <?= ($now == $i) ? 'selected' : '' ?>><?= $i; ?></option>;

          <?php } ?>
        </select>
      </div>

      <div class="form-group">
        <label for="ta">Tahun ajaran</label>
        <input type="text" class="form-control" name="ta" id="ta" aria-describedby="ta" placeholder="Tahun ajaran">
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