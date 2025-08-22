<?php
session_start();
include "koneksi.php";

if(isset($_POST['ajukan'])){
    $user_id    = $_SESSION['id'];
    $jenis      = $_POST['jenis_cuti'];
    $tgl_mulai  = $_POST['tgl_mulai'];
    $tgl_selesai= $_POST['tgl_selesai'];
    $alasan     = $_POST['alasan'];

    $sql = "INSERT INTO leave_requests (user_id, jenis_cuti, tgl_mulai, tgl_selesai, alasan) 
            VALUES ('$user_id','$jenis','$tgl_mulai','$tgl_selesai','$alasan')";
    mysqli_query($conn, $sql);
    echo "✅ Pengajuan cuti berhasil dikirim!";
}
?>
<h2>Form Pengajuan Cuti</h2>
<form method="POST">
    Jenis Cuti:
    <select name="jenis_cuti">
        <option value="Tahunan">Tahunan</option>
        <option value="Sakit">Sakit</option>
        <option value="Izin">Izin</option>
    </select><br>
    Tanggal Mulai: <input type="date" name="tgl_mulai"><br>
    Tanggal Selesai: <input type="date" name="tgl_selesai"><br>
    Alasan: <textarea name="alasan"></textarea><br>
    <button type="submit" name="ajukan">Ajukan Cuti</button>
</form>
