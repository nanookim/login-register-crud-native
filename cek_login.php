<?php
session_start();

require_once("config.php");

$username = $_POST['username'];
$password = $_POST['password'];
if (!empty($username) || !empty($password)) {
    $seq = mysqli_query($db, "select * from tb_user where username='$username' ");
    $data = mysqli_fetch_array($seq);
    $jml = mysqli_num_rows($seq);
    if ($jml > 0) {
        if (password_verify($password, $data['password'])) {
            $_SESSION['username'] = $data['nama'];
            header("location:halaman_utama.php");
        } else {
            echo "<script>alert('Password salah!'); window.location.href='login.php';</script>";
        }
    } else {
        echo "<script>alert('Username salah!'); window.location.href='login.php';</script>";
    }
}
