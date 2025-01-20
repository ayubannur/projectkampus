<?php

require "../function.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    if(tambah($_POST) > 0) {
        echo
        "<script>
            alert('Berhasil menambahkan mata kuliah')
        </script>";
    }else {
        echo
        "<script>
            alert('Berhasil menambahkan mata kuliah')
        </script>";
    }
}

?>
<link rel="stylesheet" href="css/pagetambah.css">

<a href="matkul.php" id="kembali">kembali ke halaman matkul</a>

<h1>Tambah Matkul</h1>  

<form action="" method="post" id="formtambah">
    <table border="1" cellspacing="0" cellpadding="5">
        <tr>
            <th>Data</th>
            <th>Isi Data</th>
        </tr>
        <tr>
            <td><label for="kodemk">Kode MK</label></td>
            <td>
                <input type="text" name="kodemk" id="kodemk" placeholder="Kode MK">
            </td>
        </tr>
        <tr>
            <td><label for="matkul">Mata Kuliah</label></td>
            <td>
                <input type="text" name="matkul" id="matkul" placeholder="Mata Kuliah">
            </td>
        </tr>
        <tr>
            <td><label for="sks">SKS</label></td>
            <td>
                <input type="text" name="sks" id="sks" placeholder="SKS">
            </td>
        </tr>
        <tr>
            <td colspan="2" align="center">
                <button type="button" name="submit" id="submit">Tambah</button>
            </td>
        </tr>

    </table>
</form>