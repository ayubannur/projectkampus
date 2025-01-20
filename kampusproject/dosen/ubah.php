<?php

require "function.php";

$id = $_GET["id"];
$result = mysqli_query($conn, "SELECT * FROM dosen WHERE id = $id");
$data = mysqli_fetch_assoc($result);

if (isset($_POST["submit"])){

    if(ubah($_POST) > 0) {
        echo
        "<script>
            alert('Berhasil mengubah data dosen')
            document.location.href = 'dosen.php'
        </script>";
    }else {
        echo
        "<script>
            alert('Gagal mengubah data dosen')
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
    <title>Ubah dosen</title>
</head>
<body>
    
    <h1>Ubah dosen</h1>

    <form action="" method="post">
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
                        <button type="submit" name="submit" id="submit">Ubah</button>
                </td>
            </tr>
        </table>
    </form>

</body>
</html>