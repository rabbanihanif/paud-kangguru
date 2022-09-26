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

<h1 class="h3 mb-4 text-gray-800"><?= $title ?? ""; ?></h1>


<!-- button  -->
<div class="row mb-3">
  <div class="col-md-12 text-right">
    <a name="" id="" class="btn btn-dark btn-sm" href="<?= route_to('pendaftar.index'); ?>" role="button">
      <i class="fa fa-arrow-left" aria-hidden="true"></i>
      Kembali
    </a>
    <a name="" id="" class="btn btn-success btn-sm" href="<?= route_to('pendaftar.print', $murid->id_murid); ?>" role="button" target="_blank">
      <i class="fa fa-print" aria-hidden="true"></i>
      Cetak
    </a>
  </div>
</div>
<!-- end button group  -->

<div class="col-6">

  <!-- data diri murid -->
  <div class="card shadow mb-3">
    <!-- Card Header - Accordion -->
    <a href="#collapseDataDiriMurid" class="d-block card-header py-3 collapsed" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="collapseDataDiriMurid">
      <h6 class="m-0 font-weight-bold text-primary">Data Diri Murid</h6>
    </a>
    <!-- Card Content - Collapse -->
    <div class="collapse show" id="collapseDataDiriMurid">
      <div class="card-body">
        <div class="form-group">
          <label for="nomor_pendaftaran">Nomor Pendaftaran</label>
          <input type="text" class="form-control" name="nomor_pendaftaran" id="nomor_pendaftaran" aria-describedby="nomor_pendaftaran" placeholder="<?= $murid->nomor_pendaftaran; ?>" readonly>
        </div>

        <div class="form-group">
          <label for="status_pendaftar">Status Pendaftar</label>
          <input type="text" class="form-control" name="status_pendaftar" id="status_pendaftar" aria-describedby="status_pendaftar" placeholder="status_pendaftar" value="<?= set_value('status_pendaftar', $murid->status_pendaftar); ?>" readonly disabled>
        </div>

        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label for="nama_lengkap">Nama Lengkap</label>
              <input type="text" class="form-control" name="nama_lengkap" id="nama_lengkap" aria-describedby="nama_lengkap" placeholder="Nama Lengkap" value="<?= set_value('nama_lengkap', $murid->nama_lengkap); ?>" readonly disabled>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label for="nama_panggilan">Nama Panggilan</label>
              <input type="text" class="form-control" name="nama_panggilan" id="nama_panggilan" aria-describedby="nama_panggilan" placeholder="Nama Panggilan" value="<?= set_value('nama_panggilan', $murid->nama_panggilan); ?>" readonly disabled>
            </div>
          </div>
        </div>

        <div class="form-group">
          <label for="nik">NIK</label>
          <input type="number" class="form-control" name="nik" id="nik" aria-describedby="nik" placeholder="NIK" value="<?= set_value('nik', $murid->nik); ?>" readonly disabled>
        </div>

        <div class="form-group">
          <label for="kelompok">Kelompok</label>
          <select class="form-control" name="kelompok" id="kelompok" readonly disabled>
            <option value="">Pilih kelompok</option>
            <option value="Playgroup" <?= set_select('kelompok', 'Playgroup') ?> <?= ($murid->kelompok == 'Playgroup') ? "selected" : ""; ?>>Playgroup</option>
            <option value="TK A" <?= set_select('kelompok', 'TK A') ?> <?= ($murid->kelompok == 'TK A') ? "selected" : ""; ?>>TK A</option>
            <option value="TK B" <?= set_select('kelompok', 'TK B') ?> <?= ($murid->kelompok == 'TK B') ? "selected" : ""; ?>>TK B</option>
          </select>
        </div>

        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label for="tempat_lahir">Tempat Lahir</label>
              <input type="text" class="form-control" name="tempat_lahir" id="tempat_lahir" aria-describedby="tempat_lahir" placeholder="Tempat Lahir" value="<?= set_value('tempat_lahir', $murid->tempat_lahir); ?>" readonly disabled>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label for="tanggal_lahir">Tanggal Lahir</label>
              <input type="date" class="form-control" name="tanggal_lahir" id="tanggal_lahir" aria-describedby="tanggal_lahir" placeholder="Tanggal Lahir" value="<?= set_value('tanggal_lahir', $murid->tanggal_lahir); ?>" readonly disabled>
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
              <input type="text" class="form-control" name="agama" id="agama" aria-describedby="agama" placeholder="Agama" value="<?= set_value('agama', $murid->agama); ?>" readonly disabled>
            </div>
          </div>
        </div>

        <div class="form-group">
          <label for="alamat">Alamat</label>
          <textarea class="form-control" name="alamat" id="alamat" rows="3" readonly disabled><?= set_value('alamat', $murid->alamat); ?></textarea>
        </div>

        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label for="anak_ke">Anak Ke-</label>
              <input type="number" class="form-control" name="anak_ke" id="anak_ke" aria-describedby="anak_ke" placeholder="Anak Ke-" value="<?= set_value('anak_ke', $murid->anak_ke); ?>" readonly disabled>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label for="jumlah_saudara">Jumlah Saudara</label>
              <input type="number" class="form-control" name="jumlah_saudara" id="jumlah_saudara" aria-describedby="jumlah_saudara" placeholder="Jumlah Saudara" value="<?= set_value('jumlah_saudara', $murid->jumlah_saudara); ?>" readonly disabled>
            </div>
          </div>
          <div class="col-md-4">
            <div class="form-group">
              <label for="berat_badan">Berat Badan (kg)</label>
              <input type="text" class="form-control" name="berat_badan" id="berat_badan" aria-describedby="berat_badan" placeholder="Berat Badan" value="<?= set_value('berat_badan', $murid->berat_badan); ?>" readonly disabled>
            </div>
          </div>
          <div class="col-md-4">
            <div class="form-group">
              <label for="tinggi_badan">Tinggai Badan (cm)</label>
              <input type="number" class="form-control" name="tinggi_badan" id="tinggi_badan" aria-describedby="tinggi_badan" placeholder="Tinggai Badan" value="<?= set_value('tinggi_badan', $murid->tinggi_badan); ?>" readonly disabled>
            </div>
          </div>
          <div class="col-md-4">
            <div class="form-group">
              <label for="gol_darah">Golongan Darah</label>
              <select class="form-control" name="gol_darah" id="gol_darah" readonly disabled>
                <option value="">Pilih golongan darah</option>
                <option value="A" <?= set_select('gol_darah', 'A') ?> <?= ($murid->gol_darah == 'A') ? "selected" : ""; ?>>A</option>
                <option value="B" <?= set_select('gol_darah', 'B') ?> <?= ($murid->gol_darah == 'B') ? "selected" : ""; ?>>B</option>
                <option value="AB" <?= set_select('gol_darah', 'AB') ?> <?= ($murid->gol_darah == 'AB') ? "selected" : ""; ?>>AB</option>
                <option value="O" <?= set_select('gol_darah', 'O') ?> <?= ($murid->gol_darah == 'O') ? "selected" : ""; ?>>O</option>
              </select>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>

  <!-- data orang tua  -->
  <div class="card shadow mb-3">
    <!-- Card Header - Accordion -->
    <a href="#collapse3" class="d-block card-header py-3 collapsed" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="collapse3">
      <h6 class="m-0 font-weight-bold text-primary">Orang Tua</h6>
    </a>
    <!-- Card Content - Collapse -->
    <div class="collapse" id="collapse3">
      <div class="card-body">
        <!-- data ortu  -->
        <div class="row mb-3">
          <div class="col-md-12">
            <h6 class="text-primary font-weight-bold">Data Ayah</h6>
          </div>
        </div>

        <div class="row mb-3">
          <div class="col-md-12">
            <div class="form-group">
              <label for="nama">Nama</label>
              <input type="text" class="form-control" name="nama_ayah" id="nama_ayah" aria-describedby="nama_ayah" placeholder="Nama" value="<?= set_value('nama_ayah', $murid->nama_ayah) ?>" readonly disabled>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label for="nik_ayah">NIK</label>
              <input type="text" class="form-control" name="nik_ayah" id="nik_ayah" aria-describedby="nik_ayah" placeholder="NIK" value="<?= set_value('nik_ayah', $murid->nik_ayah) ?>" readonly disabled>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label for="telepon">Nomor Telepon</label>
              <input type="text" class="form-control" name="telepon_ayah" id="telepon_ayah" aria-describedby="telepon_ayah" placeholder="Nomor telepon" value="<?= set_value('telepon_ayah', $murid->telepon_ayah) ?>" readonly disabled>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label for="pendidikan_ayah">Pendidikan</label>
              <input type="text" class="form-control" name="pendidikan" id="pendidikan_ayah" aria-describedby="pendidikan_ayah" placeholder="Pendidikan" value="<?= set_value('pendidikan_ayah', $murid->pendidikan_ayah) ?>" readonly disabled>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label for="pekerjaan_ayah">Pekerjaan</label>
              <input type="text" class="form-control" name="pekerjaan_ayah" id="pekerjaan_ayah" aria-describedby="pekerjaan_ayah" placeholder="Pekerjaan" value="<?= set_value('pekerjaan_ayah', $murid->pekerjaan_ayah) ?>" readonly disabled>
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
              <input type="text" class="form-control" name="nama_ibu" id="nama_ibu" aria-describedby="nama_ibu" placeholder="Nama" value="<?= set_value('nama_ibu', $murid->nama_ibu) ?>" readonly disabled>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label for="nik_ibu">NIK</label>
              <input type="text" class="form-control" name="nik_ibu" id="nik_ibu" aria-describedby="nik_ibu" placeholder="NIK" value="<?= set_value('nik_ibu', $murid->nik_ibu) ?>" readonly disabled>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label for="telepon_ibu">Nomor Telepon</label>
              <input type="text" class="form-control" name="telepon_ibu" id="telepon_ibu" aria-describedby="telepon_ibu" placeholder="Nomor telepon" value="<?= set_value('telepon_ibu', $murid->telepon_ibu) ?>" readonly disabled>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label for="pendidikan_ibu">Pendidikan</label>
              <input type="text" class="form-control" name="pendidikan_ibu" id="pendidikan_ibu" aria-describedby="pendidikan_ibu" placeholder="Pendidikan" value="<?= set_value('pendidikan_ibu', $murid->pendidikan_ibu) ?>" readonly disabled>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label for="pekerjaan_ibu">Pekerjaan</label>
              <input type="text" class="form-control" name="pekerjaan_ibu" id="pekerjaan_ibu" aria-describedby="pekerjaan_ibu" placeholder="Pekerjaan" value="<?= set_value('pekerjaan_ibu', $murid->pekerjaan_ibu) ?>" readonly disabled>
            </div>
          </div>
        </div>
        <!-- end data ortu  -->

        <!-- form penghasilan ortu  -->
        <div class="row mb-3">
          <div class="col-md-12">
            <!-- <h6 class="text-primary font-weight-bold">Penghasilan</h6> -->
            <div class="form-group">
              <label for="penghasilan_ortu">Penghasilan Orang Tua</label>
              <input type="text" class="form-control" name="penghasilan_ortu" id="penghasilan_ortu" aria-describedby="penghasilan_ortu" placeholder="Penghasilan per bulan" value="<?= set_value('penghasilan_ortu', $murid->penghasilan_ortu) ?>" readonly disabled>
            </div>
          </div>
        </div>

      </div>
    </div>
  </div>

  <div class="card shadow mb-3">
    <!-- Card Header - Accordion -->
    <a href="#collapse4" class="d-block card-header py-3 collapsed" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="collapse4">
      <h6 class="m-0 font-weight-bold text-primary">Data Riwayat Murid</h6>
    </a>
    <!-- Card Content - Collapse -->
    <div class="collapse" id="collapse4">
      <div class="card-body">
        <h6 class="text-primary font-weight-bold mb-3">Riwayat Kelahiran</h6>

        <div class="form-group">
          <label for="lama_kandungan">Lama Kandungan</label>
          <input type="text" class="form-control" name="lama_kandungan" id="lama_kandungan" aria-describedby="lama_kandungan" placeholder="Lama Kandungan" value="<?= set_value('lama_kandungan', $riwayat->lama_kandungan); ?>" readonly disabled>
        </div>

        <div class="form-group">
          <label for="jenis_kelahiran">Jenis Kelahiran</label>
          <input type="text" class="form-control" name="jenis_kelahiran" id="jenis_kelahiran" aria-describedby="jenis_kelahiran" placeholder="Jenis Kelahiran" value="<?= set_value('jenis_kelahiran', $riwayat->jenis_kelahiran); ?>" readonly disabled>
        </div>

        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label for="berat_lahir">Berat Lahir (kg)</label>
              <input type="text" class="form-control" name="berat_lahir" id="berat_lahir" aria-describedby="berat_lahir" placeholder="Berat Lahir" value="<?= set_value('berat_lahir', $riwayat->berat_lahir); ?>" readonly disabled>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label for="tinggi_lahir">Tinggi Lahir (cm)</label>
              <input type="number" class="form-control" name="tinggi_lahir" id="tinggi_lahir" aria-describedby="tinggi_lahir" placeholder="Tinggi Lahir" value="<?= set_value('tinggi_lahir', $riwayat->tinggi_lahir); ?>" readonly disabled>
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
          <input type="text" class="form-control" name="hal_kemandirian" id="hal_kemandirian" aria-describedby="hal_kemandirian" value="<?= set_value('hal_kemandirian', $riwayat->hal_kemandirian); ?>" readonly disabled>
        </div>

        <div class="form-group">
          <label for="hal_sifat">Apakah ananda pemalu atau pendiam?</label>
          <input type="text" class="form-control" name="hal_sifat" id="hal_sifat" aria-describedby="hal_sifat" value="<?= set_value('hal_sifat', $riwayat->hal_sifat); ?>" readonly disabled>
        </div>

        <div class="form-group">
          <label for="hal_disukai">Hal apa yang disukai ananda?</label>
          <input type="text" class="form-control" name="hal_disukai" id="hal_disukai" aria-describedby="hal_disukai" value="<?= set_value('hal_disukai', $riwayat->hal_disukai); ?>" readonly disabled>
        </div>

        <div class="form-group">
          <label for="hal_tidak_disukai">Hal apa yang tidak disukai ananda?</label>
          <input type="text" class="form-control" name="hal_tidak_disukai" id="hal_tidak_disukai" aria-describedby="hal_tidak_disukai" value="<?= set_value('hal_tidak_disukai', $riwayat->hal_tidak_disukai); ?>" readonly disabled>
        </div>

      </div>
    </div>
  </div>

  <!-- data berkas -->
  <div class="card shadow mb-3">
    <!-- Card Header - Accordion -->
    <a href="#collapseBerkas" class="d-block card-header py-3 collapsed" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseBerkas">
      <h6 class="m-0 font-weight-bold text-primary">Data Berkas</h6>
    </a>
    <!-- Card Content - Collapse -->
    <div class="collapse" id="collapseBerkas">
      <div class="card-body">
        <!-- foto  -->
        <div class="form-group">
          <label for="foto_murid">
            <h6 class="text-primary font-weight-bold">Foto Murid</h6>
          </label>
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
        </div>
        <!-- akta -->
        <div class="form-group">
          <label for="akta_lahir">
            <h6 class="text-primary font-weight-bold">Akta Lahir</h6>
          </label>
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
        </div>
        <!-- kk -->
        <div class="form-group">
          <label for="kk">
            <h6 class="text-primary font-weight-bold">Kartu Keluarga</h6>
          </label>
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
        </div>
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