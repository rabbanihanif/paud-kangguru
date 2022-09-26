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

use Carbon\Carbon;
?>

<form action="<?= route_to('murid.update', $murid->id_murid); ?>" method="post" enctype="multipart/form-data" class="needs-validation" novalidate="">
  <h1 class="h3 mb-4 text-gray-800"><?= $title ?? ""; ?></h1>

  <div class="row mb-3">
    <div class="col-md-12 text-right">
      <a name="" id="" class="btn btn-dark btn-sm" href="<?= route_to('murid.index'); ?>" role="button">
        <i class="fa fa-arrow-left" aria-hidden="true"></i>
        Kembali
      </a>
    </div>
  </div>

  <div class="row mb-3">
    <div class="col-md-6">
      <div class="card mb-3">
        <div class="card-header text-primary font-weight-bold">
          Data Murid
        </div>
        <div class="card-body">
          <div class="row mb-3">
            <?php if (session()->getFlashdata('msg')) : ?>
              <div class="alert alert-danger"><?= session()->getFlashdata('msg') ?></div>
            <?php endif; ?>
            <?php if (session()->getFlashdata('success')) : ?>
              <div class="alert alert-success"><?= session()->getFlashdata('success') ?></div>
            <?php endif; ?>
          </div>
          <div class="text-danger">
            <?= service('validation')->listErrors() ?>
          </div>
          <?= csrf_field() ?>
          <input type="hidden" name="_method" value="PUT">

          <div class="form-group">
            <label for="nomor_pendaftaran">Nomor Pendaftaran</label>
            <input type="text" class="form-control" name="nomor_pendaftaran" id="nomor_pendaftaran" aria-describedby="nomor_pendaftaran" placeholder="<?= $murid->nomor_pendaftaran; ?>" readonly>
          </div>

          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label for="nama_lengkap">Nama Lengkap</label>
                <input type="text" class="form-control" name="nama_lengkap" id="nama_lengkap" aria-describedby="nama_lengkap" placeholder="Nama Lengkap" value="<?= set_value('nama_lengkap', $murid->nama_lengkap); ?>" required>
                <div class="invalid-feedback">
                  Field ini harus diisi
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="nama_panggilan">Nama Panggilan</label>
                <input type="text" class="form-control" name="nama_panggilan" id="nama_panggilan" aria-describedby="nama_panggilan" placeholder="Nama Panggilan" value="<?= set_value('nama_panggilan', $murid->nama_panggilan); ?>" required>
                <div class="invalid-feedback">
                  Field ini harus diisi
                </div>
              </div>
            </div>
          </div>

          <div class="form-group">
            <label for="nik">NIK</label>
            <input type="number" class="form-control" name="nik" id="nik" aria-describedby="nik" placeholder="NIK" value="<?= set_value('nik', $murid->nik); ?>" required>
            <div class="invalid-feedback">
              Field ini harus diisi
            </div>
          </div>

          <div class="form-group">
            <label for="kelompok">Kelompok</label>
            <select class="form-control" name="kelompok" id="kelompok" required>
              <option value="">Pilih kelompok</option>
              <option value="Playgroup" <?= set_select('kelompok', 'Playgroup') ?> <?= ($murid->kelompok == 'Playgroup') ? "selected" : ""; ?>>Playgroup</option>
              <option value="TK A" <?= set_select('kelompok', 'TK A') ?> <?= ($murid->kelompok == 'TK A') ? "selected" : ""; ?>>TK A</option>
              <option value="TK B" <?= set_select('kelompok', 'TK B') ?> <?= ($murid->kelompok == 'TK B') ? "selected" : ""; ?>>TK B</option>
            </select>
            <div class="invalid-feedback">
              Field ini harus diisi
            </div>
          </div>

          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label for="tempat_lahir">Tempat Lahir</label>
                <input type="text" class="form-control" name="tempat_lahir" id="tempat_lahir" aria-describedby="tempat_lahir" placeholder="Tempat Lahir" value="<?= set_value('tempat_lahir', $murid->tempat_lahir); ?>" required>
                <div class="invalid-feedback">
                  Field ini harus diisi
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="tanggal_lahir">Tanggal Lahir</label>
                <input type="date" class="form-control" name="tanggal_lahir" id="tanggal_lahir" aria-describedby="tanggal_lahir" placeholder="Tanggal Lahir" value="<?= set_value('tanggal_lahir', $murid->tanggal_lahir); ?>" required>
                <div class="invalid-feedback">
                  Field ini harus diisi
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="jenis_kelamin">Jenis Kelamin</label>
                <div class="form-check">
                  <label class="form-check-label">
                    <input type="radio" class="form-check-input" name="jenis_kelamin" id="jenis_kelamin" value="Laki-laki" <?= set_radio('jenis_kelamin', 'Laki-laki', true) ?> <?= ($murid->jenis_kelamin == 'Laki-laki') ? "checked" : ""; ?>>
                    Laki-laki
                  </label>
                </div>
                <div class="form-check">
                  <label class="form-check-label">
                    <input type="radio" class="form-check-input" name="jenis_kelamin" id="jenis_kelamin" value="Perempuan" <?= set_radio('jenis_kelamin', 'Perempuan') ?> <?= ($murid->jenis_kelamin == 'Perempuan') ? "checked" : ""; ?>>
                    Perempuan
                  </label>
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="agama">Agama</label>
                <input type="text" class="form-control" name="agama" id="agama" aria-describedby="agama" placeholder="Agama" value="<?= set_value('agama', $murid->agama); ?>" required>
                <div class="invalid-feedback">
                  Field ini harus diisi
                </div>
              </div>
            </div>
          </div>

          <div class="form-group">
            <label for="alamat">Alamat</label>
            <textarea class="form-control" name="alamat" id="alamat" rows="3" required><?= set_value('alamat', $murid->alamat); ?></textarea>
            <div class="invalid-feedback">
              Field ini harus diisi
            </div>
          </div>

          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label for="anak_ke">Anak Ke-</label>
                <input type="number" class="form-control" name="anak_ke" id="anak_ke" aria-describedby="anak_ke" placeholder="Anak Ke-" value="<?= set_value('anak_ke', $murid->anak_ke); ?>" required>
                <div class="invalid-feedback">
                  Field ini harus diisi
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="jumlah_saudara">Jumlah Saudara</label>
                <input type="number" class="form-control" name="jumlah_saudara" id="jumlah_saudara" aria-describedby="jumlah_saudara" placeholder="Jumlah Saudara" value="<?= set_value('jumlah_saudara', $murid->jumlah_saudara); ?>" required>
                <div class="invalid-feedback">
                  Field ini harus diisi
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="berat_badan">Berat Badan (kg)</label>
                <input type="text" class="form-control" name="berat_badan" id="berat_badan" aria-describedby="berat_badan" placeholder="Berat Badan" value="<?= set_value('berat_badan', $murid->berat_badan); ?>" required>
                <div class="invalid-feedback">
                  Field ini harus diisi
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="tinggi_badan">Tinggai Badan (cm)</label>
                <input type="number" class="form-control" name="tinggi_badan" id="tinggi_badan" aria-describedby="tinggi_badan" placeholder="Tinggai Badan" value="<?= set_value('tinggi_badan', $murid->tinggi_badan); ?>" required>
                <div class="invalid-feedback">
                  Field ini harus diisi
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="gol_darah">Golongan Darah</label>
                <select class="form-control" name="gol_darah" id="gol_darah" required>
                  <option value="">Pilih golongan darah</option>
                  <option value="A" <?= set_select('gol_darah', 'A') ?> <?= ($murid->gol_darah == 'A') ? "selected" : ""; ?>>A</option>
                  <option value="B" <?= set_select('gol_darah', 'B') ?> <?= ($murid->gol_darah == 'B') ? "selected" : ""; ?>>B</option>
                  <option value="AB" <?= set_select('gol_darah', 'AB') ?> <?= ($murid->gol_darah == 'AB') ? "selected" : ""; ?>>AB</option>
                  <option value="O" <?= set_select('gol_darah', 'O') ?> <?= ($murid->gol_darah == 'O') ? "selected" : ""; ?>>O</option>
                </select>
                <div class="invalid-feedback">
                  Field ini harus diisi
                </div>
              </div>
            </div>
          </div>

          <button type="submit" class="btn btn-primary btn-block">Simpan Data Murid</button>
        </div>
      </div>
      <div class="card">
        <div class="card-header text-primary font-weight-bold">
          Data Riwayat Murid
        </div>
        <div class="card-body">
          <h6 class="text-primary font-weight-bold mb-3">Riwayat Kelahiran</h6>

          <div class="form-group">
            <label for="lama_kandungan">Lama Kandungan</label>
            <input type="text" class="form-control" name="lama_kandungan" id="lama_kandungan" aria-describedby="lama_kandungan" placeholder="Lama Kandungan" value="<?= set_value('lama_kandungan', $riwayat->lama_kandungan); ?>" required>
            <div class="invalid-feedback">
              Field ini harus diisi
            </div>
          </div>

          <div class="form-group">
            <label for="jenis_kelahiran">Jenis Kelahiran</label>
            <input type="text" class="form-control" name="jenis_kelahiran" id="jenis_kelahiran" aria-describedby="jenis_kelahiran" placeholder="Jenis Kelahiran" value="<?= set_value('jenis_kelahiran', $riwayat->jenis_kelahiran); ?>" required>
            <div class="invalid-feedback">
              Field ini harus diisi
            </div>
          </div>

          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label for="berat_lahir">Berat Lahir (kg)</label>
                <input type="text" class="form-control" name="berat_lahir" id="berat_lahir" aria-describedby="berat_lahir" placeholder="Berat Lahir" value="<?= set_value('berat_lahir', $riwayat->berat_lahir); ?>" required>
                <div class="invalid-feedback">
                  Field ini harus diisi
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="tinggi_lahir">Tinggi Lahir (cm)</label>
                <input type="number" class="form-control" name="tinggi_lahir" id="tinggi_lahir" aria-describedby="tinggi_lahir" placeholder="Tinggi Lahir" value="<?= set_value('tinggi_lahir', $riwayat->tinggi_lahir); ?>" required>
                <div class="invalid-feedback">
                  Field ini harus diisi
                </div>
              </div>
            </div>
          </div>

          <hr>

          <h6 class="text-primary font-weight-bold mb-3">Riwayat Kesehatan</h6>

          <div class="row mb-3">
            <div class="col-md-6">Apakah pernah panas tinggi</div>
            <div class="col-md-1">
              <div class="form-check">
                <label class="form-check-label">
                  <input type="radio" class="form-check-input" name="panas_tinggi" id="panas_tinggi" value="Ya" <?php if ($riwayat->panas_tinggi == "Ya") echo "checked"; ?> <?= set_radio('panas_tinggi', 'Ya') ?>>
                  Ya
                </label>
              </div>
            </div>
            <div class="col-md-1">
              <div class="form-check">
                <label class="form-check-label">
                  <input type="radio" class="form-check-input" name="panas_tinggi" id="panas_tinggi" value="Tidak" <?php if ($riwayat->panas_tinggi == "Tidak") echo "checked"; ?> <?= set_radio('panas_tinggi', 'Tidak') ?>>
                  Tidak
                </label>
              </div>
            </div>
          </div>

          <div class="row mb-3">
            <div class="col-md-6">Apakah pernah infeksi telinga?</div>
            <div class="col-md-1">
              <div class="form-check">
                <label class="form-check-label">
                  <input type="radio" class="form-check-input" name="infeksi_telinga" id="infeksi_telinga" value="Ya" <?php if ($riwayat->infeksi_telinga == "Ya") echo "checked"; ?> <?= set_radio('infeksi_telinga', 'Ya') ?>>
                  Ya
                </label>
              </div>
            </div>
            <div class="col-md-1">
              <div class="form-check">
                <label class="form-check-label">
                  <input type="radio" class="form-check-input" name="infeksi_telinga" id="infeksi_telinga" value="Tidak" <?php if ($riwayat->infeksi_telinga == "Tidak") echo "checked"; ?> <?= set_radio('infeksi_telinga', 'Tidak') ?>>
                  Tidak
                </label>
              </div>
            </div>
          </div>

          <div class="row mb-3">
            <div class="col-md-6">Apakah pernah menderita alergi?</div>
            <div class="col-md-1">
              <div class="form-check">
                <label class="form-check-label">
                  <input type="radio" class="form-check-input" name="alergi" id="alergi" value="Ya" <?php if ($riwayat->alergi == "Ya") echo "checked"; ?> <?= set_radio('alergi', 'Ya') ?>>
                  Ya
                </label>
              </div>
            </div>
            <div class="col-md-1">
              <div class="form-check">
                <label class="form-check-label">
                  <input type="radio" class="form-check-input" name="alergi" id="alergi" value="Tidak" <?php if ($riwayat->alergi == "Tidak") echo "checked"; ?> <?= set_radio('alergi', 'Tidak') ?>>
                  Tidak
                </label>
              </div>
            </div>
          </div>

          <div class="row mb-3">
            <div class="col-md-6">Apakah pernah kecelakaan?</div>
            <div class="col-md-1">
              <div class="form-check">
                <label class="form-check-label">
                  <input type="radio" class="form-check-input" name="kecelakaan" id="kecelakaan" value="Ya" <?php if ($riwayat->kecelakaan == "Ya") echo "checked"; ?> <?= set_radio('kecelakaan', 'Ya') ?>>
                  Ya
                </label>
              </div>
            </div>
            <div class="col-md-1">
              <div class="form-check">
                <label class="form-check-label">
                  <input type="radio" class="form-check-input" name="kecelakaan" id="kecelakaan" value="Tidak" <?php if ($riwayat->kecelakaan == "Tidak") echo "checked"; ?> <?= set_radio('kecelakaan', 'Tidak') ?>>
                  Tidak
                </label>
              </div>
            </div>
          </div>

          <div class="row mb-3">
            <div class="col-md-6">Apakah pernah pingsan?</div>
            <div class="col-md-1">
              <div class="form-check">
                <label class="form-check-label">
                  <input type="radio" class="form-check-input" name="pingsan" id="pingsan" value="Ya" <?php if ($riwayat->pingsan == "Ya") echo "checked"; ?> <?= set_radio('pingsan', 'Ya') ?>>
                  Ya
                </label>
              </div>
            </div>
            <div class="col-md-1">
              <div class="form-check">
                <label class="form-check-label">
                  <input type="radio" class="form-check-input" name="pingsan" id="pingsan" value="Tidak" <?php if ($riwayat->pingsan == "Tidak") echo "checked"; ?> <?= set_radio('pingsan', 'Tidak') ?>>
                  Tidak
                </label>
              </div>
            </div>
          </div>

          <div class="row mb-3">
            <div class="col-md-6">Apakah pernah kejang?</div>
            <div class="col-md-1">
              <div class="form-check">
                <label class="form-check-label">
                  <input type="radio" class="form-check-input" name="kejang" id="kejang" value="Ya" <?php if ($riwayat->kejang == "Ya") echo "checked"; ?> <?= set_radio('kejang', 'Ya') ?>>
                  Ya
                </label>
              </div>
            </div>
            <div class="col-md-1">
              <div class="form-check">
                <label class="form-check-label">
                  <input type="radio" class="form-check-input" name="kejang" id="kejang" value="Tidak" <?php if ($riwayat->kejang == "Tidak") echo "checked"; ?> <?= set_radio('kejang', 'Tidak') ?>>
                  Tidak
                </label>
              </div>
            </div>
          </div>

          <div class="row mb-3">
            <div class="col-md-6">Apakah mengalami masalah penglihatan?</div>
            <div class="col-md-1">
              <div class="form-check">
                <label class="form-check-label">
                  <input type="radio" class="form-check-input" name="hal_penglihatan" id="hal_penglihatan" value="Ya" <?php if ($riwayat->hal_penglihatan == "Ya") echo "checked"; ?> <?= set_radio('hal_penglihatan', 'Ya') ?>>
                  Ya
                </label>
              </div>
            </div>
            <div class="col-md-1">
              <div class="form-check">
                <label class="form-check-label">
                  <input type="radio" class="form-check-input" name="hal_penglihatan" id="hal_penglihatan" value="Tidak" <?php if ($riwayat->hal_penglihatan == "Tidak") echo "checked"; ?> <?= set_radio('hal_penglihatan', 'Tidak') ?>>
                  Tidak
                </label>
              </div>
            </div>
          </div>

          <div class="row mb-3">
            <div class="col-md-6">Apakah mengalami masalah pendengaran?</div>
            <div class="col-md-1">
              <div class="form-check">
                <label class="form-check-label">
                  <input type="radio" class="form-check-input" name="hal_pendengaran" id="hal_pendengaran" value="Ya" <?php if ($riwayat->hal_pendengaran == "Ya") echo "checked"; ?> <?= set_radio('hal_pendengaran', 'Ya') ?>>
                  Ya
                </label>
              </div>
            </div>
            <div class="col-md-1">
              <div class="form-check">
                <label class="form-check-label">
                  <input type="radio" class="form-check-input" name="hal_pendengaran" id="hal_pendengaran" value="Tidak" <?php if ($riwayat->hal_pendengaran == "Tidak") echo "checked"; ?> <?= set_radio('hal_pendengaran', 'Tidak') ?>>
                  Tidak
                </label>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-6">Apakah mengalami masalah bicara?</div>
            <div class="col-md-1">
              <div class="form-check">
                <label class="form-check-label">
                  <input type="radio" class="form-check-input" name="hal_bicara" id="hal_bicara" value="Ya" <?php if ($riwayat->hal_bicara == "Ya") echo "checked"; ?> <?= set_radio('hal_bicara', 'Ya') ?>>
                  Ya
                </label>
              </div>
            </div>
            <div class="col-md-1">
              <div class="form-check">
                <label class="form-check-label">
                  <input type="radio" class="form-check-input" name="hal_bicara" id="hal_bicara" value="Tidak" <?php if ($riwayat->hal_bicara == "Tidak") echo "checked"; ?> <?= set_radio('hal_bicara', 'Tidak') ?>>
                  Tidak
                </label>
              </div>
            </div>
          </div>

          <hr>

          <h6 class="text-primary font-weight-bold mb-3">Riwayat Sosial Emosi</h6>

          <div class="form-group">
            <label for="hal_kemandirian">Apakah ananda sudah mandiri?</label>
            <input type="text" class="form-control" name="hal_kemandirian" id="hal_kemandirian" aria-describedby="hal_kemandirian" value="<?= set_value('hal_kemandirian', $riwayat->hal_kemandirian); ?>" required>
            <div class="invalid-feedback">
              Field ini harus diisi
            </div>
          </div>

          <div class="form-group">
            <label for="hal_sifat">Apakah ananda pemalu atau pendiam?</label>
            <input type="text" class="form-control" name="hal_sifat" id="hal_sifat" aria-describedby="hal_sifat" value="<?= set_value('hal_sifat', $riwayat->hal_sifat); ?>" required>
            <div class="invalid-feedback">
              Field ini harus diisi
            </div>
          </div>

          <div class="form-group">
            <label for="hal_disukai">Hal apa yang disukai ananda?</label>
            <input type="text" class="form-control" name="hal_disukai" id="hal_disukai" aria-describedby="hal_disukai" value="<?= set_value('hal_disukai', $riwayat->hal_disukai); ?>" required>
            <div class="invalid-feedback">
              Field ini harus diisi
            </div>
          </div>

          <div class="form-group">
            <label for="hal_tidak_disukai">Hal apa yang tidak disukai ananda?</label>
            <input type="text" class="form-control" name="hal_tidak_disukai" id="hal_tidak_disukai" aria-describedby="hal_tidak_disukai" value="<?= set_value('hal_tidak_disukai', $riwayat->hal_tidak_disukai); ?>" required>
            <div class="invalid-feedback">
              Field ini harus diisi
            </div>
          </div>

          <button type="submit" class="btn btn-primary btn-block">Simpan Data Riwayat Murid</button>
        </div>
      </div>
    </div>


    <div class="col-md-6">
      <div class="card mb-3">
        <div class="card-header text-primary font-weight-bold">
          Data Orang Tua
        </div>
        <div class="card-body">
          <form action="<?= route_to('ortu.update', $ortu->id_ortu); ?>" method="post" enctype="multipart/form-data" class="needs-validation" novalidate="">
            <?= csrf_field() ?>
            <input type="hidden" name="_method" value="PUT">

            <?php
            $murid = model(Murid::class)->where('id_pengguna', $ortu->id_pengguna)->first();
            ?>

            <div class="row mb-3">
              <div class="col-md-12">
                <h6 class="text-primary font-weight-bold">Data Ayah</h6>
              </div>
            </div>

            <div class="row mb-3">
              <div class="col-md-12">
                <div class="form-group">
                  <label for="nama">Nama</label>
                  <input type="text" class="form-control" name="nama" id="nama" aria-describedby="nama" placeholder="Nama" value="<?= set_value('nama', $ortu->nama) ?>" required>
                  <div class="invalid-feedback">
                    Field ini harus diisi
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="nik">NIK</label>
                  <input type="text" class="form-control" name="nik" id="nik" aria-describedby="nik" placeholder="NIK" value="<?= set_value('nik', $ortu->nik) ?>" required>
                  <div class="invalid-feedback">
                    Field ini harus diisi
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="telepon">Nomor Telepon</label>
                  <input type="text" class="form-control" name="telepon" id="telepon" aria-describedby="telepon" placeholder="Nomor telepon" value="<?= set_value('telepon', $ortu->telepon) ?>" required>
                  <div class="invalid-feedback">
                    Field ini harus diisi
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="pendidikan">Pendidikan</label>
                  <input type="text" class="form-control" name="pendidikan" id="pendidikan" aria-describedby="pendidikan" placeholder="Pendidikan" value="<?= set_value('pendidikan', $ortu->pendidikan) ?>" required>
                  <div class="invalid-feedback">
                    Field ini harus diisi
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="pekerjaan">Pekerjaan</label>
                  <input type="text" class="form-control" name="pekerjaan" id="pekerjaan" aria-describedby="pekerjaan" placeholder="Pekerjaan" value="<?= set_value('pekerjaan', $ortu->pekerjaan) ?>" required>
                  <div class="invalid-feedback">
                    Field ini harus diisi
                  </div>
                </div>
              </div>
            </div>

            <div class="row mb-3">
              <div class="col-md-12">
                <h6 class="text-primary font-weight-bold">Data Ibu</h6>
              </div>
            </div>

            <div class="row mb-3">
              <div class="col-md-12">
                <div class="form-group">
                  <label for="nama_ibu">Nama</label>
                  <input type="text" class="form-control" name="nama_ibu" id="nama_ibu" aria-describedby="nama_ibu" placeholder="Nama" value="<?= set_value('nama_ibu', $ortu->nama_ibu) ?>" required>
                  <div class="invalid-feedback">
                    Field ini harus diisi
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="nik_ibu">NIK</label>
                  <input type="text" class="form-control" name="nik_ibu" id="nik_ibu" aria-describedby="nik_ibu" placeholder="NIK" value="<?= set_value('nik_ibu', $ortu->nik_ibu) ?>" required>
                  <div class="invalid-feedback">
                    Field ini harus diisi
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="telepon_ibu">Nomor Telepon</label>
                  <input type="text" class="form-control" name="telepon_ibu" id="telepon_ibu" aria-describedby="telepon_ibu" placeholder="Nomor telepon" value="<?= set_value('telepon_ibu', $ortu->telepon_ibu) ?>" required>
                  <div class="invalid-feedback">
                    Field ini harus diisi
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="pendidikan_ibu">Pendidikan</label>
                  <input type="text" class="form-control" name="pendidikan_ibu" id="pendidikan_ibu" aria-describedby="pendidikan_ibu" placeholder="Pendidikan" value="<?= set_value('pendidikan_ibu', $ortu->pendidikan_ibu) ?>" required>
                  <div class="invalid-feedback">
                    Field ini harus diisi
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="pekerjaan_ibu">Pekerjaan</label>
                  <input type="text" class="form-control" name="pekerjaan_ibu" id="pekerjaan_ibu" aria-describedby="pekerjaan_ibu" placeholder="Pekerjaan" value="<?= set_value('pekerjaan_ibu', $ortu->pekerjaan_ibu) ?>" required>
                  <div class="invalid-feedback">
                    Field ini harus diisi
                  </div>
                </div>
              </div>
            </div>

            <div class="row mb-3">
              <div class="col-md-12">
                <h6 class="text-primary font-weight-bold">Data Penghasilan</h6>
              </div>
            </div>

            <div class="form-group">
              <label for="penghasilan_ortu">Penghasilan</label>
              <input type="text" class="form-control" name="penghasilan_ortu" id="penghasilan_ortu" aria-describedby="penghasilan_ortu" placeholder="Penghasilan per bulan" value="<?= set_value('penghasilan_ortu', $ortu->penghasilan_ortu) ?>" required>
              <div class="invalid-feedback">
                Field ini harus diisi
              </div>
            </div>

            <button type="submit" class="btn btn-primary btn-block">Simpan Data Orang Tua</button>
          </form>
        </div>
      </div>
      <div class="card">
        <div class="card-header text-primary font-weight-bold">
          Data Berkas
        </div>
        <div class="card-body">
          <form action="<?= route_to('form.dokumen.store'); ?>" method="post" enctype="multipart/form-data" class="needs-validation" novalidate="">
            <?= csrf_field() ?>
            <input type="hidden" name="_method" value="PUT">

            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                  <label for="foto_murid">Foto Murid</label>
                  <input type="file" class="form-control mt-3" name="foto_murid" id="foto_murid" aria-describedby="foto_murid" required>
                  <small class="text-primary">Dengan format JPG/JPEG/PNG/PDF</small>
                  <div>
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
                  <div class="invalid-feedback">
                    Field ini harus diisi
                  </div>
                </div>

                <div class="form-group">
                  <label for="akta_lahir">Akta Lahir</label>
                  <input type="file" class="form-control" name="akta_lahir" id="akta_lahir" aria-describedby="akta_lahir" required>
                  <small class="text-primary">Dengan format JPG/JPEG/PNG/PDF</small>
                  <div>
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
                  <div class="invalid-feedback">
                    Field ini harus diisi
                  </div>
                </div>

                <div class="form-group">
                  <label for="kk">Kartu Keluarga</label>
                  <input type="file" class="form-control" name="kk" id="kk" aria-describedby="kk" required>
                  <small class="text-primary">Dengan format JPG/JPEG/PNG/PDF</small>
                  <div>
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
                  <div class="invalid-feedback">
                    Field ini harus diisi
                  </div>
                </div>

                <button type="submit" class="btn btn-primary btn-block">Simpan Data Berkas</button>
              </div>
            </div>

          </form>
        </div>
      </div>
    </div>
  </div>


</form>
</section>
<?= $this->endSection() ?>

<?= $this->section('js') ?>
<?= $this->include('includes/summernote/js') ?>
<?= $this->endSection() ?>

<?= $this->section('css') ?>
<?= $this->include('includes/summernote/css') ?>
<?= $this->endSection() ?>
