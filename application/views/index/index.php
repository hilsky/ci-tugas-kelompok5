<?php
    $this->load->view("/template/header");
?> 
<!doctype html>
<html lang="en">

<head>
   

</head>

<body>
    <div class="container">
        <div class="row mt-2">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <?= form_open_multipart('pendamping/uploaddata') ?>
                        <div class="form-row">
                            <div class="col-4">
                                <input type="file" class="form-control-file" id="importexcel" name="importexcel" accept=".xlsx,.xls">
                            </div>
                            <div class="col">
                                <button type="submit" class="btn btn-primary">Import</button>
                            </div>
                            <div class="col">
                                <?= $this->session->flashdata('pesan'); ?>
                            </div>
                        </div>
                        <?= form_close(); ?>
                    </div>
                </div>
                <div class="card mt-2">
                    <div class="card-body">
                        <form class="mb-4" method="GET" action="">
                            <div class="row">
                                <div class="col-3">
                                    <input type="date" class="form-control" name="tanggalawal">
                                </div>
                                <div class="col-3">
                                    <input type="date" class="form-control" name="tanggalakhir">
                                </div>
                                <div class="col-3">
                                    <button class="btn btn-primary" type="submit"> Cari</button>
                                </div>
                            </div>
                        </form>
                        <?php
                        $tanggalwal = $this->input->get('tanggalawal');
                        $tanggakhir = $this->input->get('tanggalakhir');
                        ?>

                        <?php if (!$tanggalwal && !$tanggakhir) : ?>
                            <a href="<?= base_url('pendamping/mpdf'); ?>" class="btn btn-danger">Export as Pdf</a>
                            <a href="<?= base_url('pendamping/excel'); ?>" class="btn btn-success">Export as Excel</a>
                            <a href="<?= base_url('pendamping/highchart'); ?>" class="btn btn-info">Lihat Grafik</a>
                            <h4 class="text-center mt-2"> Tabel Data Pendamping <?= date('d F Y'); ?> </h4>
                        <?php else : ?>
                            <a href="<?= base_url('pendamping/mpdf?tanggalawal=' . $tanggalwal . '&tanggalakhir=' . $tanggakhir); ?>" class="btn btn-danger">Export Pdf</a>
                            <a href="<?= base_url('pendamping/excel?tanggalawal=' . $tanggalwal . '&tanggalakhir=' . $tanggakhir); ?>" class="btn btn-success">Export Excel</a>
                            <a href="<?= base_url('pendamping/highchart?tanggalawal=' . $tanggalwal . '&tanggalakhir=' . $tanggakhir); ?>" class="btn btn-info">Export Grafik</a>
                            <h4 class="text-center mt-2"> Laporan Daftar Pendamping masuk tanggal <?= $tanggalwal . ' s/d' . $tanggakhir ?> </h4>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="card mt-2">
                    <div class="card-body">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">NIK</th>
                                    <th scope="col">Username</th>
                                    <th scope="col">Nama</th>
                                    <th scope="col">Jenis Kelamin</th>
                                    <th scope="col">Kota</th>
                                    <th scope="col">Tanggal Masuk Data</th>
                                    <th scope="col">Aksi</th>


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
                                        <td><?= $pendamping['jenis_kelamin']; ?></td>
                                        <td><?= $pendamping['kota']; ?></td>
                                        <td><?= date('d F Y', $pendamping['date_created']);  ?></td>

                                        <td>    
                                            <a href="<?= base_url(); ?>pendamping/hapus/<?= $pendamping ['id']; ?>" 
                                            class="badge badge-danger float-right" onclick="return confirm('yakin?');">hapus</a>
                                        </td>

                                        </td>
                                    </tr> <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</body>

</html>
<?php
    $this->load->view("template/footer");
?>