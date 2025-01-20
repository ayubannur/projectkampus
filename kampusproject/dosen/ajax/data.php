<?php

require "../function.php";

$perPage = 3;
$halamanAktif = isset($_GET["halaman"]) ? (int)$_GET["halaman"] : 1;
$awalData = ($perPage * $halamanAktif) - $perPage;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    $keyword = $_POST["caridata"];
    $dosen = cari($keyword);
    $jumlahData = count($dosen);
    $jumlahHalaman = ceil($jumlahData / $perPage);
    $dosen = query("SELECT * FROM dosen WHERE 
                        kodedsn LIKE '%$keyword%' OR
                        nama LIKE '%$keyword%' OR
                        alamat LIKE '%$keyword%' OR
                        prodi LIKE '%$keyword%' OR
                        jabatan LIKE '%$keyword%'
                        LIMIT $awalData, $perPage");
} else {
    
    $dosen = query("SELECT * FROM dosen LIMIT $awalData, $perPage");
    $jumlahData = count(query("SELECT * FROM dosen"));
    $jumlahHalaman = ceil($jumlahData / $perPage);
}

?>
<link rel="stylesheet" href="css/pagedata.css?v.1">

<div class="containers-2">
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
                <td>
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