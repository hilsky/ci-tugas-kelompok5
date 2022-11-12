<?php
header("Content-type:application/octet-stream/");

header("Content-Disposition:attachment; filename=$title.xls");

header("Pragma: no-cache");

header("Expires: 0");
?>
<h3> Laporan Pendamping Masuk Tanggal : <?= date('d F Y'); ?> </h3>
<table border="1" width="100%">
    <thead>
        <tr>
            <th>No</th>
            <th>NIK</th>
            <th>Username</th>
            <th>Nama</th>
            <th>Kota</th>
            <th>Jenis Kelamin</th>
            <th>Tanggal Masuk Data</th>
        </tr>
    </thead>
    <tbody>
        <?php $i = 1;
        foreach ($semuapendamping as $pendamping) : ?>
            <tr>
                <td><?= $i++; ?></td>
                <td><?= $pendamping['nik']; ?></td>
                <td><?= $pendamping['username']; ?></td>
                <td><?= $pendamping['nama']; ?></td>
                <td><?= $pendamping['kota']; ?></td>
                <td><?= $pendamping['jenis_kelamin']; ?></td>
                <td><?= date('d F Y', $pendamping['date_created']); ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>

</table>