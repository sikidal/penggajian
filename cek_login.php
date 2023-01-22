<?php
//buat session
session_start();
//koneksi ke database
include 'database/connection.php';


//ambil data dari form
$username = $_POST['username'];
$password = md5($_POST['password']);

//cek data di database
$query = "SELECT * FROM user WHERE username='$username' AND password='$password'";
$result = mysqli_query($connection, $query);

//jika data ditemukan
if (mysqli_num_rows($result) > 0) {
    $data = mysqli_fetch_assoc($result);

    $_SESSION['id'] = $data['id'];
    $_SESSION['level'] = $data['level'];
    $_SESSION['nama'] = $data['nama'];
    //redirect ke halaman dashboard
    header("location: index.php?page=dashboard");
} else {
    //jika data tidak ditemukan, tampilkan pesan error
    $_SESSION['error'] = 'Username atau password salah';
    header("location:login.php");
    //echo '<meta http-equiv="refresh" content="0; url=login.php">';
}
