<?php
include 'header.php';
include 'koneksi.php';
?>
<main id="main" class="main">

    <div class="pagetitle">
        <h1>Data Santri</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                <li class="breadcrumb-item">Data Santri</li>
                <li class="breadcrumb-item active">Putri</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">

            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Data Santri Putri Aktif</h5>
                        <!-- Primary Color Bordered Table -->
                        <div class="table-responsive">
                            <table class="table datatable table-sm">
                                <thead>
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">Nama</th>
                                        <th scope="col">#</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    $sql = mysqli_query($conn3, "SELECT * FROM tb_santri WHERE jkl = 'Perempuan' AND aktif = 'Y' ");
                                    foreach ($sql as $ar) : ?>
                                        <tr>
                                            <th scope="row"><?= $no++; ?></th>
                                            <td><?= $ar['nama']; ?></td>
                                            <td><a href="detail_santri.php?nis=<?= $ar['nis']; ?>" class="btn btn-sm btn-primary"><i class=""></i> Detail</a></td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

</main><!-- End #main -->

<?php include 'footer.php'; ?>