<?php
$server = "localhost";
$user = "root";
$pass = "";
$database = "db_ukomduy";

$conn = mysql_connect($server, $user, $pass, $database);
if (!$conn) {
  die("script>alert('koneksi gagal terhubung ke database.')</script");
}
