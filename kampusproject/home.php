<?php

session_start();

require 'function.php';

if (!isset($_SESSION["login"])) {
    header("Location: login.php");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Web</title>
    <link rel="stylesheet" href="css/stylehome.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
    <div class="menu">
	        <!-- Logo Perusahaan -->
        <div class="logo">
            <img src="icons/logo.png" alt="Logo Perusahaan">
            <h2>S I A K A D</h2>    
        </div>
        <!-- bar bar -->
        <a href="home.php">
            <img src="icons/home.png" alt="Home"> Home
        </a>
        <a href="#" onclick="loadPage('mahasiswa/mahasiswa.php')">
            <img src="icons/student.png" alt="Mahasiswa"> Mahasiswa
        </a>
        <a href="#" onclick="loadPage('dosen/dosen.php')">
            <img src="icons/teacher.png" alt="Dosen"> Dosen
        </a>
        <a href="#" onclick="loadPage('matkul/matkul.php')">
            <img src="icons/subjects.png" alt="Mata Kuliah"> Mata Kuliah
        </a>
        <a href="#" onclick="loadPage('laporan/laporan.php')">
            <img src="icons/report.png" alt="Laporan"> Laporan
        </a>
        <a href="#" onclick="loadPage('mahasiswa/chart.html')">
            <img src="icons/chart.png" alt="Grafik"> Grafik
        </a>
        <a href="logout.php">
            <img src="icons/shutdown.png" alt="Logout"> Logout
        </a>
    </div>
    <div class="content" id="content" on>
        <h1>Selamat Datang <?= $_SESSION["username"];?></h1>
        <p>Pilih menu di sebelah kiri untuk melihat konten yang tersedia.</p>
    </div>

    <script src="js/script.js"></script>

</body>
</html>
