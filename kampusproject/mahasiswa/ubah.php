<?php

require "function.php";

$id = $_GET["id"];
$result = mysqli_query($conn, "SELECT * FROM mahasiswa WHERE id = $id");
$data = mysqli_fetch_assoc($result);


if (isset($_POST["submit"])){

    if(ubah($_POST) > 0) {
        echo
        "<script>
            alert('Berhasil mengubah data mahasiswa')
            document.location.href = 'mahasiswa.php'
        </script>";
    }else {
        echo
        "<script>
            alert('Gagal mengubah data mahasiswa')
            document.location.href = 'mahasiswa.php'
        </script>";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ubah Mahasiswa</title>
</head>
<body>
    
    <h1>Ubah Mahasiswa</h1>

    <a href="mahasiswa.php">kembali ke halaman mahasiswa</a>
    <br><br>

    <form action="" method="post" id="ubahdata" enctype="multipart/form-data">
        <table border="1" cellpadding="5" cellspacing="0">
            <input type="hidden" name="id" value="<?= $data["id"];?>">
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
                        <button type="submit" name="submit" id="submit">Ubah</button>
                </td>
            </tr>
        </table>
    </form>

</body>
</html>