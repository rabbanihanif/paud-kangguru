<?= $this->extend('layout/ortu') ?>

<?= $this->section('js') ?>
<script>
  // Example starter JavaScript for disabling form submissions if there are invalid fields
  (function() {
    'use strict';
    window.addEventListener('load', function() {
      // Fetch all the forms we want to apply custom Bootstrap validation styles to
      var forms = document.getElementsByClassName('needs-validation');
      // Loop over them and prevent submission
      var validation = Array.prototype.filter.call(forms, function(form) {
        form.addEventListener('submit', function(event) {
          if (form.checkValidity() === false) {
            event.preventDefault();
            event.stopPropagation();
          }
          form.classList.add('was-validated');
        }, false);
      });
    }, false);
  })();
</script>
<?= $this->endSection() ?>

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

    <div class="text-danger">
      <?= service('validation')->listErrors() ?>
    </div>
    <form action="<?= route_to('form.pembayaran.store'); ?>" method="post" enctype="multipart/form-data" class="needs-validation" novalidate="">
      <?= csrf_field() ?>
      <input type="hidden" name="_method" value="PUT">
      <div class="row">
        <div class="col-md-6">
          <div class="row mb-3">
            <div class="col-md-6">
              <div class="form-group">
                <label for="kode_pembayaran">ID Pembayaran</label>
                <input type="text" class="form-control" name="kode_pembayaran" id="kode_pembayaran" aria-describedby="kode_pembayaran" placeholder="Kode Pembayaran" value="<?= $pembayaran->kode_pembayaran; ?>" readonly disabled>
                <div class="invalid-feedback">
                  Field ini harus diisi
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="nama_anak">Nama Murid</label>
                <input type="text" class="form-control" name="nama_anak" id="nama_anak" aria-describedby="nama_anak" placeholder="Nama murid" value="<?= $murid->nama_lengkap ?>" readonly disabled>
                <!-- <input type="text" class="form-control" name="nama_anak" id="nama_anak" aria-describedby="nama_anak" placeholder="Nama murid" value="<?= $murid->nama_lengkap . " (" . $murid->nomor_pendaftaran . ")" ?>" readonly disabled> -->
                <div class="invalid-feedback">
                  Field ini harus diisi
                </div>
              </div>
            </div>
          </div>

          <div class="form-group">
            <label for="nama_bank">Nama Bank</label>
            <input type="text" class="form-control" name="nama_bank" id="nama_bank" aria-describedby="nama_bank" placeholder="Nama Bank" value="<?= set_value('nama_bank', $pembayaran->nama_bank); ?>" required>
            <div class="invalid-feedback">
              Field ini harus diisi
            </div>
          </div>

          <div class="form-group">
            <label for="nama_pengirim">Atas nama</label>
            <input type="text" class="form-control" name="nama_pengirim" id="nama_pengirim" aria-describedby="nama_pengirim" placeholder="Atas nama" value="<?= set_value('nama_pengirim', $pembayaran->nama_pengirim); ?>" required>
            <div class="invalid-feedback">
              Field ini harus diisi
            </div>
          </div>

          <div class="form-group">
            <label for="bukti_transfer">Bukti Transfer</label>
            <input type="file" class="form-control" name="bukti_transfer" id="bukti_transfer" aria-describedby="bukti_transfer" required>
            <small class="text-primary">Dengan format JPG/JPEG/PNG/PDF</small>
            <div class="invalid-feedback">
              Field ini harus diisi
            </div>
          </div>

          <button type="submit" class="btn btn-primary btn-block">Simpan</button>
        </div>
        <div class="col-md-2">
          <div class="form-group">
            <label for="bukti_transfer_tipe">Bukti Transfer</label>
            <br>
            <?php if ($pembayaran->bukti_transfer) : ?>
              <?php if (explode("/", $pembayaran->bukti_transfer_tipe)[1] != 'pdf') : ?>
                <a href="<?= base_url('uploads/' . $pembayaran->bukti_transfer); ?>" target="_blank"><img src="<?= base_url('uploads/' . $pembayaran->bukti_transfer); ?>" class="img-fluid"></a>
              <?php else : ?>
                <a href="<?= base_url('uploads/' . $pembayaran->bukti_transfer); ?>" target="_blank">PDF Bukti Transfer</a>
              <?php endif; ?>
            <?php else : ?>
              N/A
            <?php endif; ?>
          </div>
        </div>
      </div>

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