<?php

require "../function.php";

if($_SERVER['REQUEST_METHOD'] === 'POST'){

    if(tambah($_POST) > 0) {
        echo
        "<script>
            alert('Berhasil menambahkan dosen')
        </script>";
    }else {
        echo
        "<script>
            alert('Gagal menambahkan dosen')
        </script>";
    }
}

?>

<link rel="stylesheet" href="css/pagetambah.css">

<a href="dosen.php" id="kembali">kembali kehalaman mahasiswa</a>

<h1>Tambah dosen</h1>

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
                <button type="button" name="submit" id="submit">Tambah</button>
            </td>
        </tr>
    </table>
</form>