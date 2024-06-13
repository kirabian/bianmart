<?php
// Menyertakan file koneksi
include 'config/proses_produk.php';

// Mengambil data dari tabel produk_bianmart
$sql = "SELECT id_produk, nama_produk, harga_produk, detail_produk, gambar_produk, kategori FROM produk_bianmart";
$result = $conn->query($sql);
?>

<style>
    body {
        background-color: #e0e0e0;
    }
    .container {
        margin-top: 20px;
    }
    .table {
        background-color: #ffffff; /* Warna putih */
        border-radius: 10px; /* Sudut bulat */
        box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1); /* Bayangan halus */
    }
    .table thead th {
        background-color: #343a40; /* Warna gelap */
        color: #ffffff; /* Warna teks putih */
        border-color: #dee2e6; /* Warna border */
    }
    .table-striped tbody tr:nth-of-type(odd) {
        background-color: #f8f9fa; /* Warna latar belakang untuk baris ganjil */
    }
    .table img {
        max-width: 100px; /* Batasan lebar gambar */
        height: auto;
    }
    .table td {
        vertical-align: middle;
    }
    .action-buttons {
        display: flex;
        gap: 0.5rem; /* Jarak antar tombol */
        flex-wrap: wrap;
    }
    @media (max-width: 768px) {
        .table-responsive {
            overflow-x: auto;
        }
        .action-buttons {
            flex-direction: column;
            gap: 0.2rem;
        }
    }
</style>

<div class="container my-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="mb-0">Daftar Produk Bianmart</h1>
        <a href="?page=inputproduk" class="btn btn-primary btn-sm">Tambah Produk Baru</a>
    </div>

    <div class="table-responsive p-3 rounded">
        <table class="table table-striped">
            <thead class="thead-dark">
                <tr>
                    <th>ID Produk</th>
                    <th>Nama Produk</th>
                    <th>Kategori</th>
                    <th>Harga Produk</th>
                    <th>Detail Produk</th>
                    <th>Gambar Produk</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($result->num_rows > 0) {
                    // Output data dari setiap row
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row["id_produk"] . "</td>";
                        echo "<td>" . $row["nama_produk"] . "</td>";
                        echo "<td>" . $row["kategori"] . "</td>"; // Menampilkan kategori
                        echo "<td>" . $row["harga_produk"] . "</td>";
                        echo "<td>" . $row["detail_produk"] . "</td>";
                        echo "<td><img src='" . $row["gambar_produk"] . "' alt='Gambar Produk' class='img-fluid'></td>";
                        echo "<td class='action-buttons'>";
                        echo "<a href='?page=editproduk&id=" . $row["id_produk"] . "' class='btn btn-warning btn-sm'>Edit</a>";
                        echo "<a href='?page=hapusproduk&id=" . $row["id_produk"] . "' class='btn btn-danger btn-sm' onclick='return confirm(\"Apakah Anda yakin ingin menghapus produk ini?\")'>Hapus</a>";
                        echo "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='7'>Tidak ada data ditemukan</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</div>
