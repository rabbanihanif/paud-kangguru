<?= $this->extend('layout/admin') ?>

<?= $this->section('content') ?>
<?php

use Carbon\Carbon;
?>

<h1 class="h3 mb-4 text-gray-800"><?= $title ?? ""; ?></h1>

<div class="card">
  <div class="card-header text-right">
    <a name="" id="" class="btn btn-primary btn-sm" href="<?= route_to('berita.create'); ?>" role="button">
      <i class="fa fa-plus" aria-hidden="true"></i>
      Tambah Berita
    </a>
  </div>
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
          <th>#</th>
          <th>Judul</th>
          <th>Gambar</th>
          <th>Tanggal dibuat</th>
          <th>Tanggal Update</th>
          <th>#</th>
        </tr>
      </thead>
      <tbody>
        <?php $i = 1 ?>
        <?php foreach ($data as $d) : ?>
          <tr>
            <td scope="row"><?= $i++; ?></td>
            <td scope="row"><?= $d->judul; ?></td>
            <td>
              <img src="<?= base_url('uploads/' . $d->gambar); ?>" height="50">
            </td>
            <td><?= Carbon::parse($d->created_at)->format('d F Y, H:i A'); ?></td>
            <td><?= Carbon::parse($d->updated_at)->format('d F Y, H:i A'); ?></td>
            <td>
              <form action="<?= route_to('berita.destroy'); ?>" method="post">
                <?= csrf_field() ?>
                <input type="hidden" name="_method" value="DELETE" />
                <input type="hidden" name="id_berita" value="<?= $d->id_berita; ?>" />
                <a class="btn btn-primary btn-sm" href="<?= route_to('berita.edit', $d->id_berita); ?>" role="button">Ubah</a>
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