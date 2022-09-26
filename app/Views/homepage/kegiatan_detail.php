<?php

use Carbon\Carbon;
?>
<main id="main">
  <!-- ======= Breadcrumbs ======= -->

  <div class="breadcrumbs" data-aos="fade-in">
    <div class="container">
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="<?= route_to('kegiatan'); ?>">Kegiatan</a></li>
          <li class="breadcrumb-item active" aria-current="page"><?= $data->judul; ?></li>
        </ol>
      </nav>
    </div>
  </div>
  <!-- End Breadcrumbs -->

  <!-- ======= course Details Section ======= -->
  <section id="artikel-details" class="artikel-details">
    <div class="container" data-aos="fade-up">
      <div class="row">
        <div class="col-md-8">
          <h3><?= $data->judul; ?></h3>
          <p><i class="ri-calendar-line"></i> <?= Carbon::parse($data->updated_at)->format('d F Y, H:i'); ?></p>

          <p>
            <?= $data->deskripsi; ?>
          </p>
        </div>
        <div class="col-md-4">
          <img src="<?= base_url('uploads/' . $data->gambar); ?>" class="img-fluid" width="600" alt="<?= $data->judul; ?>" />
        </div>
      </div>
    </div>
  </section>
  <!-- End course Details Section -->
</main>