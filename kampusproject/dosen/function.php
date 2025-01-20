<?php

$host = "localhost";
$user = "root";
$pass = "";
$db = "dbkuliah";

$conn = mysqli_connect($host, $user, $pass, $db);

function query($query) {
    
    global $conn;

    $result = mysqli_query($conn, $query);

    $rows = [];

    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }

    return $rows;
}

function tambah($data) {

    global $conn;

    $kodedsn = $data["kodedsn"];
    $nama = $data["nama"];
    $alamat = $data["alamat"];
    $prodi = $data["prodi"];
    $jabatan = $data["jabatan"];

    mysqli_query($conn, "INSERT INTO dosen VALUES ('','$kodedsn', '$nama', '$alamat', '$prodi', '$jabatan')");

    return mysqli_affected_rows($conn);
}

function ubah($data) {
    
    global $conn;

    $id = $data["id"];
    $kodedsn = $data["kodedsn"];
    $nama = $data["nama"];
    $alamat = $data["alamat"];
    $prodi = $data["prodi"];
    $jabatan = $data["jabatan"];

    mysqli_query($conn, "UPDATE dosen SET kodedsn = '$kodedsn', nama = '$nama', alamat = '$alamat', prodi = '$prodi', jabatan = '$jabatan' WHERE id = $id");

    return mysqli_affected_rows($conn);
}

function hapus($id) {

    global $conn;
    
    mysqli_query($conn, "DELETE FROM dosen WHERE id = $id");

    return mysqli_affected_rows($conn);
}

function cari($caridata) {

    $cari = query("SELECT * FROM dosen WHERE 
    kodedsn LIKE '%$caridata%' OR 
    nama LIKE '%$caridata%' OR 
    alamat LIKE '%$caridata%' OR 
    prodi LIKE '%$caridata%' OR 
    jabatan LIKE '%$caridata%'"); 

    return $cari;
}

?>