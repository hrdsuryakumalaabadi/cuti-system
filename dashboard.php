<?php
session_start();
include "koneksi.php";

if(!isset($_SESSION['id'])){
    die("Harus login dulu!");
}

echo "<h2>Dashboard</h2>";
echo "Selamat datang, user ID: ".$_SESSION['id']."<br>";
if($_SESSION['role'] == 'admin'){
    echo "<a href='admin.php'>Kelola Pengajuan</a><br>";
}
echo "<a href='pengajuan.php'>Ajukan Cuti</a><br>";
echo "<a href='logout.php'>Logout</a>";
?>