<?php
require 'model.php';
$model = new model();

$recSem = $model->fetchsm();
// var_dump($recSem);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="ct">
        <div class="rw">
            <div class="cl">
                <h1> Laporan Stok Minimum </h1>
            </div>
        </div>
        <div class="rw">
            <div class="cl">
                <table>
                    <thead>
                        <th>No</th>
                        <th>ID BARANG</th>
                        <th>NAMA BARANG</th>
                        <th>HARGA</th>
                        <th>STOK</th>
                    </thead>
                    <?php
                    $no=1;
                foreach($recSem as $recmin){   
                }
                    ?>
                    <tbody>
                        <td><?=$no++;?></td>
                        <td><?=$recmin['idbarang']?></td>
                        <td><?=$recmin['namabarang']?></td>
                        <td><?=$recmin['harga']?></td>
                        <td><?=$recmin['stok']?></td>
                    </tbody>
                    <?php
                    
                    ?>
                </table>
            </div>
        </div>
    </div>
</body>
</html>