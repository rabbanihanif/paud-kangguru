<?= $this->extend('layout/kepsek') ?>

<?= $this->section('content') ?>
<?php

use Carbon\Carbon;
?>

<h1 class="h3 mb-4 text-gray-800"><?= $title ?? ""; ?></h1>


<div class="card">
  <div class="card-body">
    <?php if (session()->getFlashdata('msg')) : ?>
      <div class="alert alert-danger"><?= session()->getFlashdata('msg') ?></div>
    <?php endif; ?>
    <?php if (session()->getFlashdata('success')) : ?>
      <div class="alert alert-success"><?= session()->getFlashdata('success') ?></div>
    <?php endif; ?>

    <table class="table" id="tabel">
      <thead>
        <tr>
          <th>ID Pendaftaran</th>
          <th>Nama Murid</th>
          <th>Kelompok</th>
          <th>Kelamin</th>
          <th>Tanggal Daftar</th>
          <th>Status</th>
          <th>#</th>
      </thead>
      <tbody>
        <?php foreach ($data as $d) : ?>
          <tr>
            <td scope="row"><?= $d->nomor_pendaftaran ?? "N/A"; ?></td>
            <td scope="row"><?= $d->nama_lengkap ?? "N/A"; ?></td>
            <td scope="row"><?= $d->kelompok ?? "N/A"; ?></td>
            <td scope="row"><?= $d->jenis_kelamin ?? "N/A"; ?></td>
            <td><?= Carbon::parse($d->created_at)->format('d F Y, H:i A'); ?></td>
            <td scope="row"><?= $d->status_pendaftar ?? "N/A"; ?></td>
            <td>
              <a class="btn btn-success btn-sm" href="<?= route_to('kepsek.pendaftar.view', $d->id_murid); ?>" role="button">Lihat</a>
              <a class="btn btn-info btn-sm" href="<?= route_to('kepsek.pendaftar.print', $d->id_murid); ?>" role="button" target="_blank">Cetak</a>
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