<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Form Login</title>
  <link rel="icon" type="image/x-icon" href="gambar/favicon.ico">
  <link rel="stylesheet" href="user.css">
  <link href="https://fonts.googleapis.com/css2?family=Viga&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"/>
</head>
<body>
  <?php 

  include 'koneksi.php';

  error_reporting(0);

  session_start();

  if (isset($_SESSION['username'])) {
    header("Location: berhasil_login.php");
  }

  if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $password = md5($_POST['password']);

    $sql = "SELECT * FROM user WHERE email='$email' AND password='$password'";
    $result = mysqli_query($kon, $sql);
    if ($result->num_rows > 0) {
      $row = mysqli_fetch_assoc($result);
      $_SESSION['username'] = $row['username'];
      header("Location: berhasil_login.php");
    } else {
      echo "<script>alert('Email atau password Anda salah. Silahkan coba lagi!')</script>";
    }
  }

  ?>
  <div class="alert alert-warning" role="alert">
    <?php echo $_SESSION['error']?>
  </div>

  <div class="container">
    <form action="" method="POST" class="login-email">
      <p class="login-text" style="font-size: 2rem; font-weight: 800;">Login</p>
      <div class="input-group">
        <input type="email" placeholder="Email" name="email" value="<?php echo $email; ?>" required>
      </div>
      <div class="input-group">
        <input type="password" placeholder="Password" name="password" value="<?php echo $_POST['password']; ?>" required>
      </div>
      <div class="input-group">
        <button name="submit" class="btn">Login</button>
      </div>
      <p class="login-register-text">Anda belum punya akun? <a href="signup.php">Register</a></p>
    </form>
  </div>

</body>
</html>
