<?php
include 'koneksi.php';
include 'header.php';

$id = $_GET['id'];
$dts2 = mysqli_fetch_assoc(mysqli_query($conn1, "SELECT * FROM sakit WHERE id_sakit =  '$id' "));
$nis = $dts2['nis'];
$dts = mysqli_fetch_assoc(mysqli_query($conn3, "SELECT * FROM tb_santri WHERE nis =  '$nis' "));
?>

<main id="main" class="main">

  <div class="pagetitle">
    <h1>Profile Santri</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
        <li class="breadcrumb-item">Data Santri</li>
        <li class="breadcrumb-item active">Profile Santri</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  <section class="section profile">
    <div class="row">
      <div class="col-xl-4">

        <div class="card">
          <div class="card-body profile-card pt-4 d-flex flex-column ">

            <h3>
              <?= $dts['nama']; ?>
            </h3>
            <h3>
              <?= $dts['desa'] . ' - ' . $dts['kec'] . ' - ' . $dts['kab']; ?>
            </h3>
            <h3>
              <?= $dts['komplek'] . ' - ' . $dts['kamar']; ?>
            </h3>
            <h3>
              <?= $dts['k_formal'] . ' - ' . $dts['jurusan'] . ' - ' . $dts['r_formal'] . ' - ' . $dts['t_formal']; ?>
            </h3>
            <div class="social-links mt-2">

            </div>
          </div>
        </div>

      </div>

      <div class="col-xl-8">

        <div class="card">
          <div class="card-body pt-3">
            <!-- Bordered Tabs -->
            <ul class="nav nav-tabs nav-tabs-bordered">

              <li class="nav-item">
                <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-overview">Detail Sakit</button>
              </li>


            </ul>
            <div class="tab-content pt-2">

              <div class="tab-pane fade show active profile-overview" id="profile-overview">
                <h5 class="card-title">Detail Sakit Santri</h5>

                <div class="row">
                  <div class="col-lg-3 col-md-4 label">DS</div>
                  <div class="col-lg-9 col-md-8"><?= $dts2['ds']; ?></div>
                </div>

                <div class="row">
                  <div class="col-lg-3 col-md-4 label">DO</div>
                  <div class="col-lg-9 col-md-8"><?= $dts2['do']; ?></div>
                </div>

                <div class="row">
                  <div class="col-lg-3 col-md-4 label">Tanggal Sakit</div>
                  <div class="col-lg-9 col-md-8"><?= date('d-M-Y', strtotime($dts2['tgl_sakit'])); ?></div>
                </div>

                <div class="row">
                  <div class="col-lg-3 col-md-4 label">Kategori</div>
                  <div class="col-lg-9 col-md-8"><?= $dts2['kategori']; ?></div>
                </div>

              </div>


            </div><!-- End Bordered Tabs -->

          </div>
        </div>

      </div>
    </div>
  </section>

</main><!-- End #main -->

<?php include 'footer.php'; ?>