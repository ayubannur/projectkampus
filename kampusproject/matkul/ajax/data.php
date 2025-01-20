<?php

require "../function.php";

$perPage = 3;
$halamanAktif = isset($_GET["halaman"]) ? (int)$_GET["halaman"] : 1;
$awalData = ($perPage * $halamanAktif) - $perPage;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    $keyword = $_POST["caridata"];
    $mataKuliah = cari($keyword);
    $jumlahData = count($mataKuliah);
    $jumlahHalaman = ceil($jumlahData / $perPage);
    $mataKuliah = query("SELECT * FROM matakuliah WHERE 
                        kodemk LIKE '%$keyword%' OR
                        matkul LIKE '%$keyword%' OR
                        sks LIKE '%$keyword%'
                        LIMIT $awalData, $perPage");
} else {
    
    $mataKuliah = query("SELECT * FROM matakuliah LIMIT $awalData, $perPage");
    $jumlahData = count(query("SELECT * FROM matakuliah"));
    $jumlahHalaman = ceil($jumlahData / $perPage);
}
?>
<link rel="stylesheet" href="css/pagedata.css?v.1">

<div class="container-2">
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

    <div id="pagination-2">
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