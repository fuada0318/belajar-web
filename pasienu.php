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

  <title>Update Data Pasien</title>
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
        <a href="pasien.php" class="active">
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
        <a href="medis.php">
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
        <span class="dashboard">Update Data</span>
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


          <?php
            include "koneksi.php";

            function input($data){
             $data = trim($data);
             $data = stripslashes($data);
             $data = htmlspecialchars($data);
             return $data;	
           }
           if (isset($_GET['id_pasien'])) {
             $id_pasien=input($_GET["id_pasien"]);

             $sql="select*from pasien where id_pasien=$id_pasien;";
             $hasil=mysqli_query($kon,$sql);
             $data = mysqli_fetch_assoc($hasil);
           }

           if ($_SERVER["REQUEST_METHOD"] == "POST") {
             $id_pasien=htmlspecialchars($_POST["id_pasien"]); 
             $nama_pasien=input($_POST["nama_pasien"]);
             $tgl_lahir=input($_POST["tgl_lahir"]);
             $no_telp=input($_POST["no_telp"]);
             $alamat=input($_POST["alamat"]);       
             $jk=input($_POST["jk"]);

             $sql="update pasien set nama_pasien='$nama_pasien', tgl_lahir='$tgl_lahir', no_telp='$no_telp', jk='$jk', alamat='$alamat' where id_pasien='$id_pasien'";

             $hasil=mysqli_query($kon,$sql);

             if ($hasil) {
              header("Location:pasien.php");
            }
            else {
              echo "<div class='alert alert-danger'>Data Gagal Diupdate.</div>";
            }
          }
        ?>
        <h5 class="card-title mt-4 mb-4" style="text-align: center;">Update Data Pasien</h5>
        <hr>

        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
         <div class="form-group">
          <label for="">Nama Pasien</label>
          <input type="text" name="nama_pasien" class="form-control" value="<?php echo $data['nama_pasien']; ?>" placeholder="Masukan Nama" required/>
        </div>
        <div class="form-group">
          <label for="">Tanggal Lahir</label>
          <input type="date" name="tgl_lahir" class="form-control" value="<?php echo $data['tgl_lahir']; ?>" placeholder="Masukan Status" required/>				
        </div>
        <div class="form-group">
          <label for="">Nomor Telepon</label>
          <input type="text" name="no_telp" class="form-control" value="<?php echo $data['no_telp']; ?>" placeholder="Masukan Total" required/>
        </div>
        <div class="form-group">
          <label for="">Alamat</label>
          <input type="text" name="alamat" class="form-control" value="<?php echo $data['alamat']; ?>" placeholder="Masukan Total" required/>
        </div>
        <div class="form-group">            
          <label for="">Jenis Kelamin</label>
          <div class="form-check">
            <input class="form-check-input" type="radio" name="jk" id="" value="L">
            <label class="form-check-label" for="">
              Male
            </label>
          </div>
          <div class="form-check">
            <input class="form-check-input" type="radio" name="jk" id="" value="P">
            <label class="form-check-label" for="">
              Female
            </label>
          </div>
        </div>
        <input type="hidden" name="id_pasien" value="<?php echo $data['id_pasien']; ?>" />
        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
      </div>
    </div>
  </div>
</form>
</div>
</div>
</body>
</html>