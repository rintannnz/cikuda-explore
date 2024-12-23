<?php
include "lib/koneksi.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
      rel="stylesheet"
    />
</head>
<body>
<?php
    include "components/navbar.php";
?>
<div class="container mt-5">
        <h1 class="text-center mb-4">Data Pemesanan</h1>
        <div class="table-responsive">
            <table class="table table-striped table-bordered">
                <thead class="table-dark">
                    <tr>
                        <th>No</th>
                        <th>Nama Pemesan</th>
                        <th>HP Pemesan</th>
                        <th>Waktu Wisata</th>
                        <th>Hari Wisata</th>
                        <th>Paket Inap</th>
                        <th>Paket Transport</th>
                        <th>Paket Makan</th>
                        <th>Jumlah Peserta</th>
                        <th>Total</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php

                    // Query untuk mengambil data
                    $sql = "SELECT * FROM pemesanan where is_deleted=0";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        $no = 1;
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>
                                <td>{$no}</td>
                                <td>{$row['nama_pemesanan']}</td>
                                <td>{$row['hp_pemesan']}</td>
                                <td>{$row['waktu_wisata']}</td>
                                <td>{$row['hari_wisata']}</td>
                                <td>" . ($row['paket_inap'] ? "Ya" : "Tidak") . "</td>
                                <td>" . ($row['paket_transport'] ? "Ya" : "Tidak") . "</td>
                                <td>" . ($row['paket_makan'] ? "Ya" : "Tidak") . "</td>
                                <td>{$row['jumlah_peserta']}</td>
                                <td>Rp " . number_format($row['total_tagihan'], 0, ',', '.') . "</td>
                                <td>
                                    <a href='main/detail_pemesan.php?id={$row['id']}' class='btn btn-info btn-sm'>Lihat Detail</a>
                                    <a href='lib/hapus.php?id={$row['id']}' class='btn btn-danger btn-sm' onclick='return confirm(\"Apakah Anda yakin ingin menghapus data ini?\")'>Hapus</a>
                                    <a href='index.php?aksi=edit&id={$row['id']}' class='btn btn-warning btn-sm'>edit</a>
                                </td>
                            </tr>";
                            $no++;
                        }
                    } else {
                        echo "<tr>
                            <td colspan='12' class='text-center'>Tidak ada data.</td>
                        </tr>";
                    }

                    $conn->close();
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>