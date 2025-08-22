<?php
session_start();
include "koneksi.php";

if(isset($_POST['login'])){
    $email = $_POST['email'];
    $pass  = $_POST['password'];

    $result = mysqli_query($conn, "SELECT * FROM users WHERE email='$email'");
    $row = mysqli_fetch_assoc($result);

    if($row && password_verify($pass, $row['password'])){
        $_SESSION['id'] = $row['id'];
        $_SESSION['role'] = $row['role'];
        header("Location: dashboard.php");
    } else {
        echo "Login gagal!";
    }
}
?>
<h2>Login Sistem Cuti</h2>
<form method="POST">
    Email: <input type="text" name="email"><br>
    Password: <input type="password" name="password"><br>
    <button type="submit" name="login">Login</button>
</form>
