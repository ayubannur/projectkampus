<?php

require "../function.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST'){

    if(ubah($_POST) > 0) {
        echo
        "<script>
            alert('Berhasil mengubah data dosen')
        </script>";
    }else {
        echo
        "<script>
            alert('Gagal mengubah data dosen')
        </script>";
    }
}

$id = $_GET["id"];
$result = mysqli_query($conn, "SELECT * FROM dosen WHERE id = $id");
$data = mysqli_fetch_assoc($result);

?>
<link rel="stylesheet" href="css/pagetambah.css">

<a href="dosen.php" id="kembali">kembali kehalaman mahasiswa</a>

<h1>Ubah dosen</h1>

<form action="" method="post" id="formubah">
    <table border="1" cellpadding="5" cellspacing="0">
        <input type="hidden" name="id" value="<?= $id?>">
        <tr>
            <th>Type</th>
            <th>Data lama</th>
            <th>Edit data lama</th>
        </tr>
        <tr>
            <td>
                <label for="kodedsn">kodedsn</label>
            </td>
            <td><?= $data["kodedsn"];?></td>
            <td>
                <input type="text" name="kodedsn" id="kodedsn" value="<?= $data["kodedsn"];?>">
            </td>
        </tr>
        <tr>
            <td>
                <label for="nama">Nama</label>
            </td>
            <td><?= $data["nama"];?></td>
            <td>
                <input type="text" name="nama" id="nama" value="<?= $data["nama"];?>">
            </td>
        </tr>
        <tr>
            <td>
                <label for="alamat">Alamat</label>
            </td>
            <td><?= $data["alamat"];?></td>
            <td>
                <input type="text" name="alamat" id="alamat" value="<?= $data["alamat"];?>">
            </td>
        </tr>
        <tr>
            <td>
                <label for="prodi">Prodi</label>
            </td>
            <td><?= $data["prodi"];?></td>
            <td>
                <input type="text" name="prodi" id="prodi" value="<?= $data["prodi"];?>">
            </td>
        </tr>
        <tr>
            <td>
                <label for="jabatan">Jabatan</label>
            </td>
            <td><?= $data["jabatan"];?></td>
            <td>
                <input type="text" name="jabatan" id="jabatan" value="<?= $data["jabatan"];?>">
            </td>
        </tr>

        <tr>
            <td colspan="3" align="center">
                    <button type="button" name="submit" id="submit">Ubah</button>
            </td>
        </tr>
    </table>
</form>
