<?php
// db.php
$host = "localhost";       // host server
$user = "root";            // username MySQL
$pass = "";                // password MySQL
$dbname = "undangan";      // nama database

$conn = new mysqli($host, $user, $pass, $dbname);

if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}
?>
