<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="dash.css">
  <!-- Boxicons CDN Link -->
  <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">    
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
  <link href="https://fonts.googleapis.com/css2?family=Viga&display=swap" rel="stylesheet">

  <title>Riwayat Rekam Medis</title>
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
        <span class="dashboard">List Riwayat</span>
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
        <div class="card">
          <div class="card-body">
            <h5 class="card-title mb-4" style="text-align: center;">List Riwayat</h5>
            <hr>
            <?php
            include "koneksi.php";

            if (isset($_GET['id_medis'])) {
              $id_medis=htmlspecialchars($_GET["id_medis"]);

              $sql="delete from rekam_medis where id_medis='$id_medis'";
              $hasil=mysqli_query($kon,$sql);

              if ($hasil) {
                header("Location:medis.php");
              }
              else{
                echo "<div class='alert alert-danger'>Data Gagal Dihapus.</div>";
              }
            }
            ?>
            <div class="table-responsive">
              <table class="table table-bordered table-hover">
                <br>
                <thead class="bg-primary text-white">
                  <tr>
                    <th>ID</th>
                    <th>Tanggal</th>
                    <th>Keluhan</th>
                    <!-- <th>Date</th> -->
                    <th>Pemeriksaan</th>
                    <th>Pengobatan</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <?php
                include "koneksi.php";
                $sql="select*from rekam_medis order by tanggal desc";
                $hasil=mysqli_query($kon,$sql);
                $no=0;
                while ($data = mysqli_fetch_array($hasil)) {
                  $no++;
                  ?>
                  <tbody>
                    <tr>
                      <td><?php echo $no;?></td>
                      <td><?php echo $data["tanggal"]; ?></td>
                      <td><?php echo $data["keluhan"]; ?></td>
                      <td><?php echo $data["pemeriksaan"]; ?></td>
                      <td><?php echo $data["pengobatan"]; ?></td>
                      <td>
                        <a href="medisu.php?id_medis=<?php echo htmlspecialchars($data['id_medis']); ?>" class="btn btn-warning" role="button"><i class='bx bxs-edit'></i>Update</a>
                        <a href="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>?id_medis=<?php echo $data['id_medis']; ?>" class="btn btn-danger" role="button"><i class='bx bxs-trash-alt'></i>Delete</a>
                      </td>
                    </tr>
                  </tbody>
                  <?php
                }
                ?>
              </table>
            </div>
            <a href="medisc.php" class="btn btn-primary mb-3" role="button"><i class='bx bx-plus-medical' ></i>Input Data</a>
          </div>
        </div>    
      </div>
    </div>
  </section>

  <script>
   let sidebar = document.querySelector(".sidebar");
   let sidebarBtn = document.querySelector(".sidebarBtn");
   sidebarBtn.onclick = function() {
    sidebar.classList.toggle("active");
    if(sidebar.classList.contains("active")){
      sidebarBtn.classList.replace("bx-menu" ,"bx-menu-alt-right");
    }else
    sidebarBtn.classList.replace("bx-menu-alt-right", "bx-menu");
  }
</script>

</body>
</html>