<?php
$aksi = $_GET['aksi'];

switch($aksi){
    case 'detail':
        include 'main/daftar_pemesan.php';
    break;
    case 'daftar':
        include 'main/pemesanan.php';
    break;
    
    default:
        include 'main/beranda.php';
    break;
}

?>