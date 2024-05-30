<?php
// Koneksi ke database
$conn = mysqli_connect("localhost", "root", "", "sql_injection");

// String input yang akan di-sanitasi
$input = "username: tegar' OR 1=1 --
password: 123";

// Melakukan sanitasi pada string input
$sanitized_input = mysqli_real_escape_string($conn, $input);

// String aman untuk digunakan dalam query SQL
echo $sanitized_input; // Output: Tegar\'s input