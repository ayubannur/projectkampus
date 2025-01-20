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

    $nbi = $data["nbi"];
    $nama = $data["nama"];
    $alamat = $data["alamat"];
    $ipk = $data["ipk"];
    $spp = $data["spp"];
    $prodi = $data["prodi"];
    $ijazah = upload($_FILES["ijazah"]);

    if (!$ijazah) {
        return false;
    }

    mysqli_query($conn, "INSERT INTO mahasiswa VALUES ('','$nbi', '$nama', '$alamat', '$ipk', '$spp', '$prodi', '$ijazah')");

    return mysqli_affected_rows($conn);
}

function ubah($data) {
    
    global $conn;

    $id = $data["id"];
    $nbi = $data["nbi"];
    $nama = $data["nama"];
    $alamat = $data["alamat"];
    $ipk = $data["ipk"];
    $spp = $data["spp"];
    $prodi = $data["prodi"];
    $ijazahLama = $data["ijazahlama"];

    if ($_FILES['ijazahbaru']['error'] === 4){

        $ijazahBaru = $ijazahLama;
    }else {

        $ijazahBaru = upload($_FILES["ijazahbaru"]);
    }

    mysqli_query($conn, "UPDATE mahasiswa SET id = '$id', nbi = '$nbi', nama = '$nama', alamat = '$alamat', ipk = '$ipk', spp = '$spp', prodi = '$prodi', ijazah = '$ijazahBaru' WHERE id = $id");

    return mysqli_affected_rows($conn);
}

function hapus($id) {

    global $conn;
    
    mysqli_query($conn, "DELETE FROM mahasiswa WHERE id = $id");

    return mysqli_affected_rows($conn);
}

function cari($caridata) {

    $cari = query("SELECT * FROM mahasiswa WHERE 
    nbi LIKE '%$caridata%' OR 
    nama LIKE '%$caridata%' OR 
    alamat LIKE '%$caridata%' OR 
    ipk LIKE '%$caridata%' OR 
    prodi LIKE '%$caridata%'"); 

    return $cari;
}

function upload($file) {

    $nama = $file["name"];
    $ukuran = $file["size"];
    $eror = $file["error"];
    $tempatFile = $file["tmp_name"];
    $maxUkuran = 2 * 1024 * 1024;

    //cek apakah foto sudah terupload
    if ($eror === 4) {
        echo
            "<script>
                alert('upload foto dahulu')
            </script>";
        return false;
    }

    $fileValid = ['jpg', 'img', 'jpeg', 'pdf'];
    $typeFile = explode('.' , $nama); 
    $typeFile = strtolower(end($typeFile));

    if (!in_array($typeFile, $fileValid)) {
        echo
        "<script>
            alert('file yang di upload tidak valid')
        </script>";
        return false;
    }

    if ($ukuran > $maxUkuran) {
        echo
        "<script>
            alert('file yang di upload diatas 2mb')
        </script>";
        return false;
    }

    $namaFilebaru = uniqid();
    $namaFilebaru .= '.';
    $namaFilebaru .= $typeFile;

    move_uploaded_file($tempatFile, '../../file/'. $namaFilebaru);

    return $namaFilebaru;
}

?>