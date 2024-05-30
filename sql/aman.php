<?php
// Koneksi ke database
$conn = mysqli_connect("localhost", "root", "", "sql_injection");

// Ambil data dari form login dan lakukan sanitasi
$username = mysqli_real_escape_string($conn, $_POST['username']);
$password = mysqli_real_escape_string($conn, $_POST['password']);

// Buat hash dari password untuk memastikan keamanan
$hashed_password = md5($password); 

// Query untuk login (aman dari SQL Injection)
$query = "SELECT * FROM users WHERE username='$username' AND password='$hashed_password'";
$result = mysqli_query($conn, $query);

// Cek hasil query
if(mysqli_num_rows($result) > 0) {
    echo "Login berhasil!";
} else {
    echo "Login gagal!";
}

// Tutup koneksi
mysqli_close($conn);
?>
