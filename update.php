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

// Memeriksa apakah parameter id dan data tersedia
if (isset($_POST['id']) && !empty($_POST['id'])) {
    $id = $_POST['id'];

    // Mengambil data dari form edit
    $namaPembeli = $_POST['nama_pembeli'];
    $alamatPembeli = $_POST['alamat_pembeli'];
    $nomorTelepon = $_POST['nomor_telepon'];
    $nomorResi = $_POST['nomor_resi'];
    $jenisSepatu = $_POST['jenis_sepatu'];
    $namaSepatu = $_POST['nama_sepatu'];
    $ukuranSepatu = $_POST['ukuran_sepatu'];
    $tanggalPembelian = $_POST['tanggal_pembelian'];
    $jumlahPembelian = $_POST['jumlah_pembelian'];
    $totalHarga = $_POST['total_harga'];
    $metodePembayaran = $_POST['metode_pembayaran'];

    // Query SQL untuk memperbarui data berdasarkan id
    $sql = "UPDATE orders SET
        nama_pembeli='$namaPembeli',
        alamat_pembeli='$alamatPembeli',
        nomor_telepon='$nomorTelepon',
        nomor_resi='$nomorResi',
        jenis_sepatu='$jenisSepatu',
        nama_sepatu='$namaSepatu',
        ukuran_sepatu='$ukuranSepatu',
        tanggal_pembelian='$tanggalPembelian',
        jumlah_pembelian='$jumlahPembelian',
        total_harga='$totalHarga',
        metode_pembayaran='$metodePembayaran'
        WHERE id='$id'";

    if (mysqli_query($conn, $sql)) {
        echo "Data berhasil diperbarui.";
        header("Location: admin.php");
        exit;
    } else {
        echo "Terjadi kesalahan: " . mysqli_error($conn);
    }
} else {
    echo "ID tidak valid atau data tidak tersedia.";
}

// Menutup koneksi database
mysqli_close($conn);
?>
