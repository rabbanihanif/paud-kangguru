<?= $this->extend('layout/admin') ?>

<?= $this->section('content') ?>

<h1 class="h3 mb-4 text-gray-800"><?= $title ?? ""; ?></h1>

<?php
$db = \Config\Database::connect();
$jml_perempuan = $db->table('tb_murid')
    ->where('jenis_kelamin', 'Perempuan')
    ->countAllResults();

$jml_lakilaki = $db->table('tb_murid')
    ->where('jenis_kelamin', 'Laki-laki')
    ->countAllResults();

// $jlm_pendaftar = $db->table('tb_murid')
//     ->where('jenis_kelamin !=',  "NULL")
//     ->countAllResults();

$jlm_formulir = $db->table('tb_murid')
    ->where('jenis_kelamin !=',  "NULL")
    ->countAllResults();

// kelompok 
$jlm_pg = $db->table('tb_murid')
    ->where('kelompok',  'Playgroup')
    ->countAllResults();
$jlm_tka = $db->table('tb_murid')
    ->where('kelompok',  'TK A')
    ->countAllResults();
$jlm_tkb = $db->table('tb_murid')
    ->where('kelompok',  'TK B')
    ->countAllResults();

$jlm_pendaftar = $db->table('tb_pengguna')
    ->where('level',  "ortu")
    ->countAllResults();

$pembayaran_masuk = $db->table('tb_pembayaran')
    ->where('status',  "Sudah bayar")
    ->countAllResults();

$belum_bayar = $db->table('tb_pembayaran')
    ->where('status',  "Belum Bayar")
    ->countAllResults();


// $jlm_pendaftar = $db->table('tb_murid')
//     ->countAllResults();


?>


<div class="row">

    <!-- semua pendaftar paud  -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <a href="<?= route_to('murid.index'); ?>">
                            <div class="text font-weight-bold text-primary text-uppercase mb-1">
                                Data Pendaftar PAUD</div>
                            <div class="h4 mb-0 font-weight-bold text-gray-800"><?= $jlm_pendaftar; ?></div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text font-weight-bold text-primary text-uppercase mb-1">
                            Formulir Terisi</div>
                        <div class="h4 mb-0 font-weight-bold text-gray-800"><?= $jlm_formulir; ?></div>
                    </div>
                </div>
            </div>
        </div>
    </div> -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-info shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <a href="<?= route_to('murid.listpg'); ?>">
                            <div class="text font-weight-bold text-primary text-uppercase mb-1">
                                Murid Playgroup</div>
                            <div class="h4 mb-0 font-weight-bold text-gray-800"><?= $jlm_pg; ?></div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-warning shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <a href="<?= route_to('murid.listtka'); ?>">
                            <div class="text font-weight-bold text-primary text-uppercase mb-1">
                                Murid TK A</div>
                            <div class="h4 mb-0 font-weight-bold text-gray-800"><?= $jlm_tka; ?></div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6 mb-4">

        <div class="card border-left-danger shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <a href="<?= route_to('murid.listtkb'); ?>">
                            <div class="text font-weight-bold text-primary text-uppercase mb-1">
                                Murid TK B</div>
                            <div class="h4 mb-0 font-weight-bold text-gray-800"><?= $jlm_tkb; ?></div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text font-weight-bold text-primary text-uppercase mb-1">
                            Formulir yang terisi</div>
                        <div class="h4 mb-0 font-weight-bold text-gray-800"><?= $jlm_formulir; ?></div>
                    </div>
                </div>
            </div>
        </div>
    </div> -->
    <!-- <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text font-weight-bold text-primary text-uppercase mb-1">
                            Pembayaran Diterima</div>
                        <div class="h4 mb-0 font-weight-bold text-gray-800"><?= $pembayaran_masuk; ?></div>
                    </div>
                </div>
            </div>
        </div>
    </div> -->
    <!-- <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text font-weight-bold text-primary text-uppercase mb-1">
                            Menunggu Pembayaran</div>
                        <div class="h4 mb-0 font-weight-bold text-gray-800"><?= $belum_bayar; ?></div>
                    </div>
                </div>
            </div>
        </div>
    </div> -->

    <!-- pendaftar laki laki  -->
    <!-- <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-dark shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text font-weight-bold text-primary text-uppercase mb-1">
                            Pendaftar Murid Laki-laki</div>
                        <div class="h4 mb-0 font-weight-bold text-gray-800"><?= $jml_lakilaki; ?></div>
                    </div>
                </div>
            </div>
        </div>
    </div> -->

    <!-- pendaftar perempuan  -->
    <!-- <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text font-weight-bold text-primary text-uppercase mb-1">
                            Pendaftar Murid Perempuan</div>
                        <div class="h4 mb-0 font-weight-bold text-gray-800"><?= $jml_perempuan; ?></div>
                    </div>
                </div>
            </div>
        </div>
    </div> -->

</div>



<?= $this->endSection() ?>