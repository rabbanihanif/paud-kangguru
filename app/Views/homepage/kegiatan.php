<main id="main">
  <!-- ======= Breadcrumbs ======= -->
  <div class="breadcrumbs">
    <div class="container">
      <h1 class="text-center">Kegiatan</h1>
    </div>
  </div>
  <!-- End Breadcrumbs -->

  <!-- ======= artikel Section ======= -->
  <section id="artikel" class="artikel">
    <div class="container">
      <div class="row">
        <?php

        use Carbon\Carbon; ?>
        <?php if (!$data) { ?>
          <div class="col-lg-12 pt-5 pt-lg-0 order-2 order-lg-1 content text-center">
            <h2>Belum ada data berita/kegiatan</h2>
          <?php } ?>
          <?php foreach ($data as $d) : ?>
            <div class="col-lg-4 col-md-6 d-flex align-items-start">
              <div class="artikel-item">
                <img src="<?= base_url('uploads/' . $d->gambar); ?>" class="img-fluid" alt="<?= $d->judul; ?>" />
                <div class="artikel-content">
                  <p><i class="ri-calendar-line"></i> <?= Carbon::parse($d->updated_at)->format('d F Y'); ?></p>
                  <h3><a href="<?= route_to('kegiatan.detail', $d->id_berita); ?>"><?= $d->judul; ?></a></h3>
                  <p>
                    <?= word_limiter($d->deskripsi, 12); ?>
                  </p>
                  <!-- <a href="<?= route_to('kegiatan.detail', $d->id_berita); ?>">Selengkapnya</a> -->
                </div>
              </div>
            </div>
          <?php endforeach; ?>
          </div>
      </div>
  </section>
  <!-- End artikel Section -->
</main>
<!-- End #main -->