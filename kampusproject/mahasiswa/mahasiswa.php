<?php

require "function.php";

$mahasiswa = query("SELECT * FROM mahasiswa");

$perPage = 3;
$jumlahData = count(query("SELECT * FROM mahasiswa"));
$jumlahHalaman = ceil($jumlahData/$perPage);
$halamanAktif = ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET["halaman"])) ? (int)$_GET["halaman"] : 1;
$awalData = ($perPage * $halamanAktif) - $perPage;

$mahasiswa = query("SELECT * FROM mahasiswa LIMIT $awalData, $perPage");

if (isset($_POST["cari"])) {
    
    $mahasiswa = cari($_POST["caridata"]);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mahasiswa</title>    
    <link rel="stylesheet" href="css/pagedata.css?v.1">
</head>

<body>

    <h1>Daftar Mahasiswa</h1>

    <form action="" method="post" id="formcaridata">
        <input type="text" name="caridata" id="caridata" placeholder="cari mahasiswa" autocomplete="off" size="30">
        <button type="button" name="cari" id="cari">cari</button>
        <button type="submit" name="cari" id="cari">cari</button>
    </form>
    <br>

    <a href="tambah.php" id="tambahdata">Tambah mahasiswa</a>
    <br><br>

    <div id="container">
        <table border="1" cellpadding="5" cellspacing="0">
            <tr>
                <th>No</th>
                <th>NBI</th>
                <th>Nama</th>
                <th>Alamat</th>
                <th>IPK</th>
                <th>SPP</th>
                <th>Prodi</th>
                <th>Ijazah</th>
                <th>Tindakan</th>
            </tr>

            <?php $i = $awalData + 1;?>
            <?php foreach($mahasiswa as $mhs) :?>
                <tr>
                    <td><?= $i;?></td>
                    <td><?= $mhs["nbi"];?></td>
                    <td><?= $mhs["nama"];?></td>
                    <td><?= $mhs["alamat"];?></td>
                    <td><?= $mhs["ipk"];?></td> 
                    <td><?= $mhs["spp"];?></td>
                    <td><?= $mhs["prodi"];?></td>
                    <td>
                        <a href="file/<?= $mhs["ijazah"];?>" target="_blank"><?= $mhs["ijazah"];?></a>
                    </td>
                    <td>
                        <a href="ubah.php?id=<?= $mhs['id'];?>" id="ubahdata" value="<?= $mhs['id'];?>">
                            <img src="icons/ubah.png" alt="ubah" width="25" id="ubahdata" value="<?= $mhs['id'];?>">
                        </a>
                        ||
                        <a href="hapus.php?id=<?= $mhs['id'];?>" id="hapusdata" value="<?= $mhs['id'];?>">
                            <img src="icons/hapus.png" alt="hapus" width="25" id="hapusdata" value="<?= $mhs['id'];?>">
                        </a>
                    </td>
                </tr>
            <?php $i++;?>
            <?php endforeach?>
        </table>


        <div id="pagination">
            <?php if ($halamanAktif > 1) :?>
                <a href="?halaman=<?= $halamanAktif - 1;?>" id="halaman" value="<?= $halamanAktif - 1;?>">&lt;</a>
            <?php endif ?>

            <?php for ($i = 1; $i <= $jumlahHalaman; $i++) :?>
                <a href="?halaman=<?= $i;?>" id="halaman" value="<?= $i;?>"><?= $i;?></a>
            <?php endfor ?>

            <?php if ($halamanAktif < $jumlahHalaman) :?>
                <a href="?halaman=<?= $halamanAktif + 1;?>"id="halaman" value="<?= $halamanAktif + 1;?>">&gt;</a>
            <?php endif ?>
        </div>
    </div>
</body>
</html>