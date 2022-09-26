<?= $this->extend('layout/admin') ?>

<?= $this->section('content') ?>
<?php

use Carbon\Carbon;


?>

<h1 class="h3 mb-4 text-gray-800"><?= $title ?? ""; ?></h1>


<div class="card mb-4">
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
          <th>No</th>
          <th>Nama Murid</th>
          <th>Jenis Kelamin</th>
          <th>Tanggal Lahir (Umur)</th>
          <th>Kelompok</th>
        </tr>
      </thead>
      <tbody>
        <?php $i = 1; ?>
        <?php foreach ($pg as $d) : ?>
          <?php $birthDate = $d['tanggal_lahir'];

          $currentDate = date("d-m-Y");

          $age = date_diff(date_create($birthDate), date_create($currentDate));
          ?>
          <tr>
            <td scope="row"><?= $i++ ?></td>
            <!-- <td scope="row"><?= $d->nomor_pendaftaran ?? "N/A"; ?></td> -->
            <td scope="row"><?= $d['nama_lengkap'] ?? "N/A"; ?></td>
            <td scope="row"><?= $d['jenis_kelamin'] ?? "N/A"; ?></td>
            <td scope="row"><?= $d['tanggal_lahir'] ?? "N/A"; ?> (<?= $age->format('%y'); ?> Tahun)</td>
            <td scope="row"><?= $d['kelompok'] ?? "N/A"; ?></td>
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