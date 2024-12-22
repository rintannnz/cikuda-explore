<?php
include "koneksi.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {
    // Ambil data dari form
    $nama_pemesanan = $_POST['nama_pemesanan'];
    $hp_pemesan = $_POST['hp_pemesan'];
    $waktu_wisata = $_POST['waktu_wisata'];
    $hari_wisata = $_POST['hari_wisata'];
    $paket_inap = isset($_POST['paket_inap']) ? 1 : 0;
    $paket_transport = isset($_POST['paket_transport']) ? 1 : 0;
    $paket_makan = isset($_POST['paket_makan']) ? 1 : 0;
    $jumlah_peserta = $_POST['jumlah_peserta'];
    $total = $_POST['total'];

    // Query untuk menambahkan data
    $sql = "INSERT INTO pemesanan 
            (nama_pemesanan, hp_pemesan, waktu_wisata, hari_wisata, 
            paket_inap, paket_transport, paket_makan, jumlah_peserta, total_tagihan)
            VALUES ('$nama_pemesanan', '$hp_pemesan', '$waktu_wisata', '$hari_wisata', 
            '$paket_inap', '$paket_transport', '$paket_makan', '$jumlah_peserta', '$total')";
    // Eksekusi query
    if ($conn->query($sql) === TRUE) {
       header("Location:../index.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>