 <?php

require 'model.php';
$model = new model();

$recordBarang = $model->fetchBarang();
// var_dump($recordBarang);
// die;

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="short icon" href="foto/images.jpeg">
    <link rel="stylesheet" href="style/lapper.css">
    <title>Penjualan</title>
</head>
<body>

<section class="parallax">
    <h2 id="text">parallax</h2>
</section>

    <div class="containers">
        <div class="row1">
            <h1> Nama Barang <br> </h1>
            </div>

        <div class="row">           
            <div class="cl">                
                <table border="2">
                <tr>
                    <th>NO</th>
                    <th>Barang</th>
                    <th>Nama Barang</th>
                    <th>harga</th>
                    <th>Stok</th>
                    <th>Persediaan Rp.</th>
                </tr>
                <?php
                $nomor=1;
                $persediaan=0;
                $totpersediaan=0;
                    foreach($recordBarang as $barang){
$persediaan = $barang ['harga'] * $barang ['stok'];
$totpersediaan = $totpersediaan + $persediaan;

                        ?>
                        <tbody>
                            <td> <? = $nomor++; ?>   </td>
                            <td align ="center"> <?= $barang ['idbarang']?></td>
                            <td align ="left"> <?=$barang ['namabarang']?></td>
                            <td align ="right"> <?= number_format ($barang ['harga'])?></td>
                            <td align ="center"> <?= $barang ['stok']?></td>
                            <td align ="right"> <?= number_format($persediaan); ?></td>
                        </tbody>
                        <?php
                    }
                ?>   
                <tr>
                    <th colspan = "5">Total Persediaan Rp.</th>
                    <td align = "right"><?= number_format($totpersediaan); ?></td>
                </tr>  
                </table>
            </div>
        </div>
    </div>
    </div>
</body>

</html>
