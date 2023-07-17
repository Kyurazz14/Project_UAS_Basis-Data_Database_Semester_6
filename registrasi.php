<?php
// Database configuration
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "toko_sepatu_dandeli";

// Create a database connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check the connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Process registration data if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the data from the form
    $name = $_POST["name"];
    $email = $_POST["email"];
    $address = $_POST["address"];
    $gender = $_POST["gender"];
    $birthdate = $_POST["birthdate"];
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Insert registration data into the database
    $sql = "INSERT INTO registrasi (nama, email, alamat, jenis_kelamin, tanggal_lahir, username, password) VALUES ('$name', '$email', '$address', '$gender', '$birthdate', '$username', '$password')";
    if (mysqli_query($conn, $sql)) {
        echo "Registration data successfully inserted.";
        // Redirect to login page after successful registration
        header("Location: login.php");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}

// Close the database connection
mysqli_close($conn);
?>


<!DOCTYPE html>
<html>
<head>
  <title>Register</title>
  <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <style>
    body {
      background: linear-gradient(to bottom, #000000, #FFD700);
    }
    .container {
      max-width: 400px;
      margin: 0 auto;
      margin-top: 150px;
      padding: 20px;
      background-color: #fff;
      border-radius: 5px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }
    .register-form h2 {
      text-align: center;
      margin-bottom: 20px;
    }
    .register-form .logo {
      text-align: center;
      margin-bottom: 20px;
    }
    .register-form .logo img {
      max-width: 100px;
    }
    .register-form input[type="text"],
    .register-form input[type="password"],
    .register-form input[type="date"],
    .register-form input[type="email"] {
      width: 100%;
      padding: 10px;
      margin-bottom: 15px;
      border: 1px solid #ced4da;
      border-radius: 5px;
    }
    .register-form select {
      width: 100%;
      padding: 10px;
      margin-bottom: 15px;
      border: 1px solid #ced4da;
      border-radius: 5px;
    }
    .register-form button[type="submit"] {
      width: 100%;
      padding: 10px;
      background-color: #007bff;
      color: #fff;
      border: none;
      border-radius: 5px;
      cursor: pointer;
    }
    .register-form button[type="submit"]:hover {
      background-color: #0056b3;
    }
    .register-form p {
      text-align: center;
      margin-top: 15px;
      color: #fff;
    }
    .register-form p a {
      color: #007bff;
      text-decoration: none;
    }
  </style>
</head>
<body>
  <div class="container">
    <div class="register-form">
      <div class="logo">
        <img src="logo.png" alt="Logo Perusahaan">
      </div>
      <h2>Register</h2>
      <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
        <input type="text" name="name" placeholder="Nama" required>
        <input type="email" name="email" placeholder="Email" required>
        <input type="text" name="address" placeholder="Alamat" required>
        <select name="gender" required>
          <option value="">Pilih Jenis Kelamin</option>
          <option value="male">Laki-laki</option>
          <option value="female">Perempuan</option>
        </select>
        <input type="date" name="birthdate" required>
        <input type="text" name="username" placeholder="Username" required>
        <input type="password" name="password" placeholder="Password" required>
        <button type="submit">Register</button>
      </form>
      <p>Sudah punya akun? <a href="login.php">Login di sini</a></p>
    </div>
  </div>

  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
