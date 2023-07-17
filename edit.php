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

    // Query SQL untuk mendapatkan data berdasarkan id
    $sql = "SELECT * FROM orders WHERE id='$id'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        // Form edit data
        echo "<h1>Edit Data</h1>";
        echo "<form method='POST' action='update.php?id=$id'>";
        echo "<input type='hidden' name='id' value='" . $row['id'] . "'>";
        echo "Nama Pembeli: <input type='text' name='nama_pembeli' value='" . $row['nama_pembeli'] . "'><br>";
        echo "Alamat Pembeli: <input type='text' name='alamat_pembeli' value='" . $row['alamat_pembeli'] . "'><br>";
       /* echo "Nomor Telepon: <input type='text' name='nomor_telepon' value='" . $row['nomor_telepon'] . "'><br>"; */
        
        // Cek apakah field "email" ada dalam array $row sebelum menggunakannya
        if (isset($row['email'])) {
            echo "Email: <input type='text' name='email' value='" . $row['email'] . "'><br>";
        }
        
        /* echo "Nomor Resi: <input type='text' name='nomor_resi' value='" . $row['nomor_resi'] . "'><br>"; */
        echo "Jenis Sepatu: <input type='text' name='jenis_sepatu' value='" . $row['jenis_sepatu'] . "'><br>";
        echo "Nama Sepatu: <input type='text' name='nama_sepatu' value='" . $row['nama_sepatu'] . "'><br>";
        echo "Ukuran Sepatu: <input type='text' name='ukuran_sepatu' value='" . $row['ukuran_sepatu'] . "'><br>";
        echo "Tanggal Pembelian: <input type='date' name='tanggal_pembelian' value='" . $row['tanggal_pembelian'] . "'><br>";
        echo "Jumlah Pembelian: <input type='number' name='jumlah_pembelian' value='" . $row['jumlah_pembelian'] . "'><br>";
        echo "Total Harga: <input type='number' name='total_harga' value='" . $row['total_harga'] . "'><br>";
        echo "Metode Pembayaran: <input type='text' name='metode_pembayaran' value='" . $row['metode_pembayaran'] . "'><br>";

        echo "<input type='submit' value='Simpan'>";
        echo "</form>";
    } else {
        echo "Data tidak ditemukan.";
    }
}

// Menutup koneksi database
mysqli_close($conn);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Edit Data</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            padding: 20px;
        }

        h1 {
            color: #333;
            margin-bottom: 20px;
        }

        form {
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        form input[type="text"],
        form input[type="number"],
        form input[type="date"] {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        form input[type="submit"] {
            background-color: #4caf50;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <!-- Konten form edit data -->
</body>
</html>
