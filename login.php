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

// Process login data if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the data from the form
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Perform authentication and validation
    $sql = "SELECT * FROM registrasi WHERE username = '$username' AND password = '$password'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) == 1) {
        // Redirect to index page after successful login
        header("Location: index.php");
        exit();
    } else {
        echo "Username/password salah.";
    }
}

// Close the database connection
mysqli_close($conn);
?>

<!DOCTYPE html>
<html>
<head>
  <title>Login</title>
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
      background-color: hsl(64, 16%, 65%);
      border-radius: 5px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }
    .login-form h2 {
      text-align: center;
      margin-bottom: 20px;
    }
    .login-form .logo {
      text-align: center;
      margin-bottom: 20px;
    }
    .login-form .logo img {
      max-width: 100px;
    }
    .login-form input[type="text"],
    .login-form input[type="password"] {
      width: 100%;
      padding: 10px;
      margin-bottom: 15px;
      border: 1px solid #000000;
      border-radius: 5px;
    }
    .login-form button[type="submit"] {
      width: 100%;
      padding: 10px;
      background-color: #384320;
      color: #fff;
      border: none;
      border-radius: 5px;
      cursor: pointer;
    }
    .login-form button[type="submit"]:hover {
      background-color: #0056b3;
    }
    .login-form p {
      text-align: center;
      margin-top: 15px;
      color: #040404;
    }
    .login-form p a {
      color: #be2828;
      text-decoration: none;
    }
  </style>
</head>
<body>
  <div class="container">
    <div class="login-form">
      <div class="logo">
        <img src="logo.png" alt="Logo Perusahaan">
      </div>
      <h2>Log In to <br>Dandili Store</h2>
      <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
        <input type="text" name="username" placeholder="Username" required>
        <input type="password" name="password" placeholder="Password" required>
        <button type="submit">Login</button>
      </form>
      <p>Belum punya akun? <a href="registrasi.php">Daftar di sini</a></p>
    </div>
  </div>

  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
