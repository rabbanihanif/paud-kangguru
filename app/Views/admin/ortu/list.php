<?= $this->extend('layout/admin') ?>

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
          <th>Kode</th>
          <th>Nama Ayah</th>
          <th>Nama Ibu</th>
          <th>Penghasilan</th>
          <th>Tanggal Update</th>
          <th>#</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($data as $d) : ?>
          <tr>
            <td scope="row"><?= $d->kode_ortu ?? "N/A"; ?></td>
            <td scope="row"><?= $d->nama ?? "N/A"; ?></td>
            <td scope="row"><?= $d->nama_ibu ?? "N/A"; ?></td>
            <td scope="row"><?= ($d->penghasilan_ortu) ? "IDR " . number_format($d->penghasilan_ortu, 0, ',', '.') : "N/A"; ?></td>
            <td><?= Carbon::parse($d->updated_at)->format('d F Y, H:i A'); ?></td>
            <td>
              <form action="<?= route_to('ortu.destroy'); ?>" method="post">
                <?= csrf_field() ?>
                <input type="hidden" name="_method" value="DELETE" />
                <input type="hidden" name="id_ortu" value="<?= $d->id_ortu; ?>" />
                <a class="btn btn-primary btn-sm" href="<?= route_to('ortu.edit', $d->id_ortu); ?>" role="button">Ubah</a>
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
