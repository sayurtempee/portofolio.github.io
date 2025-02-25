<?php
  // Koneksi ke database
  $servername = "localhost";
  $username = "root";
  $password = "mii123";
  $database = "web_p5";

  $conn = new mysqli($servername, $username, $password, $database);

  // Ambil data dari form
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $conn->real_escape_string($_POST['name']);
    $company = $conn->real_escape_string($_POST['Company']);
    $email = $conn->real_escape_string($_POST['_replyto']);
    $message = $conn->real_escape_string($_POST['message']);

    // Query untuk insert data
    $sql = "INSERT INTO contacts (name, company, email, message) VALUES ('$name', '$company', '$email', '$message')";

    if ($conn->query($sql) === TRUE) {
      echo '<script>alert("Data berhasil disimpan.");</script>';
      header("Location: index.html");
      exit();
    } else {
      echo "Terjadi kesalahan saat menyimpan data.";
    }
  }
  ?>