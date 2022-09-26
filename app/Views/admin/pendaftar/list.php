<?= $this->extend('layout/admin') ?>

<?= $this->section('content') ?>
<?php

use Carbon\Carbon;
use CodeIgniter\I18n\Time;

?>

<h1 class="h3 mb-4 text-gray-800"><?= $title ?? ""; ?></h1>


<div class="card mb-3">



  <div class="card-body">
    <?php if (session()->getFlashdata('msg')) : ?>
      <div class="alert alert-danger"><?= session()->getFlashdata('msg') ?></div>
    <?php endif; ?>
    <?php if (session()->getFlashdata('success')) : ?>
      <div class="alert alert-success"><?= session()->getFlashdata('success') ?></div>
    <?php endif; ?>

    <a class="btn btn-primary btn-sm mb-4" href="<?= route_to('pendaftar.printall'); ?>" role="button" target="_blank">
      <i class="fa fa-print" aria-hidden="true"></i>
      Cetak
    </a>
    <!-- <a class="btn btn-success btn-sm mb-4" href="/admin/pendaftarcontroller/excel" role="button" target="_blank">
      <i class="fa fa-file" aria-hidden="true"></i>
      Excel
    </a> -->

    <table class="table" id="tabel">
      <thead>
        <tr>
          <th>Nomor Pendaftaran</th>
          <th>Nama Murid</th>
          <th>Tanggal Lahir (Umur)</th>
          <th>Kelompok</th>
          <th>Jenis Kelamin</th>
          <th>Tanggal Daftar</th>
          <th>Status</th>
          <th>#</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($data as $d) : ?>
          <?php $birthDate = $d->tanggal_lahir;

          $currentDate = date("d-m-Y");

          $age = date_diff(date_create($birthDate), date_create($currentDate));
          ?>
          <tr>
            <td scope="row"><?= $d->nomor_pendaftaran ?? "N/A"; ?></td>
            <td scope="row"><?= $d->nama_lengkap ?? "N/A"; ?></td>
            <td scope="row"><?= $d->tanggal_lahir ?? "N/A"; ?> (<?= $age->format('%y'); ?> Tahun)</td>
            <td scope="row"><?= $d->kelompok ?? "N/A"; ?></td>
            <td scope="row"><?= $d->jenis_kelamin ?? "N/A"; ?></td>
            <td><?= Carbon::parse($d->created_at)->format('d F Y, H:i A'); ?></td>
            <td scope="row"><?= $d->status_pendaftar ?? "N/A"; ?></td>
            <td>
              <a class="btn btn-success btn-sm" href="<?= route_to('pendaftar.view', $d->id_murid); ?>" role="button">Lihat</a>
              <!-- <a class="btn btn-info btn-sm" href="<?= route_to('pendaftar.print', $d->id_murid); ?>" role="button" target="_blank">Cetak</a> -->

              <?php if ($d->kelompok == null) { ?>
                <a class="btn btn-primary btn-sm" href="<?= route_to('pendaftar.choose', $d->id_murid); ?>" role="button">Pemilihan Kelompok</a>
              <?php } else { ?>
                <a class="btn btn-primary btn-sm disabled" href="<?= route_to('pendaftar.choose', $d->id_murid); ?>" role="button">Sudah Dipilih</a>
              <?php } ?>
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