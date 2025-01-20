<?php

require "function.php";

if (isset($_POST["submit"])) {
    
    if(tambah($_POST) > 0) {
        echo
        "<script>
            alert('Berhasil menambahkan mata kuliah')
            document.location.href = 'matkul.php' 
        </script>";
    }else {
        echo
        "<script>
            alert('Berhasil menambahkan mata kuliah')
            document.location.href = 'tambah.php'
        </script>";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Matkul</title>
</head>
<body>
    
    <h1>Tambah Matkul</h1>  

    <a href="matkul.php" id="kembali">kembali ke halaman matkul</a>
    <br><br>

    <form action="" method="post" id="formtambah">
        <table border="1" cellspacing="0" cellpadding="5">
            <tr>
                <th>Data</th>
                <th>Isi Data</th>
            </tr>
            <tr>
                <td><label for="kodemk">Kode MK</label></td>
                <td>
                    <input type="text" name="kodemk" id="kodemk" placeholder="Kode MK">
                </td>
            </tr>
            <tr>
                <td><label for="matkul">Mata Kuliah</label></td>
                <td>
                    <input type="text" name="matkul" id="matkul" placeholder="Mata Kuliah">
                </td>
            </tr>
            <tr>
                <td><label for="sks">SKS</label></td>
                <td>
                    <input type="text" name="sks" id="sks" placeholder="SKS">
                </td>
            </tr>
            <tr>
                <td colspan="2" align="center">
                    <button type="submit" name="submit" id="submit">Tambah</button>
                </td>
            </tr>

        </table>
    </form>
</body>
</html>