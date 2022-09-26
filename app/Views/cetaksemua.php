<?= $this->extend('layout/print_semua') ?>

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




<section>
    <div class="d-flex align-items-center">
        <div class="flex-shrink-0">
            <img src="<?= base_url('assets/img/logo/logo.svg'); ?>" alt="logo" width="150">
        </div>
        <div class="flex-grow-1 ms-3 text-center">
            <h2 class="font-weight-bold">PAUD Kangguru Kecil</h2>
            <h3 class="font-weight-bold">Laporan Hasil Pendaftaran Murid Baru</h3>
        </div>
    </div>
    <br>

    <?php
    $no = 1;
    for ($i = 0; $i < 1; $i++) {
    ?>
        <table class="table table-bordered" id="tabel">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nomor Pendaftaran</th>
                    <th>Nama Murid</th>
                    <th>Kelompok</th>
                    <th>Kelamin</th>
                    <th>Tanggal Lahir(Umur)</th>
                    <!-- <th>Tanggal Daftar</th> -->
                    <th>Status</th>
                    <!-- <th>#</th> -->
                </tr>
            </thead>
            <tbody>
                <?php foreach ($murid as $d) : ?>
                    <?php $birthDate = $d->tanggal_lahir;

                    $currentDate = date("d-m-Y");

                    $age = date_diff(date_create($birthDate), date_create($currentDate));
                    ?>
                    <tr>
                        <td><?= $no++; ?></td>
                        <td><?= $d->nomor_pendaftaran ?? "N/A"; ?></td>
                        <td scope="row"><?= $d->nama_lengkap ?? "N/A"; ?></td>
                        <td scope="row"><?= $d->kelompok ?? "N/A"; ?></td>
                        <td scope="row"><?= $d->jenis_kelamin ?? "N/A"; ?></td>
                        <td scope="row"><?= $d->tanggal_lahir ?? "N/A"; ?> (<?= $age->format('%y'); ?> Tahun)</td>

                        <!-- <td><?= Carbon::parse($d->created_at)->format('d F Y'); ?></td> -->
                        <td scope="row"><?= $d->status_pendaftar ?? "N/A"; ?></td>
                    </tr>

                <?php endforeach; ?>
            </tbody>
        </table>
        <p style="page-break-after: always;">&nbsp;</p>

    <?php } ?>

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