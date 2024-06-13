<?php
// Menyertakan file koneksi
include './config/koneksi.php';

// Mengambil data dari tabel customer_bianmart
$sql = "SELECT id_customer, nama_customer, alamat, nomer_telepon, payment FROM customer_bianmart";
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

    .notes {
        margin-top: 20px;
        font-style: italic;
    }

    .notes i {
        margin-right: 5px;
    }
</style>

<div class="container my-4">
    <h2 class="mb-3">Daftar Customer</h2>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID Customer</th>
                <th>Nama Customer</th>
                <th>Alamat</th>
                <th>Nomor Telepon</th>
                <th>Metode Pembayaran</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo '<tr>';
                    echo '    <td>' . $row["id_customer"] . '</td>';
                    echo '    <td>' . $row["nama_customer"] . '</td>';
                    echo '    <td>' . $row["alamat"] . '</td>';
                    echo '    <td>' . $row["nomer_telepon"] . '</td>';
                    echo '    <td>' . $row["payment"] . '</td>';
                    echo '    <td>';
                    echo '        <a href="?page=editcustomer&id=' . $row["id_customer"] . '" class="btn btn-warning btn-sm">Edit</a>';
                    echo '        <a href="?page=hapuscustomer&id=' . $row["id_customer"] . '" class="btn btn-danger btn-sm" onclick="return confirm(\'Apakah Anda yakin ingin menghapus customer ini?\')">Hapus</a>';
                    echo '    </td>';
                    echo '</tr>';
                }
            } else {
                echo '<tr><td colspan="6">Tidak ada customer yang ditemukan.</td></tr>';
            }
            ?>
        </tbody>
    </table>
    <div class="notes">
        <p><i class="fas fa-info-circle"></i> Untuk memasukkan data customer, Anda harus pergi ke halaman utama, lalu pilih salah satu produk, dan klik tombol "Beli Sekarang". Anda akan diarahkan ke formulir pengisian data customer. Isilah data sesuai yang diminta di formulir, lalu klik "Submit". Setelah itu, Anda akan langsung diarahkan ke halaman daftar customer dan data akan masuk ke dalam database.</p>
    </div>
</div>
