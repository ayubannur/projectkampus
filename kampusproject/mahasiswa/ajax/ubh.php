<?php

require "../function.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    if(ubah($_POST) > 0) {
        echo
        "<script>
            alert('Berhasil mengubah data mahasiswa')
        </script>";
    }else {
        echo
        "<script>
            alert('Gagal mengubah data mahasiswa')
        </script>";
    }
}

$id = $_GET["id"];
$result = mysqli_query($conn, "SELECT * FROM mahasiswa WHERE id = $id");
$data = mysqli_fetch_assoc($result);

?>
<link rel="stylesheet" href="css/pagetambah.css">

<a href="mahasiswa.php" id="kembali">kembali kehalaman mahasiswa</a>

<h1>Ubah Mahasiswa</h1>

<form action="" method="post" id="formubah" enctype="multipart/form-data">
    <table border="1" cellpadding="5" cellspacing="0">
        <input type="hidden" name="id" id="id" value="<?= $id?>">
        <input type="hidden" name="ijazahlama" value="<?= $data["ijazah"];?>">
        <tr>
            <th>Type</th>
            <th>Data lama</th>
            <th>Edit data lama</th>
        </tr>
        <tr>
            <td>
                <label for="nbi">NBI</label>
            </td>
            <td><?= $data["nbi"];?></td>
            <td>
                <input type="text" name="nbi" id="nbi" value="<?= $data["nbi"];?>">
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
                <label for="ipk">IPK</label>
            </td>
            <td><?= $data["ipk"];?></td>
            <td>
                <input type="text" name="ipk" id="ipk" value="<?= $data["ipk"];?>">
            </td>
        </tr>
        <tr>
            <td>
                <label for="spp">SPP</label>
            </td>
            <td><?= $data["spp"];?></td>
            <td>
                <input type="text" name="spp" id="spp" value="<?= $data["spp"];?>">
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
                <label for="ijazahbaru">Ijazah</label>
            </td>
            <td><?= $data["ijazah"];?></td>
            <td>
                <input type="file" name="ijazahbaru" id="ijazahbaru">
            </td>
        </tr>

        <tr>
            <td colspan="3" align="center">
                <button type="button" name="submit" id="submit">Ubah</button>
            </td>
        </tr>
    </table>
</form>