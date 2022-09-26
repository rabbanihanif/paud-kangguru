<?= $this->extend('auth/layout') ?>

<?= $this->section('content') ?>
<?php
$db = \Config\Database::connect();
$ta = $db->table('tb_ta')
  ->where('status', '1')
  ->get()->getRowArray();

?>

<div id="app">
  <section class="section">
    <div class="container mt-5">
      <div class="row">
        <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
          <div class="login-brand">
            <a href="<?= route_to('homepage'); ?>"><img src="<?= base_url('assets/img/logo/logo.svg'); ?>" alt="logo" width="100" class="shadow-light rounded-circle"></a>
          </div>

          <!-- <?php if ($ta['status'] != 1) :  ?>
            <div class="card bg-danger text-white">
              <div class="card-body text-center"><strong>Pendaftaran Tahun Ini telah ditutup!</strong></div>
            </div>
          <?php else : ?>
            <div class="card bg-success text-white">
              <div class="card-body text-center"><strong>Pendaftaran Murid Baru Tahun ajaran <?= $ta['ta'] ?></strong></div>
            </div> -->

          <div class="card card-primary">
            <div class="card-header">
              <h4>Registrasi Akun</h4>
            </div>

            <div class="card-body">
              <?php if (session()->getFlashdata('msg')) : ?>
                <div class="alert alert-danger"><?= session()->getFlashdata('msg') ?></div>
              <?php endif; ?>

              <?= session()->getFlashdata('error') ?>
              <div class="text-danger">
                <?= service('validation')->listErrors() ?>
              </div>

              <form method="POST" action="<?= route_to('register-auth'); ?>" class="needs-validation" novalidate="">
                <?= csrf_field() ?>

                <div class="form-group">
                  <label for="nama_anak">Nama Anak</label>
                  <input id="nama_anak" type="nama_anak" class="form-control" name="nama_anak" tabindex="1" required autofocus placeholder="Nama Lengkap" value="<?= set_value('nama_anak'); ?>">
                  <div class="invalid-feedback">
                    Silahkan isi dahulu nama anak Anda
                  </div>
                </div>

                <div class="form-group">
                  <label for="nik_anak">NIK Anak</label>
                  <input id="nik_anak" type="nik_anak" class="form-control" name="nik_anak" tabindex="1" required autofocus placeholder="NIK" value="<?= set_value('nik_anak'); ?>">
                  <div class="invalid-feedback">
                    Silahkan isi dahulu Nomor Induk Kependudukan anak Anda
                  </div>
                </div>

                <div class="form-group">
                  <label for="email">Email</label>
                  <input id="email" type="email" class="form-control" name="email" tabindex="1" required autofocus value="<?= set_value('email'); ?>">
                  <div class="invalid-feedback">
                    Silahkan isi dahulu email Anda
                  </div>
                </div>

                <div class="form-group">
                  <div class="d-block">
                    <label for="password" class="control-label">Password</label>
                  </div>
                  <input id="password" type="password" class="form-control" name="password" tabindex="2" required>
                  <div class="invalid-feedback">
                    Silahkan isi dahulu password Anda
                  </div>
                </div>

                <div class="form-group">
                  <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                    Daftar
                  </button>
                </div>
              </form>
            </div>
          </div>
          <div class="mt-5 text-muted text-center">
            Sudah memiliki akun? <a href="<?= route_to('login'); ?>">Login</a>
          </div>
        <?php endif; ?>


        <div class="simple-footer">
          Copyright &copy; Kangguru Kecil <?= date('Y'); ?>
        </div>
        </div>
      </div>
    </div>
  </section>
</div>
<?= $this->endSection() ?>