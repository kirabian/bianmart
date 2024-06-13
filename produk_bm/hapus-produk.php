<?php
include '<config/koneksi.php';

session_start();

if (isset($_GET['id'])) {
    $id_produk = $_GET['id'];

    // Menyiapkan query untuk menghapus data dari database
    $sql = "DELETE FROM produk_bianmart WHERE id_produk = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id_produk);

    // Menjalankan query dan memeriksa hasilnya
    if ($stmt->execute()) {
        header('Location: ?page=home&status=sukses');
    } else {
        echo "Gagal menghapus produk.";
    }
    
    $stmt->close();
} else {
    echo "ID produk tidak ditemukan.";
}

$conn->close();
?>
