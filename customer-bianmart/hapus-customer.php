<?php
// Menyertakan file koneksi
include 'config/koneksi.php';

// Memeriksa apakah parameter id_customer ada dalam URL
if (isset($_GET['id'])) {
    $id_customer = $_GET['id'];

    // Query untuk menghapus data customer berdasarkan id_customer
    $sql = "DELETE FROM customer_bianmart WHERE id_customer = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id_customer);

    // Eksekusi statement
    if ($stmt->execute()) {
        header('Location: ?page=listcustomer');
    } else {
        echo "Gagal menghapus customer.";
    }

    // Menutup statement
    $stmt->close();
} else {
    echo "ID Customer tidak ditemukan.";
}

// Menutup koneksi database
$conn->close();
?>
