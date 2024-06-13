<?php
// Menyertakan file koneksi
include 'koneksi.php';

session_start();

// Inisialisasi variabel $stmt
$stmt = null;

if (isset($_POST['submit'])) {
    // Insert data baru
    $nama_customer = $_POST['nama_customer'];
    $alamat = $_POST['alamat'];
    $nomer_telepon = $_POST['nomer_telepon'];
    $payment = $_POST['payment'];

    // Query untuk insert data
    $sql = "INSERT INTO customer_bianmart (nama_customer, alamat, nomer_telepon, payment) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssss", $nama_customer, $alamat, $nomer_telepon, $payment);

    if ($stmt->execute()) {
        header('Location: ../?page=listcustomer');
    } else {
        echo "Gagal menambahkan customer.";
    }

} elseif (isset($_POST['edit_customer'])) {
    // Edit data customer
    $id_customer = $_POST['id_customer'];
    $nama_customer = $_POST['nama_customer'];
    $alamat = $_POST['alamat'];
    $nomer_telepon = $_POST['nomer_telepon'];
    $payment = $_POST['payment'];

    // Query untuk update data
    $sql = "UPDATE customer_bianmart SET nama_customer=?, alamat=?, nomer_telepon=?, payment=? WHERE id_customer=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssi", $nama_customer, $alamat, $nomer_telepon, $payment, $id_customer);

    if ($stmt->execute()) {
        header('Location: ../?page=listcustomer');
    } else {
        echo "Gagal mengedit customer.";
    }
}

// Memastikan $stmt ditutup jika telah didefinisikan
if ($stmt instanceof mysqli_stmt) {
    $stmt->close();
}

$conn->close();
?>
