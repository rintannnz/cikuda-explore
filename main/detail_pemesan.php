<?php
include "../lib/koneksi.php";

// Pastikan ada ID yang dikirimkan melalui URL
if (isset($_GET['id'])) {
    $id = intval($_GET['id']); // Ambil dan pastikan ID berupa angka

    // Query untuk mengambil data pemesan berdasarkan ID
    $sql = "SELECT * FROM pemesanan WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();

    // Periksa apakah data ditemukan
    if ($result->num_rows > 0) {
        $data = $result->fetch_assoc();
    } else {
        echo "Data tidak ditemukan!";
        exit;
    }
} else {
    echo "ID pemesan tidak disediakan!";
    exit;
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Pemesan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script>
        function printPage() {
            window.print();
        }
    </script>
    <style>
        @media print {
            .no-print {
                display:none;
            }
        }
    </style>
</head>

<body>
    <div class="container mt-5">
        <h1 class="text-center">Detail Pemesan</h1>
        <table class="table table-bordered mt-4">
            <tr>
                <th>Nama Pemesan</th>
                <td><?= htmlspecialchars($data['nama_pemesanan']); ?></td>
            </tr>
            <tr>
                <th>No. HP</th>
                <td><?= htmlspecialchars($data['hp_pemesan']); ?></td>
            </tr>
            <tr>
                <th>Waktu Wisata</th>
                <td><?= htmlspecialchars($data['waktu_wisata']); ?></td>
            </tr>
            <tr>
                <th>Hari Wisata</th>
                <td><?= htmlspecialchars($data['hari_wisata']); ?></td>
            </tr>
            <tr>
                <th>Paket Inap</th>
                <td><?= $data['paket_inap'] ? 'Ya' : 'Tidak'; ?></td>
            </tr>
            <tr>
                <th>Paket Transport</th>
                <td><?= $data['paket_transport'] ? 'Ya' : 'Tidak'; ?></td>
            </tr>
            <tr>
                <th>Paket Makan</th>
                <td><?= $data['paket_makan'] ? 'Ya' : 'Tidak'; ?></td>
            </tr>
            <tr>
                <th>Jumlah Peserta</th>
                <td><?= htmlspecialchars($data['jumlah_peserta']); ?></td>
            </tr>
            <tr>
                <th>Total</th>
                <td>Rp<?= number_format($data['total_tagihan'], 0, ',', '.'); ?></td>
            </tr>
        </table>
        <div class="d-flex justify-content-between mt-4">
            <a href="../index.php" class="btn btn-secondary no-print">Kembali</a>
            <button class="btn btn-primary no-print" onclick="printPage()">Cetak</button>
        </div>
    </div>
</body>

</html>