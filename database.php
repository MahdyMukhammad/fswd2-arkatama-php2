<?php
$hostname = "localhost"; // atau sesuaikan dengan host database Anda
$username = "root"; // ganti dengan nama pengguna database
$password = ""; // ganti dengan kata sandi database
$database = "php"; // ganti dengan nama database yang digunakan

// Membuat koneksi ke database
$koneksi = new mysqli($hostname, $username, $password, $database);

// Memeriksa apakah koneksi berhasil atau gagal
if ($koneksi->connect_error) {
    die("Koneksi database gagal: " . $koneksi->connect_error);
}
echo "berhasil";
