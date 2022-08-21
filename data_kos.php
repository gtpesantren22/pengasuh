<?php
include 'header.php';
include 'koneksi.php';

$jml = mysqli_query($conn3, "SELECT COUNT(*) AS jml, ket, CASE
                                    WHEN ket = 0 THEN  'Bayar Normal'
                                    WHEN ket = 1 THEN  'Ustad/ustadzah'
                                    WHEN ket = 2 THEN  'Khaddam'
                                    WHEN ket = 3 THEN  'Gratis'
                                    WHEN ket = 4 THEN  'Mahasiswa' END AS nm_tmp
                                    FROM tb_santri WHERE t_kos = $tempat_kos AND aktif = 'Y' GROUP BY ket ");
?>
<main id="main" class="main">

    <div class="pagetitle">
        <h1>Dekosan Santri</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                <li class="breadcrumb-item">Dekosan Santri</li>
                <li class="breadcrumb-item active">Data Santri</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">

            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Data Santri Yang Dekosan kesaya</h5>
                        <!-- Primary Color Bordered Table -->

                        <div class="accordion" id="accordionExample">
                            <?php foreach ($jml as $dts) : ?>
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="headingOne">
                                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne<?= $dts['ket']; ?>" aria-expanded="true" aria-controls="collapseOne">
                                            <strong><?= $dts['nm_tmp']; ?>
                                                <span class="badge bg-primary rounded-pill pull-right"><?= $dts['jml']; ?> santri</span></strong>
                                        </button>
                                    </h2>
                                    <div id="collapseOne<?= $dts['ket']; ?>" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                        <div class="accordion-body">
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
                                                        $ket = $dts['ket'];

                                                        $sql = mysqli_query($conn3, "SELECT * FROM tb_santri WHERE aktif = 'Y' AND ket = $ket AND t_kos = $tempat_kos ");
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
                                                            </tr>
                                                        <?php endforeach; ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div><!-- End Default Accordion Example -->
                    </div>
                </div>
            </div>
        </div>
    </section>

</main><!-- End #main -->

<?php include 'footer.php'; ?>