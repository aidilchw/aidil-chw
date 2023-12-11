<?php

class model{

    private $server = 'localhost';
    private $username = 'root';
    private $password;
    private $db = 'penjualanlaris';
    private $conn;

    public function __construct(){
        try{
            $this->conn= new mysqli($this->server, $this->username, $this->password, $this->db);
        }
        catch(Exception $e){
            echo "Koneksi Ke DataBase Gagal.." .$e->getmessage();
        }
    }
    public function fetchBarang(){
        $data=null;

        $query = " SELECT * FROM `barang` ";
        if ($sql = $this->conn->query($query)){
            while( $row = mysqli_fetch_assoc($sql)){
                $data[] = $row;
            }
        }
        return $data;
    }

    public function fetchsm(){
        $data=null;

        $query = " SELECT * FROM `barang` WHERE barang.stok = (SELECT MIN(barang.stok)FROM barang); ";
        if ($sql = $this->conn->query($query)){
            while( $row = mysqli_fetch_assoc($sql)){
                $data[] = $row;
            }
        }
        return $data;
    }

    public function fetchmx(){
        $data=null;

        $query = " SELECT * FROM `barang` WHERE barang.stok = (SELECT MAX(barang.stok) FROM barang); ";
        if ($sql = $this->conn->query($query)){
            while( $row = mysqli_fetch_assoc($sql)){
                $data[] = $row;
            }
        }
        return $data;
    }

    public function fetchdt(){
        $data=null;
        $query = " SELECT jual.idbarang, barang.namabarang, jual.tgl, COUNT(jual.jml) AS BerapaBarangTerjual 
        FROM jual INNER JOIN barang ON jual.idbarang = barang.idbarang GROUP BY jual.idbarang;";
        if ($sql = $this->conn->query($query)){
            while ($row =mysqli_fetch_assoc($sql)){
                $data[] = $row;
            }
        return $data;
    } 
}

    public function fetchtg(){
        $data=null;
        $query = " SELECT jual.idbarang, barang.namabarang, jual.tgl, SUM(jual.jml) AS totalpenjualan 
        FROM jual INNER JOIN barang ON jual.idbarang = barang.idbarang WHERE date (jual.tgl) = '2023/10/02' 
        GROUP BY jual.idbarang, barang.namabarang, jual.tgl;";
        if ($sql = $this->conn->query($query)){
            while ($row =mysqli_fetch_assoc($sql)){
                $data[] = $row;
            }
        return $data;
    } 
    }

    public function fetchrt(){
        $data=null;
        $query = " SELECT jual.idbarang, barang.namabarang, jual.tgl, AVG(jual.jml) AS RataRataPenjualan 
        FROM jual INNER JOIN barang ON jual.idbarang= barang.idbarang GROUP BY jual.idbarang, barang.namabarang, jual.tgl;";
        if ($sql = $this->conn->query($query)){
            while ($row =mysqli_fetch_assoc($sql)){
                $data[] = $row;
            }
        return $data;
    } 
    }

}
?>