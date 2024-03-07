<?php
include "koneksi.php";
//inisialisasi
if (isset($_POST["submit"])) {
  $UserID = $Username = $Password = $Email = $NamaLengkap = $Alamat = "";
  $UserID = @$_POST['UserID'];
  $Username = @$_POST['Username'];
  $Password = @$_POST['Password'];
  $Email = @$_POST['Email 	'];
  $NamaLengkap = @$_POST['NamaLengkap'];
  $Alamat = hash("sha256", @$_POST['Alamat 	']);

  //cek apakah ada username yang sama
  $cek = mysqli_query($koneksi, "SELECT * FROM user WHERE username = '$username'");

  $baris = mysqli_num_rows($cek);
  if ($baris >= 1) {
    echo "<script>alert('Username sudah ada');</script>";
  } else {

    echo "<script>alert('Registrasi berhasil');</script>";
    //Masukkan ke database
    $insert = mysqli_query($koneksi, "INSERT INTO user(UserID, Username, Password, Email, NamaLengkap, Alamat, ) VALUES('UserID','$Username','$Password','$Email','$nis','$NamaLengkap', '$Alamat',)");
    header("location: index.php");
  }
}

?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Login</title>
  <style>
    * {
      padding: 0;
      margin: 0;
      box-sizing: border-box;
    }

    body {
      background-color: skyblue;
      height: 100vh;
      overflow: hidden;
    }

    form {
      width: 300px;
      height: auto;
      margin: auto;
      position: relative;
      top: 50%;
      transform: translateY(-50%);
    }

    div.tombol {
      display: flex;
      justify-content: space-between;
      width: 100%;
      flex-direction: row-reverse;
    }

    div.tombol>* {
      display: block;
      flex-basis: 30%;
      outline: none;
      border: none;
      font-size: 18px;
      border-radius: 3px;
      padding: 3px;
      text-decoration-line: none;
      font-family: sans-serif;
      border: 2px solid darkcyan;
    }

    div.tombol>a {
      color: darkcyan;
      background-color: transparent;
      border: 2px solid darkcyan;
      text-align: center;
    }

    form>* {
      width: 100%;
      font-size: 18px;
      margin: 10px 0;
      padding: 5px;
    }

    input[type="submit"] {
      background-color: darkcyan;
      color: white;
    }

    h1 {
      text-align: center;
      font-family: sans-serif;
      font-size: 30px;
    }
  </style>
</head>

<body>
  <form method="post" autocomplete="off" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
    <h1>Daftar</h1>
    <input type="text" name="UserID" placeholder="userID">
    <input type="text" name="Username" placeholder="Username">
    <input type="Password" name="Password" placeholder="Password">
    <input type="email" name="email" placeholder="Email">
    <input type="text" placeholder="Nama Lengkap" name="Nama Lengkap">
    <input type="text" name="Alamat" placeholder="Alamat">
    <div class="tombol">
      <input type="submit" name="submit" value="Submit">
      <a href="login.php">Login</a>
    </div>
  </form>
</body>

</html>