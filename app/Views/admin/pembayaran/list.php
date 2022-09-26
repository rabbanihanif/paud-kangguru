<?= $this->extend('layout/admin') ?>

<?= $this->section('content') ?>
<?php

use App\Models\Murid;
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
          <th>Kode Pembayaran</th>
          <th>Nama Murid</th>
          <th>Nama Bank</th>
          <th>Nama Pengirim</th>
          <th>Bukti Transfer</th>
          <th>Status</th>
          <th>#</th>
        </tr>
      </thead>
      <tbody>
        <?php $i = 1; ?>
        <?php foreach ($data->getResult() as $d) : ?>
          <tr>
            <td><?= $i++; ?></td>
            <!-- <td scope="row"><?= $d->nama_lengkap; ?> (<?= $d->nomor_pendaftaran; ?>)</td> -->
            <td><?= $d->kode_pembayaran; ?></td>
            <td scope="row"><?= $d->nama_lengkap; ?></td>
            <td><?= $d->nama_bank; ?></td>
            <td><?= $d->nama_pengirim; ?></td>
            <td>
              <?php if ($d->bukti_transfer) : ?>
                <a target="_blank" href="<?= base_url('uploads/' . $d->bukti_transfer); ?>">File</a>
              <?php else : ?>
                N/A
              <?php endif; ?>
            </td>
            <td>
              <?php
              if ($d->status == "Lapor bayar") {
                // echo "<span class='badge badge-warning text-dark'>Menunggu</span>";
                echo "Menunggu";
              } else if ($d->status == "Sudah bayar") {
                // echo "<span class='badge badge-success'>Lunas</span>";
                echo "Diterima";
              } else if ($d->status == "Belum bayar") {
                // echo "<span class='badge badge-danger'>Belum Bayar</span>";
                echo "Belum bayar";
              } else {
                echo "N/A";
              }
              ?>
            </td>
            <td>
              <?php if ($d->status == "Lapor bayar") : ?>
                <a class="btn btn-success btn-sm" href="<?= route_to('pembayaran.terima', $d->id_pembayaran); ?>" role="button">Terima</a>
                <a class="btn btn-danger btn-sm" href="<?= route_to('pembayaran.tolak', $d->id_pembayaran); ?>" role="button">Tolak</a>
              <?php else : ?>
                &nbsp;
              <?php endif; ?>
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