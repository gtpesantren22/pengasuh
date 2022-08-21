<?php
include 'koneksi.php';
include 'header.php';

$nis = $_GET['nis'];
$dts = mysqli_fetch_assoc(mysqli_query($conn3, "SELECT * FROM tb_santri WHERE nis =  '$nis' "));
$dts2 = mysqli_fetch_assoc(mysqli_query($conn3, "SELECT * FROM lemari_data WHERE nis =  '$nis' "));
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
          <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">

            <img src="assets/img/profile-img.jpg" alt="Profile" class="rounded-circle">
            <h2>
              <center><?= $dts['nama']; ?></center>
            </h2>
            <h3>
              <center><?= $dts['nis']; ?></center>
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
                <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-overview">Identitas</button>
              </li>

              <li class="nav-item">
                <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-edit">Pendidikan</button>
              </li>

              <li class="nav-item">
                <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-settings">Domisili</button>
              </li>

            </ul>
            <div class="tab-content pt-2">

              <div class="tab-pane fade show active profile-overview" id="profile-overview">
                <h5 class="card-title">Identitas Lengkap</h5>

                <div class="row">
                  <div class="col-lg-3 col-md-4 label ">No. NIK</div>
                  <div class="col-lg-9 col-md-8"><?= $dts['nik']; ?></div>
                </div>
                <div class="row">
                  <div class="col-lg-3 col-md-4 label ">No. KK</div>
                  <div class="col-lg-9 col-md-8"><?= $dts['no_kk']; ?></div>
                </div>

                <div class="row">
                  <div class="col-lg-3 col-md-4 label">Nama Lengkap</div>
                  <div class="col-lg-9 col-md-8"><?= $dts['nama']; ?></div>
                </div>

                <div class="row">
                  <div class="col-lg-3 col-md-4 label">Tetala</div>
                  <div class="col-lg-9 col-md-8"><?= $dts['tempat'] . ', ' . $dts['tanggal']; ?></div>
                </div>

                <div class="row">
                  <div class="col-lg-3 col-md-4 label">Alamat</div>
                  <div class="col-lg-9 col-md-8"><?= $dts['desa'] . ' - ' . $dts['kec'] . ' - ' . $dts['kab']; ?></div>
                </div>

                <div class="row">
                  <div class="col-lg-3 col-md-4 label">Jenis Kelamin</div>
                  <div class="col-lg-9 col-md-8"><?= $dts['jkl']; ?></div>
                </div>

                <div class="row">
                  <div class="col-lg-3 col-md-4 label">Nama Bapak</div>
                  <div class="col-lg-9 col-md-8"><?= $dts['bapak']; ?></div>
                </div>

                <div class="row">
                  <div class="col-lg-3 col-md-4 label">Nama Ibu</div>
                  <div class="col-lg-9 col-md-8"><?= $dts['ibu']; ?></div>
                </div>

                <div class="row">
                  <div class="col-lg-3 col-md-4 label">Anak ke</div>
                  <div class="col-lg-9 col-md-8"><?= $dts['anak_ke'] . ' dari ' . $dts['jml_sdr'] . ' bersaudara'; ?></div>
                </div>

                <div class="row">
                  <div class="col-lg-3 col-md-4 label">No. HP</div>
                  <div class="col-lg-9 col-md-8"><?= $dts['hp']; ?></div>
                </div>

              </div>

              <div class="tab-pane fade profile-overview" id="profile-edit">

                <h5 class="card-title">Pendidikan Santri di Pesantren</h5>

                <div class="row">
                  <div class="col-lg-3 col-md-4 label">Kelas Formal</div>
                  <div class="col-lg-9 col-md-8"><?= $dts['k_formal'] . '-' . $dts['r_formal'] . '  ' . $dts['t_formal']; ?></div>
                </div>
                <div class="row">
                  <div class="col-lg-3 col-md-4 label ">Jurusan/Keahlian</div>
                  <div class="col-lg-9 col-md-8"><?= $dts['jurusan']; ?></div>
                </div>
                <div class="row">
                  <div class="col-lg-3 col-md-4 label ">Kelas Madin</div>
                  <div class="col-lg-9 col-md-8"><?= $dts['k_madin'] . ' - ' . $dts['r_madin']; ?></div>
                </div>


              </div>

              <div class="tab-pane fade profile-overview" id="profile-settings">

                <h5 class="card-title">Domisili Santri di Pesantren</h5>

                <div class="row">
                  <div class="col-lg-3 col-md-4 label">Komplek/Daerah</div>
                  <div class="col-lg-9 col-md-8"><?= $dts['komplek']; ?></div>
                </div>
                <div class="row">
                  <div class="col-lg-3 col-md-4 label ">Kamar</div>
                  <div class="col-lg-9 col-md-8"><?= $dts['kamar']; ?></div>
                </div>
                <div class="row">
                  <div class="col-lg-3 col-md-4 label ">No. Lemari</div>
                  <div class="col-lg-9 col-md-8"><?= $dts2['lemari']; ?></div>
                </div>
                <div class="row">
                  <div class="col-lg-3 col-md-4 label ">No. Loker</div>
                  <div class="col-lg-9 col-md-8"><?= $dts2['loker']; ?></div>
                </div>
                <div class="row">
                  <div class="col-lg-3 col-md-4 label ">Nama Wali Asuh</div>
                  <div class="col-lg-9 col-md-8"><?= $dts2['wali']; ?></div>
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