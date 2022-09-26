<?= $this->extend('layout/print') ?>

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

use Carbon\Carbon;
?>


<h2 class="h3 mb-4 text-gray-800"><?= $murid->nama_lengkap; ?> (<?= $murid->nomor_pendaftaran; ?>)</h1>


  <div class="container">

    <div class="row mb-3">
      <div class="col-md-6">
        <h4 class="text-primary font-weight-bold">Data Diri Murid</h4>
      </div>
    </div>

    <div class="row">
      <div class="col-6">
        <table class="table table-borderless">
          <tbody>
            <tr>
              <th scope="row">Nomor Pendaftaran</th>
              <td>:</td>
              <td><?= $murid->nomor_pendaftaran; ?></td>
            </tr>
          </tbody>
          <tbody>
            <tr>
              <th scope="row">Nama Lengkap</th>
              <td>:</td>
              <td><?= $murid->nama_lengkap; ?></td>
            </tr>
          </tbody>
          <tbody>
            <tr>
              <th scope="row">NIK</th>
              <td>:</td>
              <td><?= $murid->nik; ?></td>
            </tr>
          </tbody>
          <tbody>
            <tr>
              <th scope="row">Kelompok</th>
              <td>:</td>
              <td><?= $murid->kelompok; ?></td>
            </tr>
          </tbody>
          <tbody>
            <tr>
              <th scope="row">Tempat/Tanggal Lahir</th>
              <td>:</td>
              <td><?= $murid->tempat_lahir; ?>/<?= $murid->tanggal_lahir; ?></td>
            </tr>
          </tbody>
          <tbody>
            <tr>
              <th scope="row">Agama</th>
              <td>:</td>
              <td><?= $murid->agama; ?></td>
            </tr>
          </tbody>
          <tbody>
            <tr>
              <th scope="row">Jenis Kelamin</th>
              <td>:</td>
              <td><?= $murid->jenis_kelamin; ?></td>
            </tr>
          </tbody>
          <tbody>
            <tr>
              <th scope="row">Alamat</th>
              <td>:</td>
              <td><?= $murid->alamat; ?></td>
            </tr>
          </tbody>
        </table>
      </div>
      <div class="col-6">
        <p class="text-primary">Foto Murid</p>
        <?php if ($dokumen->foto_murid) : ?>
          <?php if (explode("/", $dokumen->foto_murid_tipe)[1] != 'pdf') : ?>
            <a href="<?= base_url('uploads/' . $dokumen->foto_murid); ?>" target="_blank"><img src="<?= base_url('uploads/' . $dokumen->foto_murid); ?>" class="img-fluid" width="350"></a>
          <?php else : ?>
            <a href="<?= base_url('uploads/' . $dokumen->foto_murid); ?>" target="_blank">PDF Foto Murid</a>
          <?php endif; ?>
        <?php else : ?>
          N/A
        <?php endif; ?>
      </div>
    </div>
    <div class="row mt-2">
      <div class="col-6">
        <table class="table table-borderless">
          <h4 class="text-primary font-weight-bold">Orang Tua</h4>
          <tbody>
            <tr>
              <th scope="row">Nama Ayah</th>
              <td>:</td>
              <td><?= $murid->nama_ayah; ?></td>
            </tr>
          </tbody>
          <tbody>
            <tr>
              <th scope="row">No Telepon</th>
              <td>:</td>
              <td><?= $murid->telepon_ayah; ?></td>
            </tr>
          </tbody>
          <tbody>
            <tr>
              <th scope="row">Pendidikan Ayah</th>
              <td>:</td>
              <td><?= $murid->pendidikan_ayah; ?></td>
            </tr>
          </tbody>
          <tbody>
            <tr>
              <th scope="row">Pekerjaan Ayah</th>
              <td>:</td>
              <td><?= $murid->pekerjaan_ayah; ?></td>
            </tr>
          </tbody>
          <tbody>
            <tr>
              <th scope="row">Nama Ibu</th>
              <td>:</td>
              <td><?= $murid->nama_ibu; ?></td>
            </tr>
          </tbody>
          <tbody>
            <tr>
              <th scope="row">No Telepon</th>
              <td>:</td>
              <td><?= $murid->telepon_ibu; ?></td>
            </tr>
          </tbody>
          <tbody>
            <tr>
              <th scope="row">Pendidikan Ibu</th>
              <td>:</td>
              <td><?= $murid->pendidikan_ibu; ?></td>
            </tr>
          </tbody>
          <tbody>
            <tr>
              <th scope="row">Pekerjaan Ibu</th>
              <td>:</td>
              <td><?= $murid->pekerjaan_ibu; ?></td>
            </tr>
          </tbody>
          <tbody>
            <tr>
              <th scope="row">Penghasilan Orang Tua</th>
              <td>:</td>
              <td><?= $murid->penghasilan_ortu; ?></td>
            </tr>
          </tbody>
        </table>
      </div>
      <div class="col-6">
        <table class="table table-borderless">
          <h4 class="text-primary font-weight-bold">Riwayat Kesehatan Murid</h4>

          <tbody>
            <tr>
              <td>Apakah pernah panas tinggi?</td>
              <td>:</td>
              <td>
                <?= $riwayat->panas_tinggi; ?>
              </td>
            </tr>
          </tbody>
          <tbody>
            <tr>
              <td>Apakah pernah pingsan?</td>
              <td>:</td>
              <td><?= $riwayat->pingsan; ?></td>
            </tr>
          </tbody>
          <tbody>
            <tr>
              <td>Apakah pernah kejang?</td>
              <td>:</td>
              <td><?= $riwayat->kejang; ?></td>
            </tr>
          </tbody>
          <tbody>
            <tr>
              <td>Apakah pernah infeksi telinga?</td>
              <td>:</td>
              <td><?= $riwayat->infeksi_telinga; ?></td>
            </tr>
          </tbody>
          <tbody>
            <tr>
              <td>Apakah pernah alergi?</td>
              <td>:</td>
              <td><?= $riwayat->alergi; ?></td>
            </tr>
          </tbody>
          <tbody>
            <tr>
              <td>Apakah pernah kecelakaan?</td>
              <td>:</td>
              <td><?= $riwayat->kecelakaan; ?></td>
            </tr>
          </tbody>
          <tbody>
            <tr>
              <td>Apakah mengalami masalah penglihatan?</td>
              <td>:</td>
              <td><?= $riwayat->hal_penglihatan; ?></td>
            </tr>
          </tbody>
          <tbody>
            <tr>
              <td>Apakah mengalami masalah pendengaran?</td>
              <td>:</td>
              <td><?= $riwayat->hal_pendengaran; ?></td>
            </tr>
          </tbody>
          <tbody>
            <tr>
              <td>Apakah mengalami masalah bicara?</td>
              <td>:</td>
              <td><?= $riwayat->hal_bicara; ?></td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
    <div class="row mt-2">
      <div class="col-6">
        <table class="table table-borderless">
          <h4 class="text-primary font-weight-bold">Riwayat Kelahiran Murid</h4>
          <tbody>
            <tr>
              <th scope="row">lama kandungan</th>
              <td>:</td>
              <td><?= $riwayat->lama_kandungan; ?></td>
            </tr>
          </tbody>
          <tbody>
            <tr>
              <th scope="row">jenis kelahiran</th>
              <td>:</td>
              <td><?= $riwayat->jenis_kelahiran; ?></td>
            </tr>
          </tbody>
          <tbody>
            <tr>
              <th scope="row">berat lahir</th>
              <td>:</td>
              <td><?= $riwayat->berat_lahir; ?></td>
            </tr>
          </tbody>
          <tbody>
            <tr>
              <th scope="row">tinggi lahir</th>
              <td>:</td>
              <td><?= $riwayat->tinggi_lahir; ?></td>
            </tr>
          </tbody>
        </table>
      </div>
      <div class="col-6">
        <table class="table table-borderless">
          <h4 class="text-primary font-weight-bold">Riwayat Sosial Emosi</h4>
          <tbody>
            <tr>
              <th scope="row">Apakah ananda sudah mandiri?</th>
              <td>:</td>
              <td><?= $riwayat->hal_kemandirian; ?></td>
            </tr>
          </tbody>
          <tbody>
            <tr>
              <th scope="row">Apakah ananda pemalu atau pendiam?</th>
              <td>:</td>
              <td><?= $riwayat->hal_sifat; ?></td>
            </tr>
          </tbody>
          <tbody>
            <tr>
              <th scope="row">Hal apa yang disukai ananda?</th>
              <td>:</td>
              <td><?= $riwayat->hal_disukai; ?></td>
            </tr>
          </tbody>
          <tbody>
            <tr>
              <th scope="row">Hal apa yang tidak disukai ananda?</th>
              <td>:</td>
              <td><?= $riwayat->hal_tidak_disukai; ?></td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>



  </div>

  <!-- <div class="col-12">
      <div class="col-6">
        <table class="table table-borderless">
          <h4 class="text-primary font-weight-bold">Riwayat Kesehatan Murid</h4>

          <tbody>
            <tr>
              <td>Apakah pernah panas tinggi?</td>
              <td>:</td>
              <td>
                <?= $riwayat->panas_tinggi; ?>
              </td>
            </tr>
          </tbody>
          <tbody>
            <tr>
              <td>Apakah pernah pingsan?</td>
              <td>:</td>
              <td><?= $riwayat->pingsan; ?></td>
            </tr>
          </tbody>
          <tbody>
            <tr>
              <td>Apakah pernah kejang?</td>
              <td>:</td>
              <td><?= $riwayat->kejang; ?></td>
            </tr>
          </tbody>
          <tbody>
            <tr>
              <td>Apakah pernah infeksi telinga?</td>
              <td>:</td>
              <td><?= $riwayat->infeksi_telinga; ?></td>
            </tr>
          </tbody>
          <tbody>
            <tr>
              <td>Apakah pernah alergi?</td>
              <td>:</td>
              <td><?= $riwayat->alergi; ?></td>
            </tr>
          </tbody>
          <tbody>
            <tr>
              <td>Apakah pernah kecelakaan?</td>
              <td>:</td>
              <td><?= $riwayat->kecelakaan; ?></td>
            </tr>
          </tbody>
          <tbody>
            <tr>
              <td>Apakah mengalami masalah penglihatan?</td>
              <td>:</td>
              <td><?= $riwayat->hal_penglihatan; ?></td>
            </tr>
          </tbody>
          <tbody>
            <tr>
              <td>Apakah mengalami masalah pendengaran?</td>
              <td>:</td>
              <td><?= $riwayat->hal_pendengaran; ?></td>
            </tr>
          </tbody>
          <tbody>
            <tr>
              <td>Apakah mengalami masalah bicara?</td>
              <td>:</td>
              <td><?= $riwayat->hal_bicara; ?></td>
            </tr>
          </tbody>
        </table>
      </div>
      <div class="col-8">
        <table class="table table-borderless">
          <h4 class="text-primary font-weight-bold">Riwayat Kelahiran Murid</h4>
          <tbody>
            <tr>
              <th scope="row">lama kandungan</th>
              <td>:</td>
              <td><?= $riwayat->lama_kandungan; ?></td>
            </tr>
          </tbody>
          <tbody>
            <tr>
              <th scope="row">jenis kelahiran</th>
              <td>:</td>
              <td><?= $riwayat->jenis_kelahiran; ?></td>
            </tr>
          </tbody>
          <tbody>
            <tr>
              <th scope="row">berat lahir</th>
              <td>:</td>
              <td><?= $riwayat->berat_lahir; ?></td>
            </tr>
          </tbody>
          <tbody>
            <tr>
              <th scope="row">tinggi lahir</th>
              <td>:</td>
              <td><?= $riwayat->tinggi_lahir; ?></td>
            </tr>
          </tbody>
        </table>
      </div>
      <div class="col-7">
        <table class="table table-borderless">
          <h4 class="text-primary font-weight-bold">Riwayat Sosial Emosi</h4>
          <tbody>
            <tr>
              <th scope="row">Apakah ananda sudah mandiri?</th>
              <td>:</td>
              <td><?= $riwayat->hal_kemandirian; ?></td>
            </tr>
          </tbody>
          <tbody>
            <tr>
              <th scope="row">Apakah ananda pemalu atau pendiam?</th>
              <td>:</td>
              <td><?= $riwayat->hal_sifat; ?></td>
            </tr>
          </tbody>
          <tbody>
            <tr>
              <th scope="row">Hal apa yang disukai ananda?</th>
              <td>:</td>
              <td><?= $riwayat->hal_disukai; ?></td>
            </tr>
          </tbody>
          <tbody>
            <tr>
              <th scope="row">Hal apa yang tidak disukai ananda?</th>
              <td>:</td>
              <td><?= $riwayat->hal_tidak_disukai; ?></td>
            </tr>
          </tbody>
        </table>
      </div>
    </div> -->

  <!-- <div class="row">
      <div class="col-4">
        <table class="table table-borderless">
          <h4 class="text-primary font-weight-bold">Riwayat Kesehatan Murid</h4>

          <tbody>
            <tr>
              <td>Apakah pernah panas tinggi?</td>
              <td>:</td>
              <td>
                <?= $riwayat->panas_tinggi; ?>
              </td>
            </tr>
          </tbody>
          <tbody>
            <tr>
              <td>Apakah pernah pingsan?</td>
              <td>:</td>
              <td><?= $riwayat->pingsan; ?></td>
            </tr>
          </tbody>
          <tbody>
            <tr>
              <td>Apakah pernah kejang?</td>
              <td>:</td>
              <td><?= $riwayat->kejang; ?></td>
            </tr>
          </tbody>
          <tbody>
            <tr>
              <td>Apakah pernah infeksi telinga?</td>
              <td>:</td>
              <td><?= $riwayat->infeksi_telinga; ?></td>
            </tr>
          </tbody>
          <tbody>
            <tr>
              <td>Apakah pernah alergi?</td>
              <td>:</td>
              <td><?= $riwayat->alergi; ?></td>
            </tr>
          </tbody>
          <tbody>
            <tr>
              <td>Apakah pernah kecelakaan?</td>
              <td>:</td>
              <td><?= $riwayat->kecelakaan; ?></td>
            </tr>
          </tbody>
          <tbody>
            <tr>
              <td>Apakah mengalami masalah penglihatan?</td>
              <td>:</td>
              <td><?= $riwayat->hal_penglihatan; ?></td>
            </tr>
          </tbody>
          <tbody>
            <tr>
              <td>Apakah mengalami masalah pendengaran?</td>
              <td>:</td>
              <td><?= $riwayat->hal_pendengaran; ?></td>
            </tr>
          </tbody>
          <tbody>
            <tr>
              <td>Apakah mengalami masalah bicara?</td>
              <td>:</td>
              <td><?= $riwayat->hal_bicara; ?></td>
            </tr>
          </tbody>
        </table>
      </div>
      <div class="col-4">
        <table class="table table-borderless">
          <h4 class="text-primary font-weight-bold">Riwayat Kelahiran Murid</h4>
          <tbody>
            <tr>
              <th scope="row">lama kandungan</th>
              <td>:</td>
              <td><?= $riwayat->lama_kandungan; ?></td>
            </tr>
          </tbody>
          <tbody>
            <tr>
              <th scope="row">jenis kelahiran</th>
              <td>:</td>
              <td><?= $riwayat->jenis_kelahiran; ?></td>
            </tr>
          </tbody>
          <tbody>
            <tr>
              <th scope="row">berat lahir</th>
              <td>:</td>
              <td><?= $riwayat->berat_lahir; ?></td>
            </tr>
          </tbody>
          <tbody>
            <tr>
              <th scope="row">tinggi lahir</th>
              <td>:</td>
              <td><?= $riwayat->tinggi_lahir; ?></td>
            </tr>
          </tbody>
        </table>
      </div>
      <div class="col-4">
        <table class="table table-borderless">
          <h4 class="text-primary font-weight-bold">Riwayat Sosial Emosi</h4>
          <tbody>
            <tr>
              <th scope="row">Apakah ananda sudah mandiri?</th>
              <td>:</td>
              <td><?= $riwayat->lama_kandungan; ?></td>
            </tr>
          </tbody>
          <tbody>
            <tr>
              <th scope="row">Apakah ananda pemalu atau pendiam?</th>
              <td>:</td>
              <td><?= $riwayat->jenis_kelahiran; ?></td>
            </tr>
          </tbody>
          <tbody>
            <tr>
              <th scope="row">Hal apa yang disukai ananda?</th>
              <td>:</td>
              <td><?= $riwayat->berat_lahir; ?></td>
            </tr>
          </tbody>
          <tbody>
            <tr>
              <th scope="row">Hal apa yang tidak disukai ananda?</th>
              <td>:</td>
              <td><?= $riwayat->tinggi_lahir; ?></td>
            </tr>
          </tbody>
        </table>
      </div>
    </div> -->

  </div>

  </section>
  <?= $this->endSection() ?>

  <?= $this->section('js') ?>
  <?= $this->include('includes/summernote/js') ?>
  <script type="text/javascript">
    window.print();
    window.onfocus = function() {
      setTimeout(function() {
        window.close();
      }, 100);
    }
  </script>
  <?= $this->endSection() ?>

  <?= $this->section('css') ?>
  <?= $this->include('includes/summernote/css') ?>
  <?= $this->endSection() ?>