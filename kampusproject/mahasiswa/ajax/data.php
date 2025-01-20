<?php

require "../function.php";

$perPage = 3;
$halamanAktif = isset($_GET["halaman"]) ? (int)$_GET["halaman"] : 1;
$awalData = ($perPage * $halamanAktif) - $perPage;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    $keyword = $_POST["caridata"];
    $mahasiswa = cari($keyword);
    $jumlahData = count($mahasiswa);
    $jumlahHalaman = ceil($jumlahData / $perPage);
    $mahasiswa = query("SELECT * FROM mahasiswa WHERE 
                        nama LIKE '%$keyword%' OR
                        nbi LIKE '%$keyword%' OR
                        alamat LIKE '%$keyword%' OR
                        prodi LIKE '%$keyword%' OR
                        ipk LIKE '%$keyword%'
                        LIMIT $awalData, $perPage");
} else {
    
    $mahasiswa = query("SELECT * FROM mahasiswa LIMIT $awalData, $perPage");
    $jumlahData = count(query("SELECT * FROM mahasiswa"));
    $jumlahHalaman = ceil($jumlahData / $perPage);
}
?>
<link rel="stylesheet" href="css/pagedata.css?v.1">

<div class="container-2">
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