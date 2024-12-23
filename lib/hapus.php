<?php
include 'koneksi.php';

$id_pemesanan = htmlentities($_GET['id']);

$sql = "SELECT * FROM pemesanan where id = '$id_pemesanan' and is_deleted=0";

$query = mysqli_query($conn,$sql);

if(mysqli_num_rows($query)==0)
{
    echo 'tidak ada'; exit;
}else{
    $sql_hapus = "UPDATE pemesanan SET is_deleted='1' where id ='$id_pemesanan'";
    $query_hapus = mysqli_query($conn,$sql_hapus);
    //var_dump($sql_hapus); exit;
    if($query_hapus)
    {
        header('Location: ../main/daftar_pemesan.php');
    }else{
        header('Location: ../main/detail_pemesan.php?id'.$id_pemesanan);
    }
}