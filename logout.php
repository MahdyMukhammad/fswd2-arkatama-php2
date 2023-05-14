<?php
session_start();

// Cek apakah pengguna sudah login, jika tidak, redirect ke halaman login
if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
    header("Location: login.php");
    exit();
}

// Jika tombol logout ditekan, hapus status login dari sesi dan redirect ke halaman login
if (isset($_POST['logout'])) {
    session_unset();
    session_destroy();
    header("Location: login.php");
    exit();
}
