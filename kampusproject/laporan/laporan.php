<?php

require 'function.php';

$tables = query("SHOW TABLES");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan</title>
    <link rel="stylesheet" href="css/pagedata.css?v1">
</head>
<body>

    <h1>Laporan Total Data</h1>

    <div class="laporan">
        <table>
            <tr>    
                <th>Nomer</th>
                <th>Data</th>
                <th>Total</th>
            </tr>
        <?php $i = 1 ;?>    
        <?php foreach($tables as $row) :?>
            <tr>
                <td><?= $i?></td>
                <td><?= $row[0]?></td>
                <td><?= totalData($row[0]); ?></td>
            </tr>
        <?php $i++ ;?>  
        <?php endforeach; ?>
        </table>
    </div>
</body>
</html>