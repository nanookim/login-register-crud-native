<?php

include("config.php");

// cek apakah tombol simpan sudah diklik atau blum?
if (isset($_POST['submit'])) {

    // ambil data dari formulir
    $id = $_POST['id'];
    $nim = $_POST['nim'];
    $nama_lengkap = $_POST['nama_lengkap'];
    $no_telp = $_POST['no_telp'];
    $alamat = $_POST['alamat'];

    // buat query update
    $sql = "UPDATE tb_mahasiswa SET nim='$nim', nama_lengkap='$nama_lengkap', no_telp='$no_telp', alamat='$alamat' WHERE id=$id";
    $query = mysqli_query($db, $sql);

    // apakah query update berhasil?
    if ($query) {
        // kalau berhasil alihkan ke halaman list-siswa.php
        header('Location: halaman_utama.php?kode=berhasil');
    } else {
        // kalau gagal tampilkan pesan
        header('Location: halaman_utama.php?kode=gagal');
    }
} else {
    die("Akses dilarang...");
}
