<?= $this->extend('layout/admin') ?>

<?= $this->section('content') ?>
<?php

use App\Models\Murid;
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
          <th>Nama Murid (ID Pendaftaran)</th>
          <th>Foto</th>
          <th>Akta Lahir</th>
          <th>Kartu Keluarga</th>
          <th>Tanggal Update</th>
          <th>#</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($data->getResult() as $d) : ?>
          <tr>
            <td scope="row"><?= $d->nama_lengkap; ?> (<?= $d->nomor_pendaftaran; ?>)</td>
            <td>
              <a target="_blank" href="<?= base_url('uploads/' . $d->foto_murid); ?>">File</a>
            </td>
            <td>
              <a target="_blank" href="<?= base_url('uploads/' . $d->akta_lahir); ?>">File</a>
            </td>
            <td>
              <a target="_blank" href="<?= base_url('uploads/' . $d->kk); ?>">File</a>
            </td>
            <td><?= Carbon::parse($d->updated_at)->format('d F Y, H:i A'); ?></td>
            <td>
              <form action="<?= route_to('dokumen.destroy'); ?>" method="post">
                <?= csrf_field() ?>
                <input type="hidden" name="_method" value="DELETE" />
                <input type="hidden" name="id_dokumen" value="<?= $d->id_dokumen; ?>" />
                <a class="btn btn-primary btn-sm" href="<?= route_to('dokumen.edit', $d->id_dokumen); ?>" role="button">Ubah</a>
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
