<?php
$host = "localhost";
$username = "root";
$password = "";
$dbname = "db_covid";
// Buat koneksi ke database db_covid
$conn = mysqli_connect($host, $username, $password, $dbname);
// Cek koneksi ke database, jika gagal tampilkan pesan eror
if (!$conn) {
	die("Connection failed: " . mysqli_connect_error());
} 
?>