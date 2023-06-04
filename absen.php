<?php
include 'header.php';
include 'koneksi.php';
$bn = array("", "Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember");

?>
<main id="main" class="main">

    <div class="pagetitle">
        <h1>Info Santri</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                <li class="breadcrumb-item">Info Santri</li>
                <li class="breadcrumb-item active">Absen Formal</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">

            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Data Absensi Formal</h5>
                        <!-- Primary Color Bordered Table -->
                        <div class="table-responsive">
                            <table class="table datatable table-sm">
                                <thead>
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">Ket Absen</th>
                                        <th scope="col">Sekolah</th>
                                        <th scope="col">#</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    $sql2 = mysqli_query($conn, "SELECT a.* FROM absen a JOIN tb_santri b ON a.nis=b.nis WHERE b.aktif = 'Y' GROUP BY a.tanggal ORDER BY a.tanggal DESC ");

                                    while ($row = mysqli_fetch_assoc($sql2)) {
                                        // $kls = $row['k_formal'];
                                        $mg = $row['minggu'];
                                        $bl = $row['bulan'];
                                        $ta = $row['ta'];
                                        $sqlr = mysqli_query($conn, "SELECT * FROM absen WHERE minggu = $mg AND bulan = $bl AND ta = '$ta' GROUP BY lembaga ");
                                    ?>
                                        <tr>
                                            <td><?= $no++ ?></td>
                                            <td>
                                                <span class="badge bg-info">Minggu ke-<?= $row['minggu'] ?></span>
                                                <span class="badge bg-dark"><?= $bn[$row['bulan']] ?></span>
                                                <span class="badge bg-primary"><?= $row['ta'] ?></span>
                                            </td>

                                            <td>
                                                <?php
                                                while ($lm = mysqli_fetch_assoc($sqlr)) {
                                                    if ($lm['lembaga'] === 'MTs') {
                                                        $warna = 'dark';
                                                    } else if ($lm['lembaga'] === 'SMP') {
                                                        $warna = 'success';
                                                    } else if ($lm['lembaga'] === 'MA') {
                                                        $warna = 'info';
                                                    } else if ($lm['lembaga'] === 'SMK') {
                                                        $warna = 'warning';
                                                    }
                                                    echo "<span class='badge bg-" . $warna . "'>" . $lm['lembaga'] . "</span>";
                                                }
                                                ?>
                                            </td>
                                            <td></td>
                                        </tr>
                                    <?php } ?>
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