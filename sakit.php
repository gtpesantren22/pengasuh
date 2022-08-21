<?php
include 'header.php';
include 'koneksi.php';
?>
<main id="main" class="main">

    <div class="pagetitle">
        <h1>Info Santri</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                <li class="breadcrumb-item">Info Santri</li>
                <li class="breadcrumb-item active">Putri sakit</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">

            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Data Santri sakit (Putra)</h5>
                        <!-- Primary Color Bordered Table -->
                        <div class="table-responsive">
                            <table class="table datatable table-sm">
                                <thead>
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">Nama</th>
                                        <th scope="col">Sekolah</th>
                                        <th scope="col">#</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    $sql = mysqli_query($conn1, "SELECT a.*, b.nama, b.t_formal FROM sakit a JOIN tb_santri b ON a.nis=b.nis WHERE b.jkl = 'Laki-laki' AND b.aktif = 'Y' AND a.status = 'Sakit' ORDER BY b.t_formal ASC ");
                                    foreach ($sql as $ar) :
                                        if ($ar['t_formal'] == 'MTs') {
                                            $bg = 'secondary';
                                        } else if ($ar['t_formal'] == 'SMP') {
                                            $bg = 'success';
                                        } else if ($ar['t_formal'] == 'MA') {
                                            $bg = 'primary';
                                        } else if ($ar['t_formal'] == 'SMK') {
                                            $bg = 'warning';
                                        } else if ($ar['t_formal'] == 'Mahasiswa') {
                                            $bg = 'danger';
                                        }
                                    ?>
                                        <tr>
                                            <th scope="row"><?= $no++; ?></th>
                                            <td><?= $ar['nama']; ?></td>
                                            <td><span class="badge bg-<?= $bg; ?>"><?= $ar['t_formal']; ?></span></td>
                                            <td><a href="detail_sakit.php?id=<?= $ar['id_sakit']; ?>" class="btn btn-sm btn-primary"><i class=""></i> Detail</a></td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Data Santri sakit (Putri)</h5>
                        <!-- Primary Color Bordered Table -->
                        <div class="table-responsive">
                            <table class="table datatable table-sm">
                                <thead>
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">Nama</th>
                                        <th scope="col">Sekolah</th>
                                        <th scope="col">#</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    $sql = mysqli_query($conn1, "SELECT a.*, b.nama, b.t_formal FROM sakit a JOIN tb_santri b ON a.nis=b.nis WHERE b.jkl = 'Perempuan' AND b.aktif = 'Y' AND a.status = 'Sakit' ORDER BY b.t_formal ASC ");
                                    foreach ($sql as $ar) :
                                        if ($ar['t_formal'] == 'MTs') {
                                            $bg = 'secondary';
                                        } else if ($ar['t_formal'] == 'SMP') {
                                            $bg = 'success';
                                        } else if ($ar['t_formal'] == 'MA') {
                                            $bg = 'primary';
                                        } else if ($ar['t_formal'] == 'SMK') {
                                            $bg = 'warning';
                                        } else if ($ar['t_formal'] == 'Mahasiswa') {
                                            $bg = 'danger';
                                        }
                                    ?>
                                        <tr>
                                            <th scope="row"><?= $no++; ?></th>
                                            <td><?= $ar['nama']; ?></td>
                                            <td><span class="badge bg-<?= $bg; ?>"><?= $ar['t_formal']; ?></span></td>
                                            <td><a href="detail_sakit.php?id=<?= $ar['id_sakit']; ?>" class="btn btn-sm btn-primary"><i class=""></i> Detail</a></td>
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