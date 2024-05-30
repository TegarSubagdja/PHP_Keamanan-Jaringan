<?php
// Koneksi ke database
$conn = mysqli_connect("localhost", "root", "", "sql_injection");

// Ambil data dari form login
$username = $_POST['username'];
$password = $_POST['password'];
$email = $_POST['email'];
// Query untuk login
$query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
$result = mysqli_query($conn, $query);

// $query = "SELECT * FROM users WHERE username='$email'";
// $result = mysqli_query($conn, $query);

// Cek hasil query
if (mysqli_num_rows($result) > 0) {
    echo "Login berhasil!";
} else {
    echo "Login gagal!";
}

// Tutup koneksi
mysqli_close($conn);
