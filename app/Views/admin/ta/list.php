<?= $this->extend('layout/admin') ?>

<?= $this->section('content') ?>
<?php

use Carbon\Carbon;
?>

<h1 class="h3 mb-4 text-gray-800"><?= $title ?? ""; ?></h1>

<div class="card">
  <div class="card-header text-right">
    <!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">Add Tahun Ajaran</button> -->
    <a name="" id="" class="btn btn-primary btn-sm" href="<?= route_to('ta.create'); ?>" role="button">
      <i class="fa fa-plus" aria-hidden="true"></i>
      Add Tahun Ajaran
    </a>
  </div>
  <div class="card-body">

    <?php if (session()->getFlashdata('msg')) : ?>
      <div class="alert alert-danger"><?= session()->getFlashdata('msg') ?></div>
    <?php endif; ?>
    <?php if (session()->getFlashdata('success')) : ?>
      <div class="alert alert-success"><?= session()->getFlashdata('success') ?></div>
    <?php endif; ?>

    <table class="table">
      <thead>
        <tr>
          <th>#</th>
          <th>Tahun</th>
          <th>Tahun Ajaran</th>
          <th>Status</th>
          <th>Aktif/Non Aktif</th>
          <th>Aksi</th>
        </tr>
      </thead>
      <tbody>
        <?php $i = 1 ?>
        <?php foreach ($ta as $value) : ?>
          <tr>
            <td scope="row"><?= $i++; ?></td>
            <td scope="row"><?= $value['tahun'] ?></td>
            <td scope="row"><?= $value['ta'] ?></td>
            <td scope="row">
              <?= ($value['status'] == 1) ? '<label class="badge badge-success">Aktif</label>' : '<label class="badge badge-danger">Tidak Aktif</label>'; ?>
            </td>
            <td scope="row">
              <?php if ($value['status'] == 1) { ?>
                <a class="btn btn-danger btn-sm" href="<?= route_to('ta.nonaktif', $value['id_ta']); ?>" role="button">Nonaktif</a>

              <?php } else { ?>
                <a class="btn btn-success btn-sm" href="<?= route_to('ta.aktif', $value['id_ta']); ?>" role="button">Aktif</a>
              <?php } ?>
            </td>
            <td>
              <form action="<?= route_to('ta.destroy'); ?>" method="post">
                <?= csrf_field() ?>
                <input type="hidden" name="_method" value="DELETE" />
                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin melakukan ini?')">Hapus</button>
              </form>
            </td>

          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>
</div>
<?= $this->endSection() ?>

<?= $this->section('js') ?>
<?= $this->include('includes/datatables/js') ?>
<?= $this->endSection() ?>

<?= $this->section('css') ?>
<?= $this->include('includes/datatables/css') ?>
<?= $this->endSection() ?>