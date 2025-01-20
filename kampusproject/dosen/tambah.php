<?php

require "function.php";

if(isset($_POST["submit"])){

    if(tambah($_POST) > 0) {
        echo
        "<script>
            alert('Berhasil menambahkan dosen')
            document.location.href = 'dosen.php'
        </script>";
    }else {
        echo
        "<script>
            alert('Gagal menambahkan dosen')
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
    <title>Tambah dosen</title>
</head>
<body>
    
    <h1>Tambah dosen</h1>

    <a href="dosen.php">kembali kehalaman mahasiswa</a>
    <br><br>

    <form action="" method="post" id="formtambah">
        <table border="1" cellpadding="5" cellspacing="0">
            <tr>
                <th>Data</th>
                <th>Isi data</th>
            </tr>
            <tr>
                <td>
                    <label for="kodedsn">Kode Dosen</label>
                </td>
                <td>
                    <input type="text" name="kodedsn" id="kodedsn" placeholder="kodedsn">
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
                    <label for="prodi">Prodi</label>
                </td>
                <td>
                    <input type="text" name="prodi" id="prodi" placeholder="Prodi">
                </td>
            </tr>
            <tr>
                <td>
                    <label for="jabatan">Jabatan</label>
                </td>
                <td>
                    <input type="text" name="jabatan" id="jabatan" placeholder="jabatan">
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