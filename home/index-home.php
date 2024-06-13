<?php
// Menyertakan file koneksi
include 'config/koneksi.php';

// Mengambil data dari tabel produk_bianmart
$sql = "SELECT id_produk, nama_produk, harga_produk, detail_produk, gambar_produk FROM produk_bianmart";
$result = $conn->query($sql);
?>

<style>
       body {
            background-color: #e0e0e0;
        }
        .card {
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: transform 0.2s, box-shadow 0.2s;
            background-color: #fff;
        }
        .card:hover {
            transform: scale(1.05);
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.2);
        }
        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
        }
        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #004080;
        }
        .carousel-inner img {
            border-radius: 10px;
        }
        .category-icon {
            color: #007bff;
        }
        .category-card {
            background-color: #fff;
            border: none;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            transition: transform 0.2s, box-shadow 0.2s;
        }
        .category-card:hover {
            transform: scale(1.05);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.15);
        }
</style>

<div class="container my-4">
    <!-- Banner -->
    <div id="bannerCarousel" class="carousel slide mb-4" data-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="assets/img/open.jpg" srcset="assets/img/open.jpg 1920w, assets/img/open.jpg 1200w, assets/img/open.jpg 800w" sizes="(max-width: 576px) 800px, (max-width: 768px) 1200px, 1920px" class="d-block w-100" alt="Banner 1">
            </div>
            <div class="carousel-item">
                <img src="assets/img/owner.jpg" srcset="assets/img/owner.jpg 1920w, assets/img/owner.jpg 1200w, assets/img/owner.jpg 800w" sizes="(max-width: 576px) 800px, (max-width: 768px) 1200px, 1920px" class="d-block w-100" alt="Banner 2">
            </div>
            <div class="carousel-item">
                <img src="assets/img/blackfriday.jpg" srcset="assets/img/blackfriday.jpg 1920w, assets/img/blackfriday.jpg 1200w, assets/img/blackfriday.jpg 800w" sizes="(max-width: 576px) 800px, (max-width: 768px) 1200px, 1920px" class="d-block w-100" alt="Banner 3">
            </div>
        </div>
        <a class="carousel-control-prev" href="#bannerCarousel" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#bannerCarousel" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>

    <!-- Kategori Produk -->
    <div class="row mb-4">
        <div class="col-12">
            <h2 class="mb-3">Kategori Produk</h2>
        </div>
        <div class="col-6 col-md-3 mb-3">
            <div class="card category-card">
                <div class="card-body text-center">
                    <i class="fas fa-laptop fa-3x mb-3 category-icon"></i>
                    <h5 class="card-title">Elektronik</h5>
                </div>
            </div>
        </div>
        <div class="col-6 col-md-3 mb-3">
            <div class="card category-card">
                <div class="card-body text-center">
                    <i class="fas fa-tshirt fa-3x mb-3 category-icon"></i>
                    <h5 class="card-title">Fashion</h5>
                </div>
            </div>
        </div>
        <div class="col-6 col-md-3 mb-3">
            <div class="card category-card">
                <div class="card-body text-center">
                    <i class="fas fa-couch fa-3x mb-3 category-icon"></i>
                    <h5 class="card-title">Rumah Tangga</h5>
                </div>
            </div>
        </div>
        <div class="col-6 col-md-3 mb-3">
            <div class="card category-card">
                <div class="card-body text-center">
                    <i class="fas fa-mobile-alt fa-3x mb-3 category-icon"></i>
                    <h5 class="card-title">Gadget</h5>
                </div>
            </div>
        </div>
    </div>

    <!-- Produk Unggulan -->
    <div class="row mb-4">
        <div class="col-12">
            <h2 class="mb-3">Produk Terbaru</h2>
        </div>
        <?php
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo '<div class="col-6 col-md-3 mb-3">';
                echo '    <div class="card">';
                echo '        <img src="' . $row["gambar_produk"] . '" class="card-img-top" alt="' . $row["nama_produk"] . '">';
                echo '        <div class="card-body">';
                echo '            <h5 class="card-title">' . $row["nama_produk"] . '</h5>';
                echo '            <p class="card-text">Rp' . number_format($row["harga_produk"], 0, ',', '.') . '</p>';
                echo '            <a href="?page=inputcustomer" class="btn btn-primary btn-block">Beli Sekarang</a>';
                echo '        </div>';
                echo '    </div>';
                echo '</div>';
            }
        } else {
            echo '<div class="col-12"><p>Tidak ada produk Terbaru.</p></div>';
        }
        ?>
    </div>
</div>