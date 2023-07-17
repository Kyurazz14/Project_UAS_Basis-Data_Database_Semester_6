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

// Fungsi tambah data
function tambahData($conn, $data) {
    // kode fungsi tambahData
}

// Fungsi edit data
function editData($conn, $data) {
    // kode fungsi editData
}

// Fungsi hapus data
function hapusData($conn, $id) {
    // kode fungsi hapusData
}

// Fungsi untuk melakukan sorting data berdasarkan kolom tertentu
function sortData($conn, $column, $order) {
    $sql = "SELECT * FROM orders ORDER BY $column $order";
    $result = mysqli_query($conn, $sql);
    return $result;
}

// Fungsi untuk melakukan pencarian data berdasarkan kata kunci
function searchData($conn, $keyword) {
    $sql = "SELECT * FROM orders WHERE nama_pembeli LIKE '%$keyword%'";
    $result = mysqli_query($conn, $sql);
    return $result;
}

// Mendapatkan data dari tabel orders
$sql = "SELECT * FROM orders";
$result = mysqli_query($conn, $sql);

// Menutup koneksi database
// mysqli_close($conn); <- Komentari baris ini

?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Database</title>
    <style>
        /* Gaya CSS untuk tampilan tabel */
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
        }

        h1 {
            color: #333;
            text-align: center;
        }

        form {
            margin-bottom: 10px;
        }

        input[type="text"], input[type="number"] {
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
            width: 200px;
        }

        button {
            padding: 8px 16px;
            background-color: #4caf50;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            background-color: white;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
        }

        th, td {
            padding: 12px 16px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #f2f2f2;
        }

        tr:hover {
            background-color: #f9f9f9;
        }

        .total-harga {
            font-weight: bold;
            text-align: right;
            margin-top: 20px;
        }
  .btn-edit,
  .btn-hapus,
  .btn-gandakan {
    display: inline-block;
    padding: 8px 12px;
    background-color: #337ab7;
    color: #fff;
    border-radius: 4px;
    text-decoration: none;
    margin-right: 5px;
    font-weight: bold;
  }

  .btn-edit:hover,
  .btn-hapus:hover,
  .btn-gandakan:hover {
    background-color: #23527c;
  }


        .btn-delete-all {
            background-color: #f44336;
        }
    </style>
</head>
<body>
    <h1>[ADMIN] Tempat Admin/Data Analyst untuk Merekap dan Merawat Data Pembelian Sepatu di Dandeli Shoes Store</h1>

    <form method="POST" action="">
        <input type="text" name="keyword" placeholder="Cari...">
        <button type="submit">Cari</button>
    </form>

    <form method="POST" action="">
        <button type="submit" name="sort_total_harga_asc">Urutkan Total Harga (ASC)</button>
        <button type="submit" name="sort_total_harga_desc">Urutkan Total Harga (DESC)</button>
        <button type="submit" name="sort_nama_pembeli_asc">Urutkan Nama Pembeli (ASC)</button>
        <button type="submit" name="sort_nama_pembeli_desc">Urutkan Nama Pembeli (DESC)</button>
        <button type="submit" name="sort_jumlah_pembelian_asc">Urutkan Jumlah Pembelian (ASC)</button>
        <button type="submit" name="sort_jumlah_pembelian_desc">Urutkan Jumlah Pembelian (DESC)</button>
       <!--<button type="submit" name="delete_all" class="btn-delete-all">Hapus Semua Data</button> -->
    </form>

    <table>
        <tr>
            <th>ID</th>
            <th>Nama Pembeli</th>
            <th>Alamat Pembeli</th>
          <!--  <th>Nomor Resi</th> -->
            <th>Jenis Sepatu</th>
            <th>Nama Sepatu</th>
            <th>Ukuran Sepatu</th>
            <th>Tanggal Pembelian</th>
            <th>Jumlah Pembelian</th>
            <th>Total Harga</th>
            <th>Metode Pembayaran</th>
            <th>Aksi</th>
        </tr>
        <?php
        // Menangani sorting data
        if (isset($_POST['sort_total_harga_asc'])) {
            $result = sortData($conn, 'total_harga', 'ASC');
        } elseif (isset($_POST['sort_total_harga_desc'])) {
            $result = sortData($conn, 'total_harga', 'DESC');
        } elseif (isset($_POST['sort_nama_pembeli_asc'])) {
            $result = sortData($conn, 'nama_pembeli', 'ASC');
        } elseif (isset($_POST['sort_nama_pembeli_desc'])) {
            $result = sortData($conn, 'nama_pembeli', 'DESC');
        } elseif (isset($_POST['sort_jumlah_pembelian_asc'])) {
            $result = sortData($conn, 'jumlah_pembelian', 'ASC');
        } elseif (isset($_POST['sort_jumlah_pembelian_desc'])) {
            $result = sortData($conn, 'jumlah_pembelian', 'DESC');
        } else {
            $result = $result;
        }

        // Hapus semua data jika tombol "Hapus Semua Data" diklik
        if (isset($_POST['delete_all'])) {
            $deleteSql = "DELETE FROM orders";
            mysqli_query($conn, $deleteSql);
            header("Refresh:0"); // Refresh halaman setelah menghapus data
        }

        // Loop melalui hasil query untuk menampilkan data tabel
        if ($result && mysqli_num_rows($result) > 0) {
            $totalHarga = 0; // inisialisasi variabel totalHarga
            while ($row = mysqli_fetch_assoc($result)) {
                // Menentukan warna baris berdasarkan kata kunci pencarian
                $style = '';
                if (isset($_POST['keyword']) && stripos($row["nama_pembeli"], $_POST['keyword']) !== false) {
                    $style = 'background-color: yellow;';
                }

                // Menampilkan baris data dengan warna sesuai
                echo "<tr style='$style'>";
                echo "<td>" . $row["id"] . "</td>";
                echo "<td>" . $row["nama_pembeli"] . "</td>";
                echo "<td>" . $row["alamat_pembeli"] . "</td>";
               /* echo "<td>" . $row["nomor_resi"] . "</td>"; */
                echo "<td>" . $row["jenis_sepatu"] . "</td>";
                echo "<td>" . $row["nama_sepatu"] . "</td>";
                echo "<td>" . $row["ukuran_sepatu"] . "</td>";
                echo "<td>" . $row["tanggal_pembelian"] . "</td>";
                echo "<td>" . $row["jumlah_pembelian"] . "</td>";
                echo "<td>" . $row["total_harga"] . "</td>";
                echo "<td>" . $row["metode_pembayaran"] . "</td>";
                echo "<td><a href='edit.php?id=" . $row["id"] . "'>Edit</a> | <a href='hapus.php?id=" . $row["id"] . "'>Hapus</a> | <a href='gandakan.php?id=" . $row["id"] . "'>Gandakan</a></td>";
                echo "</tr>";
                
                // Menambahkan total harga pada setiap baris data
                $totalHarga += $row["total_harga"];
            }
        } else {
            echo "<tr><td colspan='12'>Tidak ada data</td></tr>";
        }
        ?>
    </table>

    <p class="total-harga">Total Keuntungan Penjualan: <?php echo $totalHarga; ?></p>

    <script>
        function printData() {
            window.print();
        }
    </script>
</body>
</html>

<button onclick="printData()">Cetak Data</button>

<script>
    function printData() {
        window.print();
    }
</script>