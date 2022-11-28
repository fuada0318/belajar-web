<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="dashboard.css">
    <!-- Boxicons CDN Link -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Viga&display=swap" rel="stylesheet">
    
     <title>Update Data</title>
    <link rel="icon" type="image/x-icon" href="../img/favicon.ico">
   </head>
<body>
  <div class="sidebar">
    <div class="logo-details">
      <img src="../img/favicon.ico">
      <span class="logo_name">ÆGIR</span>
    </div>
      <ul class="nav-links">
        <li>
          <a href="dashboard.html">
            <i class='bx bx-grid-alt' ></i>
            <span class="links_name">Dashboard</span>
          </a>
        </li>
        <li>
          <a href="#">
            <i class='bx bx-box' ></i>
            <span class="links_name">Product</span>
          </a>
        </li>
        <li>
          <a href="order.php"  class="active">
            <i class='bx bx-list-ul' ></i>
            <span class="links_name">Order list</span>
          </a>
        </li>
        <li>
          <a href="#">
            <i class='bx bx-pie-chart-alt-2' ></i>
            <span class="links_name">Analytics</span>
          </a>
        </li>
        <li>
          <a href="#">
            <i class='bx bx-book-alt' ></i>
            <span class="links_name">Total order</span>
          </a>
        </li>
        <li>
          <a href="#">
            <i class='bx bx-message' ></i>
            <span class="links_name">Messages</span>
          </a>
        </li>
        <li>
          <a href="setting.html">
            <i class='bx bx-cog' ></i>
            <span class="links_name">Setting</span>
          </a>
        </li>
        <li class="log_out">
          <a href="../login.html">
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
        <span class="dashboard">Update List</span>
      </div>
      <div class="search-box">
        <input type="text" placeholder="Search...">
        <i class='bx bx-search' ></i>
      </div>
      <div class="profile-details">
        <img src="../img/potrait.jpg" alt="">
        <span class="admin_name">Ilman Fuada</span>
        <!-- <i class='bx bx-chevron-down' ></i> -->
      </div>
    </nav>

    <div class="home-content">
	<div class="container">
		<?php
		include "koneksi.php";

		function input($data){
			$data = trim($data);
			$data = stripslashes($data);
			$data = htmlspecialchars($data);
			return $data;	
		}
		if (isset($_GET['id'])) {
			$id=input($_GET["id"]);

			$sql="select*from orderan where id=$id;";
			$hasil=mysqli_query($kon,$sql);
			$data = mysqli_fetch_assoc($hasil);
		}

		if ($_SERVER["REQUEST_METHOD"] == "POST") {
			$id=htmlspecialchars($_POST["id"]); 
			$nama=input($_POST["nama"]);
			$status=input($_POST["status"]);
			$total=input($_POST["total"]);
			// $date=input($_POST["date"]);

			$sql="update orderan set nama='$nama', status='$status', total='$total' where id='$id'";

			$hasil=mysqli_query($kon,$sql);

			if ($hasil) {
				header("Location:order.php");
			}
			else {
				echo "<div class='alert alert-danger'>Data Gagal Diupdate.</div>";
			}
		}
		?>
		<h5 class="card-title mt-4 mb-4" style="text-align: center;">Update Order Data</h5>
        <hr>

		<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
			<div class="form-group">
				<label for="">Nama:</label>
				<input type="text" name="nama" class="form-control" value="<?php echo $data['nama']; ?>" placeholder="Masukan Nama" required/>
			</div>
			<div class="form-group">
				<label for="">Status:</label>
				<input type="text" name="status" class="form-control" value="<?php echo $data['status']; ?>" placeholder="Masukan Status" required/>				
			</div>
			<div class="form-group">
				<label for="">Total:</label>
				<input type="total" name="total" class="form-control" value="<?php echo $data['total']; ?>" placeholder="Masukan Total" required/>
			</div>
			<input type="hidden" name="id" value="<?php echo $data['id']; ?>" />
			<button type="submit" name="submit" class="btn btn-primary">Submit</button>
		</form>
	</div>
	</div>
</body>
</html>