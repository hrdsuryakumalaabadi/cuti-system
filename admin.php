<?php
session_start();
include "koneksi.php";

if($_SESSION['role'] != 'admin'){
    die("Akses ditolak!");
}

if(isset($_GET['approve'])){
    $id = $_GET['approve'];
    mysqli_query($conn, "UPDATE leave_requests SET status='Disetujui' WHERE id='$id'");
}
if(isset($_GET['reject'])){
    $id = $_GET['reject'];
    mysqli_query($conn, "UPDATE leave_requests SET status='Ditolak' WHERE id='$id'");
}

$result = mysqli_query($conn, "SELECT leave_requests.*, users.nama FROM leave_requests JOIN users ON users.id = leave_requests.user_id");
?>
<h2>Daftar Pengajuan Cuti</h2>
<table border="1">
    <tr>
        <th>Nama</th><th>Jenis</th><th>Mulai</th><th>Selesai</th><th>Alasan</th><th>Status</th><th>Aksi</th>
    </tr>
<?php while($row = mysqli_fetch_assoc($result)){ ?>
    <tr>
        <td><?= $row['nama'] ?></td>
        <td><?= $row['jenis_cuti'] ?></td>
        <td><?= $row['tgl_mulai'] ?></td>
        <td><?= $row['tgl_selesai'] ?></td>
        <td><?= $row['alasan'] ?></td>
        <td><?= $row['status'] ?></td>
        <td>
            <a href="?approve=<?= $row['id'] ?>">✔ Setujui</a> | 
            <a href="?reject=<?= $row['id'] ?>">❌ Tolak</a>
        </td>
    </tr>
<?php } ?>
</table>
