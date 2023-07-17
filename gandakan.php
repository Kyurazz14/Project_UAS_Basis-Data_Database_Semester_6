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

// Mendapatkan ID data yang akan digandakan
$id = $_GET["id"];

// Mendapatkan data yang akan digandakan dari tabel orders
$sql = "SELECT * FROM orders WHERE id = $id";
$result = mysqli_query($conn, $sql);

if ($result && mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);

    // Menduplikasi data
    $nama_pembeli = $row["nama_pembeli"];
    $alamat_pembeli = $row["alamat_pembeli"];
    $nomor_resi = $row["nomor_resi"];
    $jenis_sepatu = $row["jenis_sepatu"];
    $nama_sepatu = $row["nama_sepatu"];
    $ukuran_sepatu = $row["ukuran_sepatu"];
    $tanggal_pembelian = $row["tanggal_pembelian"];
    $jumlah_pembelian = $row["jumlah_pembelian"];
    $total_harga = $row["total_harga"];
    $metode_pembayaran = $row["metode_pembayaran"];

    // Memasukkan data ganda ke dalam tabel orders
    $sql_insert = "INSERT INTO orders (nama_pembeli, alamat_pembeli, nomor_resi, jenis_sepatu, nama_sepatu, ukuran_sepatu, tanggal_pembelian, jumlah_pembelian, total_harga, metode_pembayaran) VALUES ('$nama_pembeli', '$alamat_pembeli', '$nomor_resi', '$jenis_sepatu', '$nama_sepatu', '$ukuran_sepatu', '$tanggal_pembelian', $jumlah_pembelian, $total_harga, '$metode_pembayaran')";

    if (mysqli_query($conn, $sql_insert)) {
        echo "Data berhasil digandakan.";
        header("Location: admin.php");
    } else {
        echo "Error: " . mysqli_error($conn);
    }
} else {
    echo "Data tidak ditemukan.";
}

// Menutup koneksi database
mysqli_close($conn);
?>
