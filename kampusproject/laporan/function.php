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

    while ($row = mysqli_fetch_array($result)) {

        $rows[] = $row;
    }
    
    array_pop($rows);

    return $rows;
}

function totalData($data) {

    global $conn;

    $result = mysqli_query($conn, "SELECT COUNT(*) AS total FROM $data");

    $row = mysqli_fetch_assoc($result);

    return $row["total"];
} 