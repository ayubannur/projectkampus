<?php

require "../function.php";

$result = mysqli_query($conn, "SELECT * FROM mahasiswa");

$nama = [];
$bayar = [];

while ($row = mysqli_fetch_assoc($result)) {
    
    $nama[] = $row['nama'];
    $bayar[] = (int) $row['spp'];
}

header('Content-Type: application/json');

echo json_encode(['nama' => $nama, 'spp' => $bayar]);
?>