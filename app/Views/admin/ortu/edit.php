<?= $this->extend('layout/admin') ?>

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
  <div class="card-header text-right">
    <a name="" id="" class="btn btn-dark btn-sm" href="<?= route_to('ortu.index'); ?>" role="button">
      <i class="fa fa-arrow-left" aria-hidden="true"></i>
      Kembali
    </a>
  </div>
  <div class="card-body">

    <?= session()->getFlashdata('error') ?>
    <div class="text-danger">
      <?= service('validation')->listErrors() ?>
    </div>
    <form action="<?= route_to('ortu.update', $data->id_ortu); ?>" method="post" enctype="multipart/form-data" class="needs-validation" novalidate="">
      <?= csrf_field() ?>
      <input type="hidden" name="_method" value="PUT">

      <?php
      $murid = model(Murid::class)->where('id_pengguna', $data->id_pengguna)->first();
      ?>

      <div class="form-group">
        <label for="nama_anak">Nama Murid (Nomor Pendaftaran)</label>
        <input type="text" class="form-control" name="nama_anak" id="nama_anak" aria-describedby="nama_anak" placeholder="Nama murid" value="<?= $murid->nama_lengkap . " (" . $murid->nomor_pendaftaran . ")" ?>" readonly disabled>
        <div class="invalid-feedback">
          Field ini harus diisi
        </div>
      </div>

      <div class="row mb-3">
        <div class="col-md-12">
          <h5 class="text-primary font-weight-bold">Data Ayah</h5>
        </div>
      </div>

      <div class="row mb-3">
        <div class="col-md-12">
          <div class="form-group">
            <label for="nama">Nama</label>
            <input type="text" class="form-control" name="nama" id="nama" aria-describedby="nama" placeholder="Nama" value="<?= set_value('nama', $data->nama) ?>" required>
            <div class="invalid-feedback">
              Field ini harus diisi
            </div>
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group">
            <label for="nik">NIK</label>
            <input type="text" class="form-control" name="nik" id="nik" aria-describedby="nik" placeholder="NIK" value="<?= set_value('nik', $data->nik) ?>" required>
            <div class="invalid-feedback">
              Field ini harus diisi
            </div>
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group">
            <label for="telepon">Nomor Telepon</label>
            <input type="text" class="form-control" name="telepon" id="telepon" aria-describedby="telepon" placeholder="Nomor telepon" value="<?= set_value('telepon', $data->telepon) ?>" required>
            <div class="invalid-feedback">
              Field ini harus diisi
            </div>
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group">
            <label for="pendidikan">Pendidikan</label>
            <input type="text" class="form-control" name="pendidikan" id="pendidikan" aria-describedby="pendidikan" placeholder="Pendidikan" value="<?= set_value('pendidikan', $data->pendidikan) ?>" required>
            <div class="invalid-feedback">
              Field ini harus diisi
            </div>
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group">
            <label for="pekerjaan">Pekerjaan</label>
            <input type="text" class="form-control" name="pekerjaan" id="pekerjaan" aria-describedby="pekerjaan" placeholder="Pekerjaan" value="<?= set_value('pekerjaan', $data->pekerjaan) ?>" required>
            <div class="invalid-feedback">
              Field ini harus diisi
            </div>
          </div>
        </div>
      </div>

      <div class="row mb-3">
        <div class="col-md-12">
          <h5 class="text-primary font-weight-bold">Data Ibu</h5>
        </div>
      </div>

      <div class="row mb-3">
        <div class="col-md-12">
          <div class="form-group">
            <label for="nama_ibu">Nama</label>
            <input type="text" class="form-control" name="nama_ibu" id="nama_ibu" aria-describedby="nama_ibu" placeholder="Nama" value="<?= set_value('nama_ibu', $data->nama_ibu) ?>" required>
            <div class="invalid-feedback">
              Field ini harus diisi
            </div>
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group">
            <label for="nik_ibu">NIK</label>
            <input type="text" class="form-control" name="nik_ibu" id="nik_ibu" aria-describedby="nik_ibu" placeholder="NIK" value="<?= set_value('nik_ibu', $data->nik_ibu) ?>" required>
            <div class="invalid-feedback">
              Field ini harus diisi
            </div>
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group">
            <label for="telepon_ibu">Nomor Telepon</label>
            <input type="text" class="form-control" name="telepon_ibu" id="telepon_ibu" aria-describedby="telepon_ibu" placeholder="Nomor telepon" value="<?= set_value('telepon_ibu', $data->telepon_ibu) ?>" required>
            <div class="invalid-feedback">
              Field ini harus diisi
            </div>
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group">
            <label for="pendidikan_ibu">Pendidikan</label>
            <input type="text" class="form-control" name="pendidikan_ibu" id="pendidikan_ibu" aria-describedby="pendidikan_ibu" placeholder="Pendidikan" value="<?= set_value('pendidikan_ibu', $data->pendidikan_ibu) ?>" required>
            <div class="invalid-feedback">
              Field ini harus diisi
            </div>
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group">
            <label for="pekerjaan_ibu">Pekerjaan</label>
            <input type="text" class="form-control" name="pekerjaan_ibu" id="pekerjaan_ibu" aria-describedby="pekerjaan_ibu" placeholder="Pekerjaan" value="<?= set_value('pekerjaan_ibu', $data->pekerjaan_ibu) ?>" required>
            <div class="invalid-feedback">
              Field ini harus diisi
            </div>
          </div>
        </div>
      </div>

      <div class="row mb-3">
        <div class="col-md-12">
          <h5 class="text-primary font-weight-bold">Data Penghasilan</h5>
        </div>
      </div>

      <div class="form-group">
        <label for="penghasilan_ortu">Penghasilan</label>
        <input type="text" class="form-control" name="penghasilan_ortu" id="penghasilan_ortu" aria-describedby="penghasilan_ortu" placeholder="Penghasilan per bulan" value="<?= set_value('penghasilan_ortu', $data->penghasilan_ortu) ?>" required>
        <div class="invalid-feedback">
          Field ini harus diisi
        </div>
      </div>

      <button type="submit" class="btn btn-primary btn-block">Simpan</button>
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
