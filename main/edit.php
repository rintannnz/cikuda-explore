<?php
// edit.php
include "../lib/koneksi.php";

// Ambil ID dari parameter URL
$id = $_GET['id'];

// Query untuk mengambil data berdasarkan ID
$query = "SELECT * FROM pemesanan WHERE id = '$id'";
$result = mysqli_query($conn, $query);
$data = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Edit Pemesanan - Salty</title>
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
        rel="stylesheet" />
    <link rel="stylesheet" href="style.css" />
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css"
        rel="stylesheet" />
</head>

<body class="bg-light mb-5">
    <nav class="navbar navbar-expand-lg bg-body-tertiary fixed-top">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Salty</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="daftar_pemesanan.php">Daftar Pemesanan</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <main class="form flex-shrink-0 my-5">
        <div class="container">
            <form method="post" action="../lib/proses_edit.php">
                <div class="card mt-2">
                    <div class="card-header bg-dark text-white">
                        Edit Pemesanan Paket Wisata
                    </div>
                    <div class="card-body">
                        <input type="hidden" name="id" value="<?php echo $data['id']; ?>">
                        
                        <div class="mb-3">
                            <label for="nama_pemesanan" class="form-label">Nama Lengkap</label>
                            <input type="text" class="form-control" id="nama_pemesanan" name="nama_pemesanan" 
                                   value="<?php echo $data['nama_pemesanan']; ?>" required>
                        </div>
                        
                        <div class="mb-3">
                            <label for="hp_pemesan" class="form-label">Nomor Handphone</label>
                            <input type="text" class="form-control" id="hp_pemesan" name="hp_pemesan" 
                                   value="<?php echo $data['hp_pemesan']; ?>" required>
                        </div>
                        
                        <div class="mb-3">
                            <label for="waktu_wisata" class="form-label">Waktu Mulai Perjalanan</label>
                            <input type="date" class="form-control" id="waktu_wisata" name="waktu_wisata" 
                                   value="<?php echo $data['waktu_wisata']; ?>" required>
                        </div>
                        
                        <div class="mb-3">
                            <label for="hari_wisata" class="form-label">Hari Wisata</label>
                            <input type="number" class="form-control" id="hari_wisata" name="hari_wisata" 
                                   value="<?php echo $data['hari_wisata']; ?>" required>
                        </div>
                        
                        <div class="mb-3">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="paket_inap" value="1" id="paket_inap"
                                    <?php echo ($data['paket_inap'] == 1) ? 'checked' : ''; ?>>
                                <label class="form-check-label" for="paket_inap">
                                    Penginapan (Rp. 1.000.000)
                                </label>
                            </div>
                        </div>
                        
                        <div class="mb-3">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="paket_transport" value="1" id="paket_transport"
                                    <?php echo ($data['paket_transport'] == 1) ? 'checked' : ''; ?>>
                                <label class="form-check-label" for="paket_transport">
                                    Transportasi (Rp. 1.200.000)
                                </label>
                            </div>
                        </div>
                        
                        <div class="mb-3">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="paket_makan" value="1" id="paket_makan"
                                    <?php echo ($data['paket_makan'] == 1) ? 'checked' : ''; ?>>
                                <label class="form-check-label" for="paket_makan">
                                    Service/ Makan (Rp. 500.000)
                                </label>
                            </div>
                        </div>
                        
                        <div class="mb-3">
                            <label for="jumlah_peserta" class="form-label">Jumlah Peserta</label>
                            <input type="number" class="form-control" id="jumlah_peserta" name="jumlah_peserta" 
                                   value="<?php echo $data['jumlah_peserta']; ?>" required>
                        </div>
                        
                        <div class="mb-3">
                            <label for="total" class="form-label">Total Tagihan</label>
                            <input type="number" class="form-control" id="total" name="total" 
                                   value="<?php echo $data['total_tagihan']; ?>">
                        </div>
                    </div>
                    
                    <div class="card-footer">
                        <button name="update" type="submit" class="btn btn-primary">Update Pemesanan</button>
                        <a href="daftar_pemesanan.php" class="btn btn-secondary">Kembali</a>
                    </div>
                </div>
            </form>
        </div>
    </main>

    <script>
        // Gunakan script yang sama dengan form sebelumnya untuk perhitungan
        const paket_inap = 1000000;
        const paket_transport = 1200000;
        const paket_makan = 500000;

        function updateTotalCost() {
            let totalCost = 0;
            const inapCheckbox = document.getElementById('paket_ inap');
            const transportCheckbox = document.getElementById('paket_transport');
            const makanCheckbox = document.getElementById('paket_makan');

            if (inapCheckbox.checked) {
                totalCost += paket_inap;
            }
            if (transportCheckbox.checked) {
                totalCost += paket_transport;
            }
            if (makanCheckbox.checked) {
                totalCost += paket_makan;
            }

            document.getElementById('harga').value = totalCost;
        }

        function updateTotal() {
            let TotalTagihan = 0;
            var hari_wisata = document.getElementById('hari_wisata').value;
            var jumlah_peserta = document.getElementById('jumlah_peserta').value;
            var harga = document.getElementById('harga').value;

            TotalTagihan = hari_wisata * jumlah_peserta * harga;
            document.getElementById('total').value = TotalTagihan;
        }

        document.getElementById('paket_inap').addEventListener('change', updateTotalCost);
        document.getElementById('paket_transport').addEventListener('change', updateTotalCost);
        document.getElementById('paket_makan').addEventListener('change', updateTotalCost);
        document.getElementById('hari_wisata').addEventListener('change', updateTotal);
        document.getElementById('jumlah_peserta').addEventListener('change', updateTotal);

        updateTotalCost();
        updateTotal();
    </script>
</body>
</html>