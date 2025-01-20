<?php

session_start();

require 'function.php';

if (isset($_SESSION["login"])) {

    header("Location: home.php");
}

if (isset($_POST["submit"])) {

   $username = $_POST["username"];
   $password = $_POST["password"];
   
   $result = mysqli_query($conn, "SELECT * FROM user WHERE username = '$username'");

   if(mysqli_num_rows($result) === 1) {

        $passDb = mysqli_fetch_assoc($result);

        if (password_verify($password, $passDb["password"])) {
            
            $_SESSION["login"] = true;
            
            $_SESSION["username"] = $username;

            header("Location: home.php");
            
            exit;
        }
   }else {

    $eror = "Username / Password salah !!";
   }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    <link rel="stylesheet" href="css/outer.css">
</head>
<body>

    <form action="" method="post">
        <?php if (isset($eror)) :?>
            <p><?= $eror; ?></p>
        <?php endif?>
        <table>
            <tr>
                <th colspan="2">Login User</th>
            </tr>
            <tr>
                <td><label for="username">Username</label></td>
                <td><input type="text" placeholder="Masukan Username" name="username" id="username" required></td>
            </tr>
            <tr>
                <td><label for="password">Password</label></td>
                <td><input type="password" placeholder="Masukan Password" name="password" id="password" required></td>
            </tr>
            <tr>
                <td colspan="2" align="center">
                    <button type="submit" name="submit" id="submit">login</button>
                </td>
            </tr>
            <tr>
                <td colspan="2" align="center">
                    Tidak punya akun ? <a href="register.php">Daftar</a>
                </td>
            </tr>
        </table>
    </form>
</body>
</html>