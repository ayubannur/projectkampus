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

    $kodemk = $data["kodemk"];
    $matkul = $data["matkul"];
    $sks = $data["sks"];

    mysqli_query($conn, "INSERT INTO matakuliah VALUE ('', '$kodemk', '$matkul', '$sks')");

    return mysqli_affected_rows($conn);
    
}

function ubah($data) {

    global $conn;

    $id = $data["id"];
    $kodemk = $data["kodemk"];
    $matkul = $data["matkul"];
    $sks = $data["sks"];

    mysqli_query($conn, "UPDATE matakuliah SET kodemk = '$kodemk', matkul = '$matkul', sks = '$sks' WHERE id = '$id'");

    return mysqli_affected_rows($conn);
}

function hapus($id) {

    global $conn;

    mysqli_query($conn, "DELETE FROM matakuliah WHERE id = $id");

    return mysqli_affected_rows($conn);
}


function cari($caridata) {

    $cari = query("SELECT * FROM matakuliah WHERE 
    kodemk LIKE '%$caridata%' OR 
    matkul LIKE '%$caridata%' OR 
    sks LIKE '%$caridata%'");

    return $cari;
}
?>