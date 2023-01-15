<?php

$servername = "localhost";
$username   = "root";
$password   = "";
$dbname     = "penggajian";

$connection = mysqli_connect($servername, $username, $password, $dbname);

if (!$connection) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
