<?php

require "function.php";

$id =  $_GET["id"];

if(hapus($id) > 0) {
    echo
        "<script>
            alert('Berhasil menghapus mata kuliah')
            document.location.href = 'matkul.php' 
        </script>";
}else {
    echo
        "<script>
            alert('Gagal menghapus mata kuliah')
            document.location.href = 'matkul.php' 
        </script>";
}

?>