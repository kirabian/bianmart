<?php
include("koneksi.php");

session_start();

if (isset($_POST['submit'])) {
    $id_produk = $_POST['id_produk'];
    $nama_produk = $_POST['nama_produk'];
    $harga_produk = $_POST['harga_produk'];
    $detail_produk = $_POST['detail_produk'];
    $kategori = $_POST['kategori'];

    // Mendapatkan informasi file gambar
    $gambar_produk = $_FILES["gambar_produk"];
    $gambar_produk_name = $gambar_produk["name"];
    $gambar_produk_temp = $gambar_produk["tmp_name"];
    $gambar_produk_type = $gambar_produk["type"];
    $gambar_produk_size = $gambar_produk["size"];

    // Memeriksa apakah file yang diunggah adalah gambar
    $allowed_extensions = array("image/jpeg", "image/jpg", "image/png");
    if (in_array($gambar_produk_type, $allowed_extensions)) {
        // Memeriksa ukuran file gambar
        if ($gambar_produk_size > 5000000) { // 5MB (misalnya)
            echo "Ukuran gambar terlalu besar. Maksimum 5MB yang diizinkan.";
        } else {
            // Tentukan direktori tujuan penyimpanan gambar
            $target_dir = dirname(__FILE__) . '/../uploads/'; // Mengarahkan ke direktori 
            $target_path = $target_dir . basename($gambar_produk_name);

            // Memeriksa apakah direktori tujuan ada, jika tidak buat direktori tersebut
            if (!is_dir($target_dir)) {
                mkdir($target_dir, 0777, true);
            }

            // Pindahkan file gambar ke direktori tujuan
            if (move_uploaded_file($gambar_produk_temp, $target_path)) {
                // Menyiapkan query untuk dimasukkan ke database
                $sql = "INSERT INTO produk_bianmart (nama_produk, harga_produk, detail_produk, gambar_produk, kategori) VALUES (?, ?, ?, ?, ?)";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param("sssss", $nama_produk, $harga_produk, $detail_produk, $gambar_produk_name, $kategori);
                if ($stmt->execute()) {
                    header('Location: ../?page=home');
                } else {
                    echo "Gagal menambahkan produk ke database.";
                }
            } else {
                echo "Gagal memindahkan file gambar.";
            }
        }
    } else {
        echo "Hanya file gambar dengan format JPG, JPEG, dan PNG yang diperbolehkan.";
    }
} elseif (isset($_POST['edit'])) {
    $id_produk = $_POST['id_produk'];
    $nama_produk = $_POST['nama_produk'];
    $harga_produk = $_POST['harga_produk'];
    $detail_produk = $_POST['detail_produk'];
    $kategori = $_POST['kategori'];

    // Mendapatkan informasi file gambar
    $gambar_produk = $_FILES["gambar_produk"];
    $gambar_produk_name = $gambar_produk["name"];
    $gambar_produk_temp = $gambar_produk["tmp_name"];
    $gambar_produk_type = $gambar_produk["type"];
    $gambar_produk_size = $gambar_produk["size"];

    $update_gambar = "";
    if ($gambar_produk_name) {
        // Memeriksa apakah file yang diunggah adalah gambar
        $allowed_extensions = array("image/jpeg", "image/jpg", "image/png");
        if (in_array($gambar_produk_type, $allowed_extensions)) {
            // Memeriksa ukuran file gambar
            if ($gambar_produk_size > 5000000) { // 5MB (misalnya)
                echo "Ukuran gambar terlalu besar. Maksimum 5MB yang diizinkan.";
                exit;
            } else {
                // Tentukan direktori tujuan penyimpanan gambar
                $target_dir = dirname(__FILE__) . '/../uploads/'; // Mengarahkan ke direktori 
                $target_path = $target_dir . basename($gambar_produk_name);

                // Memeriksa apakah direktori tujuan ada, jika tidak buat direktori tersebut
                if (!is_dir($target_dir)) {
                    mkdir($target_dir, 0777, true);
                }

                // Pindahkan file gambar ke direktori tujuan
                if (move_uploaded_file($gambar_produk_temp, $target_path)) {
                    $update_gambar = ", gambar_produk = '$gambar_produk_name'";
                } else {
                    echo "Gagal memindahkan file gambar.";
                    exit;
                }
            }
        } else {
            echo "Hanya file gambar dengan format JPG, JPEG, dan PNG yang diperbolehkan.";
            exit;
        }
    }

    $sql = "UPDATE produk_bianmart SET nama_produk=?, harga_produk=?, detail_produk=?, kategori=? $update_gambar WHERE id_produk=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssi", $nama_produk, $harga_produk, $detail_produk, $kategori, $id_produk);
    if ($stmt->execute()) {
        header('Location: ../?page=home');
    } else {
        echo "Gagal mengedit produk.";
    }
} 

?>
