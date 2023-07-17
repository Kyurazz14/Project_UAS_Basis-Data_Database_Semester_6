<?php
// Database configuration
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "toko_sepatu_dandeli";

// Membuat koneksi ke database
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Memeriksa koneksi
if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

// Memeriksa apakah parameter id tersedia
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Query SQL untuk menghapus data berdasarkan id
    $sql = "DELETE FROM orders WHERE id='$id'";

    if (mysqli_query($conn, $sql)) {
        // Data berhasil dihapus, redirect ke halaman admin.php
        header("Location: admin.php");
        exit();
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}

// Menutup koneksi database
mysqli_close($conn);
?>
