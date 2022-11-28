<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="dash.css">
  <!-- Boxicons CDN Link -->
  <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">          
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
  <link href="https://fonts.googleapis.com/css2?family=Viga&display=swap" rel="stylesheet">

  <title>Input Rekam Medis</title>
  <link rel="icon" type="image/x-icon" href="gambar/favicon.ico">
</head>
<body>
  <div class="sidebar">
    <div class="logo-details">
      <!-- <i class="fa-solid fa-user-doctor"></i> -->
      <img src="gambar/shield-solid.png" alt="" class="mr-3 ml-2">
      <span class="logo_name">DOKi</span>
    </div>
    <ul class="nav-links">
      <li>
        <a href="dashboard.html">
          <i class='bx bx-grid-alt' ></i>
          <span class="links_name">Dashboard</span>
        </a>
      </li>
      <li>
        <a href="obat.php">
          <i class='bx bxs-capsule'></i>
          <span class="links_name">Informasi Obat</span>
        </a>
      </li>
      <li>
        <a href="dokter.php">
          <i class="fa-solid fa-user-doctor"></i>            
          <span class="links_name">Informasi Dokter</span>
        </a>
      </li>
      <li>
        <a href="pasien.php">
          <i class="fa-solid fa-user-injured"></i>
          <span class="links_name">Informasi Pasien</span>
        </a>
      </li>
      <li>
        <a href="perawat.php">
          <i class='bx bxs-user'></i>
          <span class="links_name">Informasi Perawat</span>
        </a>
      </li>
      <li>
        <a href="kamar.php">
          <i class='bx bxs-door-open'></i>
          <span class="links_name">Informasi Kamar</span>
        </a>
      </li>      
      <li>
        <a href="medis.php" class="active">
          <i class='bx bxs-receipt'></i>
          <span class="links_name">Riwayat Rekam Medis</span>
        </a>
      </li>
      <li class="log_out">
        <a href="index.html">
          <i class='bx bx-log-out'></i>
          <span class="links_name">Log out</span>
        </a>
      </li>
    </ul>
  </div>
  <section class="home-section">
    <nav>
      <div class="sidebar-button">
        <i class='bx bx-menu sidebarBtn'></i>
        <span class="dashboard">Input Data</span>
      </div>
      <div class="search-box">
        <input type="text" placeholder="Search...">
        <i class='bx bx-search' ></i>
      </div>
      <div class="profile-details">
        <img src="gambar/potrait.jpg" alt="">
        <span class="admin_name">Ilman Fuada</span>
        <!-- <i class='bx bx-chevron-down' ></i> -->
      </div>
    </nav>

    <div class="home-content">
      <div class="container">
        <?php
        include "koneksi.php";

        function input($data) {
          $data = trim($data);
          $data = stripslashes($data);
          $data = htmlspecialchars($data);
          return $data;
        }

        if ($_SERVER["REQUEST_METHOD"]=="POST") {
          $tanggal=input($_POST["tanggal"]);
          $keluhan=input($_POST["keluhan"]);
          $pemeriksaan=input($_POST["pemeriksaan"]);
          $pengobatan=input($_POST["pengobatan"]);

          $sql="insert into rekam_medis (tanggal,keluhan,pemeriksaan,pengobatan) values('$tanggal','$keluhan','$pemeriksaan','$pengobatan');";

          $hasil=mysqli_query($kon,$sql);

          if ($hasil) {
            header("Location:medis.php");
          } else{
            echo "<div class='alert alert-danger' role='alert'>Data gagal disimpan.</div>";
          }
        }
        ?>      
        <div class="card">
          <div class="card-body">
            <h4 class="card-title" style="text-align: center;">Input Rekam Medis</h4>
            <hr>
            <!-- <p class="card-description">Basic form layout</p> -->
            <form class="forms-sample" action="<?php echo $_SERVER["PHP_SELF"];?>" method="post">
              <div class="form-group">
                <label for="">Tanggal</label>
                <input type="date" class="form-control" placeholder="Tanggal" name="tanggal" />
              </div>
              <div class="form-group">
                <label for="">Keluhan</label>
                <input type="text" class="form-control" placeholder="Keluhan" name="keluhan"/>
              </div>                                
              <div class="form-group mt-2">
                <label for="">Pemeriksaan</label>
                <input type="text" class="form-control"  placeholder="Pemeriksaan" name="pemeriksaan" />
              </div>
              <div class="form-group mt-2">
                <label for="">Pengobatan</label>
                <input type="text" class="form-control"  placeholder="Pengobatan" name="pengobatan" />
              </div>
              <button type="submit" class="btn btn-primary me-2"> Submit </button>
              <button class="btn btn-secondary">Cancel</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </body>
  </html>