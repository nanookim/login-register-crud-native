<?php

include("config.php");

// cek apakah tombol daftar sudah diklik atau blum?
if (isset($_GET['id'])) {

    // ambil data dari formulir
    $id = $_GET['id'];

    // buat query
    $sql = "DELETE FROM tb_mahasiswa WHERE id='$id'";
    $query = mysqli_query($db, $sql);

    // apakah query simpan berhasil?
    if ($query) {
        // kalau berhasil alihkan ke halaman index.php dengan status=sukses
        header('Location: halaman_utama.php?stat=berhasil');
    } else {
        // kalau gagal alihkan ke halaman indek.php dengan status=gagal
        header('Location: halaman_utama.php?stat=gagal');
    }
} else {
    die("Akses dilarang...");
}
