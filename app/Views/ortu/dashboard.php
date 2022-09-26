<?= $this->extend('layout/ortu') ?>

<?= $this->section('content') ?>

<h1 class="h3 mb-4 text-gray-800"><?= $title2 ?? ""; ?></h1>

<?php if (session()->getFlashdata('msg')) : ?>
  <div class="alert alert-danger"><?= session()->getFlashdata('msg') ?></div>
<?php endif; ?>
<?php if (session()->getFlashdata('success')) : ?>
  <div class="alert alert-success"><?= session()->getFlashdata('success') ?></div>
<?php endif; ?>


<div class="row">

  <div class="col-md-12">
    <p>Selamat datang! Anda telah masuk ke halaman pendaftaran PAUD Kangguru Kecil.</p>
  </div>

  <div class="col-md-6">
    <table class="table table-bordered">
      <tr>
        <td class="font-weight-bold">Nomor Pendaftaran</td>
        <td><?= $murid->nomor_pendaftaran; ?></td>
      </tr>
      <tr>
        <td class="font-weight-bold">Nama Lengkap</td>
        <td><?= $murid->nama_lengkap; ?></td>
      </tr>
      <tr>
        <td class="font-weight-bold">Status Pendaftaran</td>
        <td>
          <?php
          if (!$murid->status_pendaftar) {
            if (!$cek_murid or !$cek_ortu or !$cek_dokumen) {
              echo "Menunggu kelengkapan data";
            }
          } else {
            echo $murid->status_pendaftar;
          }
          ?>
        </td>
      </tr>
    </table>
  </div>

</div>

<div class="row">
  <div class="col-md-6">
    <div class="card mb-4">
      <div class="card-header">
        <h6 class="m-0 font-weight-bold text-primary">Alur Formulir</h6>
      </div>

      <div class="card-body">
        <?php if ($cek_murid) { ?>
          <!-- <p class="p-2 mb-3 bg-success font-weight-bold text-white">Anda sudah mengisi formulir pendaftaran.</p> -->
          <div class="alert alert-success d-flex align-items-center"><i class="fas fa-check-circle mr-2"></i>Anda sudah mengisi formulir pendaftaran</div>
          <!-- <div class="bg-success btn-icon-split mb-2">
            <span class="icon text-white-50">
              <i class="fas fa-check"></i>
            </span>
            <span class="text text-white">mengisi formulir pendaftaran</span>
          </div> -->
        <?php } else { ?>
          <!-- <p class="p-2 mb-3 bg-warning font-weight-bold text-dark">Anda belum mengisi formulir pendaftaran.</p> -->
          <div class="alert alert-warning d-flex align-items-center"><i class="fas fa-exclamation-triangle mr-2"></i>Anda belum mengisi formulir pendaftaran.</div>
        <?php } ?>

        <? #php if ($cek_ortu) { 
        ?>
        <!-- <p class="p-2 mb-3 bg-success font-weight-bold text-white">Anda sudah mengisi formulir pendaftaran data orang tua.</p> -->
        <? #php } else { 
        ?>
        <!-- <p class="p-2 mb-3 bg-warning font-weight-bold text-dark">Anda belum mengisi formulir pendaftaran data orang tua.</p> -->
        <? #php } 
        ?>

        <?php if ($cek_dokumen) { ?>
          <!-- <p class="p-2 mb-3 bg-success font-weight-bold text-white">Anda sudah upload berkas persyaratan murid.</p> -->
          <div class="alert alert-success d-flex align-items-center"><i class="fas fa-check-circle mr-2"></i>Anda sudah upload berkas persyaratan murid</div>
        <?php } else { ?>
          <!-- <p class="p-2 mb-3 bg-warning font-weight-bold text-dark">Anda belum upload berkas persyaratan.</p> -->
          <div class="alert alert-warning d-flex align-items-center"><i class="fas fa-exclamation-triangle mr-2"></i>Anda belum upload berkas persyaratan.</div>
        <?php } ?>
      </div>
    </div>


    <!-- info status pembayaran  -->
    <div class="card mb-4">
      <div class="card-header">
        <h6 class="m-0 font-weight-bold text-primary">Status Pembayaran</h6>
      </div>

      <div class="card-body">
        <?php if ($cek_pembayaran) { ?>
          <?php if ($pembayaran->status == "Lapor bayar") : ?>
            <!-- <p class="p-2 mb-3 bg-success font-weight-bold text-white"><i class="fas fa-check-circle"></i>Anda sudah upload bukti pembayaran</p> -->
            <div class="alert alert-primary d-flex align-items-center"><i class="fas fa-clock mr-2"></i>Anda sudah upload bukti pembayaran,&nbsp; menunggu konfirmasi admin</div>
            <!-- <i class="fas fa-check-circle mr-2"></i> -->
            <!-- <div class="card py-1 border-left-success">
              <div class="card-body">Anda sudah upload bukti pembayaran.</div>
            </div> -->
          <?php endif; ?>
          <?php if ($pembayaran->status == "Sudah bayar") : ?>
            <!-- <p class="p-2 mb-3 bg-success font-weight-bold text-white">Pembayaran sudah dikonfirmasi. Selamat pendaftaran anda sudah diterima</p> -->

            <div class="alert alert-success" role="alert">
              <!-- <h4 class="alert-heading font-weight-bold"></h4> -->
              <p class="mb-0 font-weight-bold"><i class="fas fa-check-circle mr-2"></i>Selamat Pembayaran dan pendaftaran anda sudah diterima</p>
              <hr>
              <p class="mb-0">Selanjutnya harap ayah/bunda datang kesekolah untuk mengambil baju seragam, Terima kasih!</p>
              <!-- <a name="" id="" class="btn btn-success btn-sm" href="<?= route_to('cetakbukti', $murid->id_murid); ?>" role="button" target="_blank">
                <i class="fa fa-print" aria-hidden="true"></i>
                Cetak Bukti
              </a> -->
            </div>

            <!-- <div class="card py-1 border-left-success">
                <div class="card-body">Pembayaran sudah dikonfirmasi. <strong>Selamat pendaftaran anda sudah diterima</strong></div>
              </div> -->

          <?php endif; ?>
        <?php } else { ?>
          <!-- <p class="p-2 mb-3 bg-warning font-weight-bold text-dark">Anda belum melakukan konfirmasi pembayaran.</p> -->
          <!-- <p class="p-2 mb-3 bg-warning font-weight-bold text-dark">Anda belum melakukan konfirmasi bukti pembayaran.</p> -->
          <div class="alert alert-warning d-flex align-items-center"><i class="fas fa-exclamation-triangle mr-2"></i>Anda belum melakukan konfirmasi bukti pembayaran.</div>

        <?php } ?>
      </div>
    </div>
  </div>
  <div class="col-4">


  </div>
</div>

<?= $this->endSection() ?>