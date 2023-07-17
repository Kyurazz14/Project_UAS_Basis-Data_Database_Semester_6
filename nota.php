<!-- nota.php -->

<!DOCTYPE html>
<html>
<head>
    <title>Nota Pembelian</title>
    <style>
        /* Gaya CSS untuk tampilan nota */
        body {
            font-family: Arial, sans-serif;
        }

        .nota-container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background-color: #f5f5f5;
            border: 1px solid #ddd;
            border-radius: 5px;
        }

        .nota-container h1 {
            text-align: center;
            margin-bottom: 20px;
        }

        .nota-info {
            margin-bottom: 10px;
        }

        .nota-info span {
            font-weight: bold;
        }

        .nota-total {
            text-align: right;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <?php
    // Database configuration
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "toko_sepatu_dandeli"; // Ganti "nama_database" dengan nama database Anda

    // Create a database connection
    $conn = mysqli_connect($servername, $username, $password, $dbname);

    // Check the connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Mendapatkan ID pembelian dari parameter URL
    $idPembelian = isset($_GET['id']) ? $_GET['id'] : '';


    // Query untuk mengambil data pembelian berdasarkan ID pembelian
    $sql = "SELECT * FROM orders WHERE id = '$idPembelian'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $namaPembeli = $row["nama_pembeli"];
        $alamatPembeli = $row["alamat_pembeli"];
        $nomorResi = $row["nomor_resi"];
        $jenisSepatu = $row["jenis_sepatu"];
        $namaSepatu = $row["nama_sepatu"];
        $ukuranSepatu = $row["ukuran_sepatu"];
        $tanggalPembelian = $row["tanggal_pembelian"];
        $jumlahPembelian = $row["jumlah_pembelian"];
        $totalHarga = $row["total_harga"];
        $metodePembayaran = $row["metode_pembayaran"];

        // Tampilkan informasi pembelian pada nota
        echo '<div class="nota-container">';
        echo '<h1>Nota Pembelian</h1>';
        echo '<div class="nota-info"><span>Nama Pembeli:</span> ' . $namaPembeli . '</div>';
        echo '<div class="nota-info"><span>Alamat Pembeli:</span> ' . $alamatPembeli . '</div>';
        echo '<div class="nota-info"><span>Nomor Resi:</span> ' . $nomorResi . '</div>';
        echo '<div class="nota-info"><span>Jenis Sepatu:</span> ' . $jenisSepatu . '</div>';
        echo '<div class="nota-info"><span>Nama Sepatu:</span> ' . $namaSepatu . '</div>';
        echo '<div class="nota-info"><span>Ukuran Sepatu:</span> ' . $ukuranSepatu . '</div>';
        echo '<div class="nota-info"><span>Tanggal Pembelian:</span> ' . $tanggalPembelian . '</div>';
        echo '<div class="nota-info"><span>Jumlah Pembelian:</span> ' . $jumlahPembelian . '</div>';
        echo '<div class="nota-info"><span>Total Harga:</span> ' . $totalHarga . '</div>';
        echo '<div class="nota-info"><span>Metode Pembayaran:</span> ' . $metodePembayaran . '</div>';
        echo '</div>';
    } else {
        echo "Data pembelian tidak ditemukan.";
    }

    // Tutup koneksi database
    mysqli_close($conn);
    ?>
</body>
</html>
