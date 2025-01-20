<?php

require 'function.php';

if (isset($_POST["submit"])) {

    if (register($_POST) > 0) {

        echo
        "<script>
            alert('Berhasil mendaftarkan user')
            document.location.href = 'login.php'
        </script>";
    }else {
        echo
        "<script>
            alert('Gagal mendaftarkan user')
            document.location.href = 'register.php'
        </script>";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Akun</title>

    <link rel="stylesheet" href="css/outer.css">
</head>
<body>
    
    <form action="" method="post">
        <table border="1" cellspacing="0" cellpadding="5">
            <tr>
                <th colspan="2">Daftar Akun</th>
            </tr>
            <tr>
                <td>
                    <label for="username">username</label>
                </td>
                <td>
                    <input type="text" name="username" id="username" placeholder="username" required>
                </td>
            </tr>

            <tr>
                <td>
                    <label for="password">password</label>
                </td>
                <td>
                    <input type="password" name="password" id="password" placeholder="password" required>
                </td>
            </tr>

            <tr>
                <td>
                    <label for="password2">konfirm password</label>
                </td>
                <td>
                    <input type="password" name="password2" id="password2" placeholder="konfirm password" required>
                </td>
            </tr>

            <tr>
                <td colspan="2">
                    <button type="submit" name="submit" id="submit">Daftar</button>
                </td>
            </tr>

            <tr>
                <td colspan="2">
                    <p>Kembali ke halaman <a href="login.php">Login</a></p>
                </td>
            </tr>
        </table>
    </form>

</body>
</html>