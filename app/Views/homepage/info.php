<?php

$db = \Config\Database::connect();
$ta = $db->table('tb_ta')
  ->where('status', '1')
  ->get()->getRowArray();


?>

<main id="main">
  <!-- ======= Breadcrumbs ======= -->
  <div class="breadcrumbs">
    <div class="container">
      <h1>Informasi Pendaftaran</h1>
    </div>
  </div>
  <!-- End Breadcrumbs -->

  <section id="pendaftaran" class="pendaftaran">
    <div class="container">
      <!-- <img src="assets/img/paud-kk.png" alt="paudkk"> -->

      <?php if ($ta['status'] != 1) :  ?>
        <div class="card bg-danger text-white">
          <div class="card-body text-center"><strong>Pendaftaran Murid Baru Tahun ini telah ditutup!</strong></div>
        </div>
      <?php else : ?>
        <div class="card bg-success text-white">
          <!-- <div class="card-body text-center"><strong> ?></strong></div> -->
          <div class="card-body text-center"><strong>Pendaftaran Murid Baru Tahun ajaran <?= $ta['ta'] ?> <a name="daftar" id="daftar" class="btn btn-primary" href="<?= route_to('register'); ?>" role="button"><i class="ri-file-list-3-fill"></i> Mendaftar</a></strong></div>
        </div>
      <?php endif; ?>

      <div class="row mt-4">
        <div class="col-lg-8 col-md-6 d-flex align-items-start">
          <div class="pendaftaran-item">
            <div class="pendaftaran-content">
              <h4>Biaya Masuk/Pendaftaran</h4>
              Rp 3.500.000 untuk Semua Kelompok
              <br>
              <br>
              <h4>Ketentuan umur</h4>
              <ul>
                <li>3-4 Tahun mendaftar ke dalam kelompok Play group</li>
                <li>4-5 Tahun mendaftar ke dalam kelompok TK A</li>
                <li>5-6 Tahun mendaftar ke dalam kelompok TK B</li>
              </ul>
              <br>

              <h4>Alur Pendaftaran Murid Baru</h4>
              <p>
                Halo ayah/bunda, dalam rangka memudahkan orang tua untuk mendaftarkan ananda ke PAUD Kangguru Kecil dan meminimalisir berkerumunan di sekolah, kami kini memberikan fasilitas pendaftaran online dengan cara sebagai berikut :
              </p>
              <ol>
                <li>Mendaftar Akun dengan menggunakan email dan password</li>
                <li>Login akun</li>
                <li>Mengisi formulir pendaftaran</li>
                <li>Mengupload foto, Akta Kelahiran dan Kartu Keluarga</li>
                <li>Upload bukti pembayaran</li>
              </ol>
            </div>
          </div>
        </div>

      </div>

      <br>

    </div>
    </div>
    </div>
  </section>
</main>