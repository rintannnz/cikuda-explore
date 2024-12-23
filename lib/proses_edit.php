<?php
// proses_edit.php
include "koneksi.php";

if(isset($_POST['update'])) {
    $id = $_POST['id'];
    $nama_pemesanan = $_POST['nama_pemesanan'];
    $hp_pemesan = $_POST['hp_pemesan'];
    $waktu_wisata = $_POST['waktu_wisata'];
    $hari_wisata = $_POST['hari_wisata'];
    $jumlah_peserta = $_POST['jumlah_peserta'];
    $total_tagihan = $_POST['total'];
    
    // Proses checkbox
    $paket_inap = isset($_POST['paket_inap']) ? 1 : 0;
    $paket_transport = isset($_POST['paket_transport']) ? 1 : 0;
    $paket_makan = isset($_POST['paket_makan']) ? 1 : 0;

    // Query update
    $query = "UPDATE pemesanan SET 
                nama_pemesanan = '$nama_pemesanan',
                hp_pemesan = '$hp_pemesan',
                waktu_wisata = '$waktu_wisata',
                hari_wisata = '$hari_wisata',
                jumlah_peserta = '$jumlah_peserta',
                total_tagihan = '$total_tagihan',
                paket_inap = '$paket_inap',
                paket_transport = '$paket_transport',
                paket_makan = '$paket_makan'
              WHERE id = '$id'";
    
    $result = mysqli_query($conn, $query);

    if($result) {
        echo "<script>
                alert('Data berhasil diupdate');
                window.location.href='../index.php?aksi=beranda';
              </script>";
    } else {
        echo "<script>
                alert('Gagal update data');
                window.location.href='edit.php?id=$id';
              </script>";
    }
}
?>