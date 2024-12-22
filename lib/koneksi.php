<?php
// Konfigurasi database
$conn = new mysqli("localhost", "root", "", "cikuda_explore");

// Cek koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
} 