<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Daftar Pendamping</title>
</head>

<body>
    Tanggal Cetak : <?= date('d F Y'); ?>
    <table width="100%" style="border: 0.1mm solid #000000;" cellpaddin="8">
        <thead>
            <tr>
                <th>No</th>
                <th>NIK</th>
                <th>Username</th>
                <th>Nama</th>
                <th>Kota</th>
                <th>Jenis Kelamin</th>
                <th>Tanggal</th>
            </tr>
        </thead>
        <tbody>
            <?php $i = 1;
            foreach ($semuapendamping as $pendamping) : ?>
                <tr>
                    <td>&nbsp;<?= $i ?></td>
                    <td>&nbsp;&nbsp;
                        <?= $pendamping['nik']; ?></td>
                    <td>&nbsp;&nbsp;
                        <?= $pendamping['username']; ?>&nbsp;&nbsp;&nbsp;</td>
                         <td>&nbsp;&nbsp;
                        <?= $pendamping['nama']; ?></td>
                        <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <?= $pendamping['kota']; ?></td>
                    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <?= $pendamping['jenis_kelamin']; ?>&nbsp;&nbsp;&nbsp;&nbsp;</td>
                    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <?= date('d F Y', $pendamping['date_created']);  ?>&nbsp;&nbsp;&nbsp;</td>
                </tr>
            <?php $i++;
            endforeach; ?>
        </tbody>
    </table>
</body>

</html>