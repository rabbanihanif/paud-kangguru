<?php



header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=Data Pendaftar.xls");
?>

<?php

use Carbon\Carbon;


?>

<html>

<body>
    <table border=1>
        <thead>
            <tr>
                <th>Nomor Pendaftaran</th>
                <th>Nama Murid</th>
                <th>Kelompok</th>
                <th>Kelamin</th>
                <th>Tanggal Daftar</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($murid as $d) : ?>
                <tr>
                    <td scope="row"><?= $d->nomor_pendaftaran ?? "N/A"; ?></td>
                    <td scope="row"><?= $d->nama_lengkap ?? "N/A"; ?></td>
                    <td scope="row"><?= $d->kelompok ?? "N/A"; ?></td>
                    <td scope="row"><?= $d->jenis_kelamin ?? "N/A"; ?></td>
                    <td><?= Carbon::parse($d->created_at)->format('d F Y, H:i A'); ?></td>
                    <td scope="row"><?= $d->status_pendaftar ?? "N/A"; ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>

</html>