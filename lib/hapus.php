<?php
include 'koneksi.php';

// $id_pemesanan = htmlentities($_GET['id']);

// $sql = "SELECT * FROM pemesanan where id = '$id_pemesanan' and is_deleted=0";

// $query = mysqli_query($conn,$sql);

// if(mysqli_num_rows($query)==0)
// {
//     echo 'tidak ada'; exit;
// }else{
//     $sql_hapus = "UPDATE pemesanan SET is_deleted='1' where id ='$id_pemesanan'";
//     $query_hapus = mysqli_query($conn,$sql_hapus);
//     //var_dump($sql_hapus); exit;
//     if($query_hapus)
//     {
//         header('Location: ../index.php?aksi=detail');
//     }else{
//         header('Location: ../main/detail_pemesan.php?id'.$id_pemesanan);
//     }
// }
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Query untuk menghapus data berdasarkan id
    $sql = "DELETE FROM pemesanan WHERE id = $id";

    if (mysqli_query($conn, $sql)) {
        // Redirect ke halaman daftar pemesanan setelah sukses menghapus
        header("Location: ../index.php?aksi=detail");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
} else {
    echo "ID tidak ditemukan!";
}

// Tutup koneksi
mysqli_close($conn);