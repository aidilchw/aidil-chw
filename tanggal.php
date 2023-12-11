<?php
require 'model.php';
$model = new model();

$recSem = $model->fetchtg();
// var_dump($recSem);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/s1.css">
    <title>Document</title>
</head>
<body>
    <div class="ct">
        <div class="rw">
            <div class="cl">
                <h1> Penjualan </h1>
            </div>
        </div>
        <div class="rw">
            <div class="cl">
                <table>
                    <thead>
                        <th>No</th>
                        <th>ID BARANG</th>
                        <th>NAMA BARANG</th>
                        <th>TANGGAL</th>
                        <th>TOTAL PENJUALAN</th>
                    </thead>
                    <?php
                    $no=1;
                foreach($recSem as $rectgl){   
                
                    ?>
                    <tbody>
                        <td><?=$no++;?></td>
                        <td><?=$rectgl['idbarang']?></td>
                        <td><?=$rectgl['namabarang']?></td>
                        <td><?=$rectgl['tgl']?></td>
                        <td><?=$rectgl['totalpenjualan']?></td>
                    </tbody>
                    <?php
                }    
                    ?>
                </table>
            </div>
        </div>
    </div>
</body>
</html>