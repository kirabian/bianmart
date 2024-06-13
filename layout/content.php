<?php
if (isset($_GET['page'])) {
    $page = $_GET['page'];

    switch ($page) {
        case 'listproduk':
            include 'produk_bm/index_produk_bianmart.php';
            break;
        case 'inputproduk':
            include 'produk_bm/input_produk.php';
            break;
        case 'home':
            include 'home/index-home.php';
            break;
        case 'inputcustomer':
            include 'customer-bianmart/form_customer.php';
            break;
        case 'listcustomer':
            include 'customer-bianmart/index-list-customer.php';
            break;
        case 'editproduk':
            include 'produk_bm/edit-produk.php';
            break;
        case 'hapusproduk':
            include 'produk_bm/hapus-produk.php';
            break;
        case 'editcustomer':
            include 'customer-bianmart/edit-customer.php';
            break;
        case 'hapuscustomer':
            include 'customer-bianmart/hapus-customer.php';
            break;
        default:
            echo 'Halaman tidak ditemukan.';
            break;
    }
} else {
    include 'home/index-home.php'; // Default page
}
