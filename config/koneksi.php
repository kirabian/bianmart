<?php
// Buat koneksi ke database menggunakan PHP MySQLi
$servername = "localhost";
$username = "root";
$password = "";
$database = "bianmart";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Koneksi ke database gagal: " . $conn->connect_error);
}
?>
