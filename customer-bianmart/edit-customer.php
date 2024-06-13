<?php
// Menyertakan file koneksi
include 'config/koneksi.php';

// Memeriksa apakah parameter id_customer ada dalam URL
if (isset($_GET['id'])) {
    $id_customer = $_GET['id'];

    // Mengambil data customer berdasarkan id_customer
    $sql = "SELECT * FROM customer_bianmart WHERE id_customer = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id_customer);
    $stmt->execute();
    $result = $stmt->get_result();

    // Memeriksa apakah data customer ditemukan
    if ($result->num_rows > 0) {
        $customer = $result->fetch_assoc();
    } else {
        echo "Customer tidak ditemukan.";
        exit();
    }
} else {
    echo "ID Customer tidak ditemukan.";
    exit();
}

$stmt->close();
$conn->close();
?>

<div class="container my-4">
    <h2 class="mb-3">Edit Customer</h2>
    <form method="post" action="./config/proses_customer.php?action=edit">
        <div class="form-group">
            <label for="id_customer">ID Customer</label>
            <input type="text" class="form-control" id="id_customer" name="id_customer" value="<?php echo htmlspecialchars($customer['id_customer']); ?>" readonly>
        </div>
        <div class="form-group">
            <label for="nama_customer">Nama Customer</label>
            <input type="text" class="form-control" id="nama_customer" name="nama_customer" value="<?php echo htmlspecialchars($customer['nama_customer']); ?>" required>
        </div>
        <div class="form-group">
            <label for="alamat">Alamat</label>
            <textarea class="form-control" id="alamat" name="alamat" rows="3" required><?php echo htmlspecialchars($customer['alamat']); ?></textarea>
        </div>
        <div class="form-group">
            <label for="nomer_telepon">Nomor Telepon</label>
            <input type="text" class="form-control" id="nomer_telepon" name="nomer_telepon" value="<?php echo htmlspecialchars($customer['nomer_telepon']); ?>" required>
        </div>
        <div class="form-group">
            <label for="payment">Metode Pembayaran</label>
            <input type="text" class="form-control" id="payment" name="payment" value="<?php echo htmlspecialchars($customer['payment']); ?>" required>
        </div>
        <button type="submit" name="edit_customer" class="btn btn-primary">Update Customer</button>
    </form>
</div>
