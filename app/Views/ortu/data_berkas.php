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
    <form action="<?= route_to('form.dokumen.store'); ?>" method="post" enctype="multipart/form-data" class="needs-validation" novalidate="">
      <?= csrf_field() ?>
      <input type="hidden" name="_method" value="PUT">


      <div class="form-group">
        <label for="nama_anak">Nama Murid (ID Pendaftaran)</label>
        <input type="text" class="form-control" name="nama_anak" id="nama_anak" aria-describedby="nama_anak" placeholder="Nama murid" value="<?= $murid->nama_lengkap . " (" . $murid->nomor_pendaftaran . ")" ?>" readonly disabled>
        <div class="invalid-feedback">
          Field ini harus diisi
        </div>
      </div>

      <div class="row">
        <div class="col-md-10">
          <div class="form-group">
            <label for="foto_murid">Foto Murid</label>
            <input type="file" class="form-control" name="foto_murid" id="foto_murid" aria-describedby="foto_murid" required>
            <small class="text-primary">Dengan format JPG/JPEG/PNG</small>
            <div class="invalid-feedback">
              Field ini harus diisi
            </div>
          </div>

          <div class="form-group">
            <label for="akta_lahir">Akta Lahir</label>
            <input type="file" class="form-control" name="akta_lahir" id="akta_lahir" aria-describedby="akta_lahir" required>
            <small class="text-primary">Dengan format JPG/JPEG/PNG</small>
            <div class="invalid-feedback">
              Field ini harus diisi
            </div>
          </div>

          <div class="form-group">
            <label for="kk">Kartu Keluarga</label>
            <input type="file" class="form-control" name="kk" id="kk" aria-describedby="kk" required>
            <small class="text-primary">Dengan format JPG/JPEG/PNG</small>
            <div class="invalid-feedback">
              Field ini harus diisi
            </div>
          </div>

          <button type="submit" class="btn btn-primary btn-block">Simpan</button>
        </div>
        <div class="col-md-2">
          <div class="form-group">
            <label for="foto_murid_tipe">Foto Murid</label>
            <br>
            <?php if ($dokumen->foto_murid) : ?>
              <?php if (explode("/", $dokumen->foto_murid_tipe)[1] != 'pdf') : ?>
                <a href="<?= base_url('uploads/' . $dokumen->foto_murid); ?>" target="_blank"><img src="<?= base_url('uploads/' . $dokumen->foto_murid); ?>" class="img-fluid"></a>
              <?php else : ?>
                <a href="<?= base_url('uploads/' . $dokumen->foto_murid); ?>" target="_blank">PDF Foto Murid</a>
              <?php endif; ?>
            <?php else : ?>
              N/A
            <?php endif; ?>
          </div>
          <div class="form-group">
            <label for="akta_lahir_tipe">Akta Lahir</label>
            <br>
            <?php if ($dokumen->akta_lahir) : ?>
              <?php if (explode("/", $dokumen->akta_lahir_tipe)[1] != 'pdf') : ?>
                <a href="<?= base_url('uploads/' . $dokumen->akta_lahir); ?>" target="_blank"><img src="<?= base_url('uploads/' . $dokumen->akta_lahir); ?>" class="img-fluid"></a>
              <?php else : ?>
                <a href="<?= base_url('uploads/' . $dokumen->akta_lahir); ?>" target="_blank">PDF Akta Lahir</a>
              <?php endif; ?>
            <?php else : ?>
              N/A
            <?php endif; ?>
          </div>
          <div class="form-group">
            <label for="kk_tipe">Kartu Keluarga</label>
            <br>
            <?php if ($dokumen->kk) : ?>
              <?php if (explode("/", $dokumen->kk_tipe)[1] != 'pdf') : ?>
                <a href="<?= base_url('uploads/' . $dokumen->kk); ?>" target="_blank"><img src="<?= base_url('uploads/' . $dokumen->kk); ?>" class="img-fluid"></a>
              <?php else : ?>
                <a href="<?= base_url('uploads/' . $dokumen->kk); ?>" target="_blank">PDF Kartu Keluarga</a>
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