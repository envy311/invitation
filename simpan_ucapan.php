<?php
include "koneksi.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // pastikan data diterima
    if (!isset($_POST['nama']) || !isset($_POST['pesan'])) {
        die("Error: data tidak lengkap.");
    }

    $nama  = $_POST['nama'];
    $pesan = $_POST['pesan'];

    // cek koneksi
    if (!$conn) {
        die("Koneksi database gagal: " . mysqli_connect_error());
    }

    // insert ke database
    $stmt = $conn->prepare("INSERT INTO ucapan (nama, pesan) VALUES (?, ?)");
    if (!$stmt) {
        die("Prepare gagal: " . $conn->error);
    }

    if (!$stmt->bind_param("ss", $nama, $pesan)) {
        die("Bind gagal: " . $stmt->error);
    }

    if ($stmt->execute()) {
        echo "success";
    } else {
        die("Execute gagal: " . $stmt->error);
    }

    $stmt->close();
    $conn->close();
} else {
    echo "Error: request bukan POST.";
}
?>
