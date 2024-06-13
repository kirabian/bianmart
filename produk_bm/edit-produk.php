<?php
// Menyertakan file koneksi
include 'config/koneksi.php';

// Memeriksa apakah parameter id_produk ada dalam URL
if (isset($_GET['id'])) {
    $id_produk = $_GET['id'];

    // Mengambil data produk berdasarkan id_produk
    $sql = "SELECT * FROM produk_bianmart WHERE id_produk = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id_produk);
    $stmt->execute();
    $result = $stmt->get_result();

    // Memeriksa apakah data produk ditemukan
    if ($result->num_rows > 0) {
        $produk = $result->fetch_assoc();
    } else {
        echo "Produk tidak ditemukan.";
        exit();
    }
} else {
    echo "ID Produk tidak ditemukan.";
    exit();
}

$stmt->close();
$conn->close();
?>

<div class="container my-4">
    <h2 class="mb-3">Edit Produk</h2>
    <form method="post" action="./config/proses_produk.php?aksi=edit" enctype="multipart/form-data">
        <div class="form-group">
            <label for="nama_produk">Nama Produk</label>
            <input type="text" class="form-control" id="nama_produk" name="nama_produk" value="<?php echo htmlspecialchars($produk['nama_produk']); ?>" required>
        </div>
        <div class="form-group">
            <label for="kategori">Kategori</label>
            <input type="text" class="form-control" id="kategori" name="kategori" value="<?php echo htmlspecialchars($produk['kategori']); ?>" required>
        </div>
        <div class="form-group">
            <label for="harga_produk">Harga Produk</label>
            <input type="number" class="form-control" id="harga_produk" name="harga_produk" value="<?php echo htmlspecialchars($produk['harga_produk']); ?>" required>
        </div>
        <div class="form-group">
            <label for="detail_produk">Detail Produk</label>
            <textarea class="form-control" id="detail_produk" name="detail_produk" rows="3" required><?php echo htmlspecialchars($produk['detail_produk']); ?></textarea>
        </div>
        <div class="form-group">
            <label for="gambar_produk">Gambar Produk</label>
            <input type="file" class="form-control-file" id="gambar_produk" name="gambar_produk">
            <!-- Menampilkan gambar yang ada -->
            <img src="<?php echo htmlspecialchars($produk['gambar_produk']); ?>" alt="Gambar Produk" class="img-fluid mt-2" style="max-width: 200px;">
        </div>
        <input type="hidden" name="id_produk" value="<?php echo $produk['id_produk']; ?>">
        <button type="submit" name="edit" class="btn btn-primary">Update Produk</button>
    </form>
</div>
