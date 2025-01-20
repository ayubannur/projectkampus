<?php

require "function.php";

$id =  $_GET["id"];
$result = mysqli_query($conn, "SELECT * FROM matakuliah WHERE id = $id");
$data = mysqli_fetch_assoc($result);

if (isset($_POST["submit"])) {

    if (ubah($_POST) > 0) {
        echo
        "<script>
            alert('Berhasil mengubah mata kuliah')
            document.location.href = 'matkul.php' 
        </script>";
    }else {
        echo
        "<script>
            alert('Gagal mengubah mata kuliah')
            document.location.href = 'ubah.php' 
        </script>";
    }
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ubah Matkul</title>
</head>
<body>
    
    <h1>Ubah Matkul</h1>

    <a href="matkul.php" id="kembali">Kembali ke halaman matkul</a>
    <br><br>

    <form action="" method="post" id="formubah">
        <input type="hidden" name="id" id="id" value="<?= $id;?>">
        <table border="1" cellpadding="5" cellspacing="0">
            <tr>
                <th>Type</th>
                <th>Data lama</th>
                <th>Edit data lama</th>
            </tr>
            <tr>
                <td><label for="kodemk">Kode MK</label></td>
                <td><?= $data["kodemk"];?></td>
                <td>
                    <input type="text" name="kodemk" id="kodemk" value="<?= $data["kodemk"];?>">
                </td>
            </tr>
            <tr>
                <td><label for="matkul">Mata Kuliah</label></td>
                <td><?= $data["matkul"];?></td>
                <td>
                    <input type="text" name="matkul" id="matkul" value="<?= $data["matkul"];?>">
                </td>
            </tr>
            <tr>
                <td><label for="sks">SKS</label></td>
                <td><?= $data["sks"];?></td>
                <td>
                    <input type="text" name="sks" id="sks" value="<?= $data["sks"];?>">
                </td>
            </tr>
            <tr>
                <td colspan="3" align="center">
                    <button type="submit" name="submit" id="submit">Ubah</button>
                </td>
            </tr>
        </table>

    </form>

</body>
</html>