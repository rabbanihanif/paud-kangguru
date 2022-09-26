<?= $this->extend('auth/layout') ?>

<?= $this->section('content') ?>
<?php
$db = \Config\Database::connect();
$ta = $db->table('tb_ta')
  ->where('status', '1')
  ->get()->getRowArray();

use App\Models\ModelTa;

?>
<div id="app">
  <section class="section">
    <div class="container mt-5">
      <div class="row">
        <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
          <div class="login-brand">
            <a href="<?= route_to('homepage'); ?>"><img src="<?= base_url('assets/img/logo/logo.svg'); ?>" alt="logo" width="100" class="shadow-light rounded-circle"></a>
          </div>

          <div class="card card-primary">

            <div class="card-header">
              <h4>Login</h4>
            </div>

            <div class="card-body">
              <?php if (session()->getFlashdata('msg')) : ?>
                <div class="alert alert-danger"><?= session()->getFlashdata('msg') ?></div>
              <?php endif; ?>
              <?php if (session()->getFlashdata('success')) : ?>
                <div class="alert alert-success"><?= session()->getFlashdata('success') ?></div>
              <?php endif; ?>

              <form method="POST" action="<?= route_to('login-auth'); ?>" class="needs-validation" novalidate="">
                <?= csrf_field() ?>

                <div class="form-group">
                  <label for="email">Email</label>
                  <input id="email" type="email" class="form-control" name="email" tabindex="1" required autofocus>
                  <div class="invalid-feedback">
                    Masukan Email
                  </div>
                </div>

                <div class="form-group">
                  <div class="d-block">
                    <label for="password" class="control-label">Password</label>
                    <!-- <div class="float-right">
                      <a href="auth-forgot-password.html" class="text-small">
                        Forgot Password?
                      </a>
                    </div> -->
                  </div>
                  <input id="password" type="password" class="form-control" name="password" tabindex="2" required>
                  <div class="invalid-feedback">
                    Masukan Password
                  </div>
                </div>

                <div class="form-group">
                  <button type="submit" class="btn btn-primary btn-block">
                    Login
                  </button>

                  <a name="daftar" id="daftar" class="btn btn-warning btn-block mt-3" href="<?= route_to('register'); ?>" role="button">Daftar Akun</a>
                </div>
              </form>
            </div>



          </div>

          <div class="simple-footer">
            Copyright &copy; Kangguru Kecil <?= date('Y'); ?>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>
<?= $this->endSection() ?>