<?php

$host = "localhost";
$user = "root";
$pass = "";
$db = "dbkuliah";

$conn = mysqli_connect($host, $user, $pass, $db);

function register($data) {

    global $conn;

    $username = $data["username"];
    $password = $data["password"];
    $password2 = $data["password2"];

    $result = mysqli_query($conn, "SELECT username FROM user WHERE username = '$username'");

    if (mysqli_fetch_assoc($result)) {

        echo
        "<script>
            alert('username sudah ada')
        </script>";
        return false;
    }   

    if ($password === $password2) {

        $password = password_hash($password, PASSWORD_DEFAULT);

        mysqli_query($conn, "INSERT INTO user VALUE ('', '$username', '$password')");

        return mysqli_affected_rows($conn);

    }else {
        echo
        "<script>
            alert('Password yang dimasukan tidak sama');
        </script>";

        return false;
    }
};