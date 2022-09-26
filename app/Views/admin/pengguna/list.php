<?= $this->extend('layout/admin') ?>

<?= $this->section('content') ?>
<?php

use Carbon\Carbon;
?>

<h1 class="h3 mb-4 text-gray-800"><?= $title ?? ""; ?></h1>

<div class="card">
    <div class="card-header text-right">

    </div>
    <div class="card-body">
        <table class="table" id="tabel">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Kode Pengguna</th>
                    <!-- <th>Nama</th> -->
                    <th>Email</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1 ?>
                <?php foreach ($data as $p) : ?>
                    <tr>
                        <td><?= $i++; ?></td>
                        <td scope="row"><?= $p->kode_pengguna; ?></td>
                        <!-- <td scope="row"><?= $p->nama; ?></td> -->
                        <td scope="row"><?= $p->email; ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
<?= $this->endSection() ?>

<?= $this->section('js') ?>
<?= $this->include('includes/datatables/js') ?>
<?= $this->endSection() ?>

<?= $this->section('css') ?>
<?= $this->include('includes/datatables/css') ?>
<?= $this->endSection() ?>