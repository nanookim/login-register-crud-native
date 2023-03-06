<?php

include("config.php");

// cek apakah tombol daftar sudah diklik atau blum?
if (isset($_POST['submit'])) {

    // ambil data dari formulir
    $nim = $_POST['nim'];
    $nama = $_POST['nama_lengkap'];
    $no_telp = $_POST['no_telp'];
    $alamat = $_POST['alamat'];

    // buat query
    $sql = "INSERT INTO tb_mahasiswa (nim, nama_lengkap, no_telp, alamat) VALUE ('$nim', '$nama', '$no_telp', '$alamat')";
    $query = mysqli_query($db, $sql);

    // apakah query simpan berhasil?
    if ($query) {
        // kalau berhasil alihkan ke halaman index.php dengan status=sukses
        header('Location: halaman_utama.php?status=sukses');
    } else {
        // kalau gagal alihkan ke halaman indek.php dengan status=gagal
        header('Location: halaman_utama.php?status=gagal');
    }
} else {
    die("Akses dilarang...");
}
