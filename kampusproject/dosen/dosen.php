<?php

require "function.php";

$dosen = query("SELECT * FROM dosen");

$perPage = 3;
$jumlahData = count(query("SELECT * FROM dosen"));
$jumlahHalaman = ceil($jumlahData/$perPage);
$halamanAktif = ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET["halaman"])) ? (int)$_GET["halaman"] : 1;
$awalData = ($perPage * $halamanAktif) - $perPage;

$dosen = query("SELECT * FROM dosen LIMIT $awalData, $perPage");

if (isset($_POST["cari"])) {
    
    $dosen = cari($_POST["caridata"]);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dosen</title>
    <link rel="stylesheet" href="css/pagedata.css">
</head>

<body>

    <h1>Daftar Dosen</h1>

    <form action="" method="post" id="formcaridata">
        <input type="text" name="caridata" id="caridata" placeholder="cari dosen" autocomplete="off" size="30">
        <button type="button" name="cari" id="cari">cari</button>
        <button type="submit" name="cari" id="cari">cari</button>
    </form>
    <br>

    <a href="tambah.php" id="tambahdata">Tambah dosen</a>
    <br><br>

    <div id="container">
        <table border="1" cellpadding="5" cellspacing="0">
            <tr>
                <th>No</th>
                <th>Kode Dosen</th>
                <th>Nama</th>
                <th>Alamat</th>
                <th>Prodi</th>
                <th>Jabatan</th>
                <th>Tindakan</th>
            </tr>

            <?php $i = $awalData + 1;;?>
            <?php foreach($dosen as $dsn) :?>   
                <tr>
                    <td><?= $i;?></td>
                    <td><?= $dsn["kodedsn"];?></td>
                    <td><?= $dsn["nama"];?></td>
                    <td><?= $dsn["alamat"];?></td>
                    <td><?= $dsn["prodi"];?></td>
                    <td><?= $dsn["jabatan"];?></td>
                    <td align="center">
                        <a href="ubah.php?id=<?= $dsn['id'];?>" id="ubahdata" value="<?= $dsn['id'];?>">
                            <img src="icons/ubah.png" alt="ubah" width="25" id="ubahdata" value="<?= $dsn['id'];?>">
                        </a>
                        ||
                        <a href="hapus.php?id=<?= $dsn['id'];?>" id="hapusdata" value="<?= $dsn['id'];?>">
                            <img src="icons/hapus.png" alt="hapus" width="25" id="hapusdata" value="<?= $dsn['id'];?>">
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