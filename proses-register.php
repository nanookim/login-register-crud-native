<?php

require_once("config.php");

// cek apakah tombol daftar sudah diklik atau blum?
if (isset($_POST['submit'])) {

    // ambil data dari formulir
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    // buat query
    $sql = "INSERT INTO tb_user (nama, email, username, password) VALUE ('$nama', '$email', '$username', '$password')";
    $query = mysqli_query($db, $sql);
    var_dump($query);
    // apakah query simpan berhasil?
    if ($query) {
        // kalau berhasil alihkan ke halaman index.php dengan status=sukses
        header('Location: login.php');
    } else {
        // kalau gagal alihkan ke halaman indek.php dengan status=gagal
        header('Location: register.php');
    }
}
