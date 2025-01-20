<?php

require "function.php";

if(isset($_POST["submit"])){

    if(tambah($_POST) > 0) {
        echo
        "<script>
            alert('Berhasil menambahkan mahasiswa')
            document.location.href = 'mahasiswa.php'
        </script>";
    }else {
        echo
        "<script>
            alert('Gagal menambahkan mahasiswa')
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
    <title>Tambah Mahasiswa</title>

    <link rel="stylesheet" href="css/pagetambah.css">
</head>
<body>
    
    <h1>Tambah Mahasiswa</h1>

    <a href="mahasiswa.php">kembali kehalaman mahasiswa</a>
    <br><br>

    <form action="" method="post" id="formtambah" enctype="multipart/form-data">
        <table border="1" cellpadding="5" cellspacing="0">
            <tr>
                <th>Data</th>
                <th>Isi data</th>
            </tr>
            <tr>
                <td>
                    <label for="nbi">NBI</label>
                </td>
                <td>
                    <input type="text" name="nbi" id="nbi" placeholder="NBI">
                </td>
            </tr>
            <tr>
                <td>
                    <label for="nama">Nama</label>
                </td>
                <td>
                    <input type="text" name="nama" id="nama" placeholder="Nama">
                </td>
            </tr>
            <tr>
                <td>
                    <label for="alamat">Alamat</label>
                </td>
                <td>
                    <input type="text" name="alamat" id="alamat" placeholder="Alamat">
                </td>
            </tr>
            <tr>
                <td>
                    <label for="ipk">IPK</label>
                </td>
                <td>
                    <input type="text" name="ipk" id="ipk" placeholder="IPK">
                </td>
            </tr>
            <tr>
                <td>
                    <label for="spp">SPP</label>
                </td>
                <td>
                    <input type="text" name="spp" id="spp" placeholder="SPP">
                </td>
            </tr>
            <tr>
                <td>
                    <label for="prodi">Prodi</label>
                </td>
                <td>
                    <input type="text" name="prodi" id="prodi" placeholder="Prodi">
                </td>
            </tr>
            <tr>
                <td>
                    <label for="ijazah">Ijazah</label>
                </td>
                <td>
                    <input type="file" name="ijazah" id="ijazah" placeholder="Ijazah">
                </td>
            </tr>

            <tr>
                <td colspan="3" align="center">
                    <button type="submit" name="submit" id="submit">Tambah</button>
                </td>
            </tr>
        </table>
    </form>

</body>
</html>