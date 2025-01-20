<?php

require "function.php";

$mataKuliah = query("SELECT * FROM matakuliah");

$perPage = 3;
$jumlahData = count(query("SELECT * FROM matakuliah"));
$jumlahHalaman = ceil($jumlahData/$perPage);
$halamanAktif = ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET["halaman"])) ? (int)$_GET["halaman"] : 1;
$awalData = ($perPage * $halamanAktif) - $perPage;

$mataKuliah = query("SELECT * FROM matakuliah LIMIT $awalData, $perPage");

if (isset($_POST["cari"])) {
   
    $mataKuliah = cari($_POST["caridata"]);
}
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Matkul</title>
    <link rel="stylesheet" href="css/pagedata.css">
</head>

<body>
    
    <h1>Daftar Mata Kuliah</h1>

    <form action="" method="post" id="formcaridata">
        <input type="text" name="caridata" id="caridata" placeholder="cari mata kuliah" autocomplete="off" size="30">
        <button type="button" name="cari" id="cari">cari</button>
        <button type="submit" name="cari" id="cari">cari</button>
    </form>
    <br>

    <a href="tambah.php" id="tambahdata">Tambah Matkul</a>
    <br><br>

    <div id="container">
        <table border="1" cellspacing="0" cellpadding="5">
            <tr>
                <th>No</th>
                <th>Kode Matkul</th>
                <th>Mata Kuliah</th>
                <th>SKS</th>
                <th>Tindakan</th>
            </tr>

            <?php $i = $awalData + 1;?>
            <?php foreach ($mataKuliah as $matkul) :?>
                <tr>
                    <td><?= $i;?></td>
                    <td><?= $matkul["kodemk"];?></td>
                    <td><?= $matkul["matkul"];;?></td>
                    <td><?= $matkul["sks"];;?></td>
                    <td>
                        <a href="ubah.php?id=<?= $matkul["id"];?>" id="ubahdata" value="<?= $matkul["id"];?>">
                            <img src="icons/ubah.png" alt="ubah" width="25" id="ubahdata" value="<?= $matkul['id'];?>">
                        </a>
                        ||
                        <a href="hapus.php?id=<?= $matkul["id"];?>" id="hapusdata" value="<?= $matkul["id"];?>">
                            <img src="icons/hapus.png" alt="hapus" width="25" id="hapusdata" value="<?= $matkul['id'];?>">
                        </a>
                    </td>
                </tr>
                <?php $i++?>
            <?php endforeach;?>
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